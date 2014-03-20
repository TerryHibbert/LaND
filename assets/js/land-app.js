'use strict';

var landApp = angular.module('landApp', ['landApp.filters', 'landApp.services', 'landApp.directives', 'apparent.directives']);

landApp.config(['$routeProvider', function($routeProvider) {
    $routeProvider.when('/intro', {
        templateUrl: window.root + 'assets/partials/views/intro.html',
        controller: IntroCtrl
    });
    $routeProvider.when('/examples', {
        templateUrl: window.root + 'assets/partials/views/examples.html',
        controller: TestsCtrl
    });
    $routeProvider.when('/tests', {
        templateUrl: window.root + 'assets/partials/views/tests.html',
        controller: TestsCtrl
    });
    $routeProvider.when('/builder', {
        templateUrl: window.root + 'assets/partials/views/builder.html',
        controller: BuilderCtrl
    });
    $routeProvider.otherwise({ redirectTo: '/intro' });
}]);