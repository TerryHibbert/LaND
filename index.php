<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6 lt-ie9 lt-ie8 lt-ie7 debug" lang="en" xmlns:ng="http://angularjs.org"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7 lt-ie9 lt-ie8 debug" lang="en" xmlns:ng="http://angularjs.org"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8 lt-ie9 debug" lang="en" xmlns:ng="http://angularjs.org"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9 lt-ie10 debug" lang="en" xmlns:ng="http://angularjs.org"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en" class="debug"> <!--<![endif]-->
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
<body id="ng-app" class="debuggable" ng-app="landApp" ng-controller="LandCtrl">
    <article class="page LaND-container center animate">
        <div class="col s-pad-0 s-pad-h-1">
            <h1>LaND</h1>
            <h2>A mobile first, fraction based, responsive CSS layout framework.</h2>
        </div>
        <nav class="col s-pad-left-0 m-pad-left-1 s-text-center ml-text-left">
            <a class="col s-1-2 ml-auto" href="#/intro">Introduction</a>
            <a class="col s-1-2 ml-auto" href="#/examples">Examples</a>
            <a class="col s-1-2 ml-auto" href="#/tests">Tests</a>
            <a class="col s-1-2 ml-auto ml-float-right" href="https://github.com/TerryHibbert/LaND/tree/mobile-first" target="_blank">GitHub</a>
            <!-- <a href="#/builder">builder</a> -->
        </nav>
        <div ng-view class="col s-clear s-pad-0"></div>
    </article>

    <footer class="LaND-container center s-text-center">
        <div class="col">&copy; Terry Hibbert 2014</div>
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
