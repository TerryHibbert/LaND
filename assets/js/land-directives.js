'use strict';

var landDirectives = angular.module('landApp.directives', []);

landDirectives.directive('ldCol', function factory($compile) {
    return {
        replace: true,
        template: "<div id='{{node.id}}' class=\"col\" ng-class=\"node.classes | colClasses\">&nbsp;</div>",
        link: function(scope, iElement, iAttrs) {
            //console.log('ldCol compile!');
            //console.log(iAttrs.ldCol);

            scope.node = scope.$eval(iAttrs.ldCol);
            //console.log(scope.node);

            function addChildren() {
                //console.log('ldCol addChildren for ' + scope.node.id);
                //console.log(scope.node.children);

                var childCount = scope.node.children.length;

                if (childCount) {
                    iElement.html('');
                }

                for (var i=0; i<childCount; ++i) {
                    var childScope = scope.$new();
                    childScope.node = scope.node.children[i];
                    var iChild = angular.element("<div ld-col=\"node\">asfasd</div>");
                    iElement.append(iChild);
                    $compile(iChild)(childScope);
                }
            }

            scope.$watch(iAttrs.ldCol, function(value) {
                if (typeof value == 'undefined') return;

                //console.log('ldCol changed');
                //console.log(value);

                scope.node = value;

                if (typeof scope.node.children != 'undefined') addChildren();

            }, true);

            scope.$watch('node.selected', function(value) {
                if (typeof value == 'undefined' || value == null || !value) {
                    iElement.removeClass('selected');
                } else {
                    iElement.addClass('selected');
                }
            }, true);

            iElement.bind('click', function(e) {
                if (e.target != e.currentTarget) return;
                //console.log("clicked " + scope.node.id);

                scope.$emit('colClicked', {target: scope.node});

                scope.node.selected = true;
                scope.$apply();
            });
        }
    }
});