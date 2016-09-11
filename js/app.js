'use strict';
angular.module('sunnyside', ['ngRoute'])
  .config(['$routeProvider', function($routeProvider) {
    $routeProvider
			.when('/edit', {templateUrl: 'views/edit.html'})
			.otherwise({redirectTo: '/edit'});
  }
]);