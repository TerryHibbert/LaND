'use strict';

var LandCtrl = function($scope) {
    console.log("LandCtrl");

    $scope.sub = "A fraction based, responsive CSS layout framework.";

    $scope.$root.debug = true;
}

var IntroCtrl = function($scope) {
    console.log("IntroCtrl");
}

var DocsCtrl = function($scope) {
    console.log("DocsCtrl");
}

var TestsCtrl = function($scope) {
    console.log("TestsCtrl");
}

var BuilderCtrl = function($scope) {
    console.log("BuilderCtrl");

    $scope.layout = {};

    $scope.layoutOptions = [
        {
            id: 'a',
            label: 'any'
        },
        {
            id: 'd',
            label: 'desktop'
        },
        {
            id: 't',
            label: 'tablet'
        },
        {
            id: 'tl',
            label: 'tablet layout'
        },
        {
            id: 'tp',
            label: 'tablet portrait'
        },
        {
            id: 'm',
            label: 'mobile'
        },
        {
            id: 'ml',
            label: 'mobile layout'
        },
        {
            id: 'mp',
            label: 'mobile portrait'
        }
    ];

    $scope.numerators = [];
    $scope.denominators = [];
    for(var i=0; i<16; ++i) {
        $scope.numerators[i] = $scope.denominators[i] = i;
    }

    $scope.layout.root = {
        classes: [
            ['a', 1, 1]
        ],
        children: []
    };

    $scope.newClass = ['a', 1, 1];

    $scope.selected = null;

    $scope.$on('colClicked', function(scope, args) {
        console.log('colClicked handled by controller');
        if ($scope.selectedCol != null) $scope.selectedCol.selected = false;
        $scope.selectedCol = args.target;
        console.log($scope.selectedCol);
    });

    $scope.addChild = function(fit) {
        console.log("addChild");
        var childCount = $scope.selectedCol.children.length;

        var fit = (typeof fit != 'undefined' && fit);
        var denumerator = 1;

        if (fit) {
            denumerator = childCount+1;
            for (var i=0; i<childCount; ++i) {
                $scope.selectedCol.children[i].classes[0][1] = 1;
                $scope.selectedCol.children[i].classes[0][2] = denumerator;
            }
        }

        var parent = $scope.selectedCol;

        $scope.selectedCol.children.push({
            classes: [['a', 1, denumerator]],
            children: [],
            getParent: function() { return parent; }
        });
    }

    $scope.removeCol = function() {
        console.log("removeCol");
        var parent = $scope.selectedCol.getParent();
        var index = _.indexOf(parent.children, $scope.selectedCol);
        parent.children.splice(index, 1);
        $scope.selectedCol = parent;
    }


    $scope.addParent = function() {
        console.log("removeCol");
        var parent = $scope.selectedCol.getParent();
    }

    $scope.addClass = function() {
        $scope.selectedCol.classes.push($scope.newClass.slice());
    }

    $scope.removeClass = function(index) {
        $scope.selectedCol.classes.splice(index, 1);
    }
}