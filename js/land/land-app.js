'use strict';

var land = angular.module('land', ['land.filters', 'land.services', 'land.directives']);

land.config(['$routeProvider', function($routeProvider) {
    $routeProvider.when('/intro', {
        templateUrl: '/partials/views/intro.html',
        controller: IntroCtrl
    });
    $routeProvider.when('/docs', {
        templateUrl: '/partials/views/docs.html',
        controller: DocsCtrl
    });
    $routeProvider.when('/tests', {
        templateUrl: '/partials/views/tests.html',
        controller: TestsCtrl
    });
    $routeProvider.when('/builder', {
        templateUrl: '/partials/views/builder.html',
        controller: BuilderCtrl
    });
    $routeProvider.otherwise({ redirectTo: '/intro' });
}]);