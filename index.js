var myApp = angular.module("myApp", ["ngTable"]);



var self = this;
var data = [{name: "Moroni", age: 50} /*,*/];
self.tableParams = new NgTableParams({}, { dataset: data});
