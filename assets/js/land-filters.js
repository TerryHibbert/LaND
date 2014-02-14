'use strict';

var landFilters = angular.module('landApp.filters', []);

landFilters.filter('join', [function() {
    return function(input, glue) {
        if (typeof input == 'undefined') return null;
        return input.join(glue);
    }
}]);

landFilters.filter('colClasses', [function() {
    return function(input) {
        if (typeof input == 'undefined') return null;

        var classes = [];
        var classCount = input.length;
        for (var i=0; i<classCount; ++i) {
            classes.push(input[i].join('-'));
        }

        //console.log(classes);
        return classes.join(' ');
    }
}]);