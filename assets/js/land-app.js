'use strict';

var landApp = angular.module('landApp', ['landApp.filters', 'landApp.services', 'landApp.directives']);

landApp.config(['$routeProvider', function($routeProvider) {
    $routeProvider.when('/intro', {
        templateUrl: '/assets/partials/views/intro.html',
        controller: IntroCtrl
    });
    $routeProvider.when('/examples', {
        templateUrl: '/assets/partials/views/examples.html',
        controller: TestsCtrl
    });
    $routeProvider.when('/tests', {
        templateUrl: '/assets/partials/views/tests.html',
        controller: TestsCtrl
    });
    $routeProvider.when('/builder', {
        templateUrl: '/assets/partials/views/builder.html',
        controller: BuilderCtrl
    });
    $routeProvider.otherwise({ redirectTo: '/intro' });
}]);