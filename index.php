<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6 lt-ie9 lt-ie8 lt-ie7" lang="en" xmlns:ng="http://angularjs.org"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7 lt-ie9 lt-ie8" lang="en" xmlns:ng="http://angularjs.org"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8 lt-ie9" lang="en" xmlns:ng="http://angularjs.org"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9 lt-ie10" lang="en" xmlns:ng="http://angularjs.org"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>LaND</title>
    <meta name="description" content="A website" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="fragment" content="!" />

    <?php include 'land.php'; ?>
    <?php include 'air.php'; ?>

    <link rel="stylesheet" type="text/css" media="all" href="/assets/css/site.css" />

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

    <script type="text/javascript">var console = typeof console !== 'undefined' ? console : {log:function(){}};</script>

</head>
<body id="ng-app" class="ng-app:landApp" ng-app="landApp" ng-controller="LandCtrl">
    <article class="page LaND-container center animate">
        <div class="col a-pad-0 m-pad-left-1 m-pad-right-1">
            <h1>LaND</h1>
            <h2>A mobile first, fraction based, responsive CSS layout framework.</h2>
        </div>
        <nav class="col s-pad-left-0 m-pad-left-1">
            <a href="#/intro">intro</a>
            <a href="#/docs">docs</a>
            <a href="/example1.php">Examples</a>
            <a href="#/tests">tests</a>
            <!-- <a href="#/builder">builder</a> -->
        </nav>
        <div ng-view class="col s-clear s-pad-0"></div>
    </article>

    <footer class="LaND-container center s-text-center">
        Footer
    </footer>

    <script type="text/javascript" src="/assets/js/lib/angularjs.1.0.5/angular.min.js"></script>
    <script type="text/javascript" src="/assets/js/lib/angularjs.1.0.5/angular-cookies.min.js"></script>
    <script type="text/javascript" src="/assets/js/lib/angularjs.1.0.5/angular-resource.min.js"></script>
    <script type="text/javascript" src="/assets/js/lib/angularjs.1.0.5/angular-sanitize.min.js"></script>
    <script type="text/javascript" src="/assets/js/lib/angularjs.1.0.5/angular-loader.min.js"></script>

    <script type="text/javascript" src="/assets/js/lib/underscore/underscore-min.js"></script>

    <script type="text/javascript" src="/assets/js/land-app.js"></script>
    <script type="text/javascript" src="/assets/js/land-directives.js"></script>
    <script type="text/javascript" src="/assets/js/land-filters.js"></script>
    <script type="text/javascript" src="/assets/js/land-services.js"></script>
    <script type="text/javascript" src="/assets/js/land-controllers.js"></script>

    <?php air_includes(); ?>
</body>
</html>
