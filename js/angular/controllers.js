'use strict';

function MainCtrl($scope, $routeParams, $location, Items, Data) {
	$scope.item = Items.get({id:$routeParams.id});
	$scope.answerers  = Data('answerers');
	$scope.save = function() {
		$scope.item.$save({id:$scope.item.id}, function(){ $location.path('/edit'); });
	};
}
