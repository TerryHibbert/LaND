var apparent = (typeof apparent == 'undefined') ? angular.module('apparent', ['apparent.directives']) : angular;
apparent.directives = (typeof apparent.directives == 'undefined') ? angular.module('apparent.directives', []) : apparent.directives;

apparent.directives.directive('apMatchHeight', function() {
    var elements = {};
    var elementsInner = {};
    var maxHeight = 0;

    //jQuery(window).on('resize', doIt);

    var intervalToken;

    function link(scope, element, attrs) {
        scope.groupName = (scope.groupName) ? scope.groupName : 'default';

        if (!angular.isArray(elements[scope.groupName])) elements[scope.groupName] = [];
        if (!angular.isArray(elementsInner[scope.groupName])) elementsInner[scope.groupName] = [];

        if (angular.isString(scope.selector)) {
            var selected = jQuery(scope.selector, element);
            selected.wrapInner( "<div class='matchHeightInner'></div>");;
            elements[scope.groupName] = elements[scope.groupName].concat(selected.toArray());
            elementsInner[scope.groupName] = elementsInner[scope.groupName].concat(jQuery('.matchHeightInner', selected).toArray());
        } else {
            elements[scope.groupName].push(element);
        }

        doIt();
        intervalToken = setInterval(doIt, 250);
    }

    function doIt() {
        angular.forEach(elements, function(group, groupName) {

            var $groupItem0 = jQuery(elements[groupName][0]);

            var padTop = parseInt($groupItem0.css('padding-top'));
            var padbottom = parseInt($groupItem0.css('padding-bottom'));
            var borderTop = parseInt($groupItem0.css('border-top-width'));
            var borderBottom = parseInt($groupItem0.css('border-bottom-width'));

            var offset = padTop + padbottom + borderTop + borderBottom;

            updateElements(groupName, getMaxElementHeight(groupName), offset);
        });
    }

    function getMaxElementHeight(groupName) {
        var newMaxHeight = 0;
        angular.forEach(elementsInner[groupName], function(element, i) {
            var height = getHeight(jQuery(element));
            newMaxHeight = Math.max(height, newMaxHeight);
        });

        return newMaxHeight;
    }

    function getHeight(element) {
        var height = jQuery(element).outerHeight();
        if (angular.isUndefined(height)) return;
        return height;
    }

    function updateElements(groupName, height, offset) {
        angular.forEach(elements[groupName], function(element, i) {
            jQuery(element).css('height', height + offset);
        });
    }

    return {
        scope: {
            groupName: "=apMatchHeight",
            selector: "=",
            classes: '=class'
        },
        link: link
    }
});