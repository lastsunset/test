<?php
include 'init.php';
$url = substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['SCRIPT_NAME'],'/')+1);
list($url,$params) = explode('?',$url,2);

$method = $_SERVER['REQUEST_METHOD'];
list($section, $id, $action) = explode('/',$url,3);

//echo "$method $section/$id/$action";

$getfields = array(
    //table = "main"; 
    'mains'=>1,
	'main'=>array('product','cost'),
);
if (!isset($getfields[$section])) exit;

switch ($method) {
case 'PUT': // create item
	$data = load_raw_post($getfields[$section][1]);
	$data['changed'] = $dbh->subQuery('NOW()');
	data_create_prepare($data);
	$success = $dbh->query("INSERT INTO ?_$section SET ?a", $data);
	break;

}
function data_create_prepare(&$data) {
	global $section;
	sanitize($data);
	switch ($section) {
	case 'questions':
		$data['created'] = $dbh->subQuery('NOW()');
		if (strlen(trim($data['answer']))>0) $data['answered'] = $dbh->subQuery('NOW()');
		break;
	}
}
?>
