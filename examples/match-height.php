<?php include '../config.php' ?>
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

    <?php include '../land.php'; ?>
    <?php include '../air.php'; ?>

    <link rel="stylesheet" type="text/css" media="all" href="../assets/css/site.css" />
</head>
<body class="" ng-app="landApp">
    <div class="LaND-container center">
        <h1 class="col s-text-center">
            Height Matching
        </h1>
        <h2 class="col s-text-center">
            Layout:
            <span class="s">s</span>
            <span class="m">m</span>
            <span class="ml">ml</span>
            <span class="t">t</span>
            <span class="d">d</span>
            <span class="dl">dl</span>
        </h2>
        <div class="col">
            This is an AngularJS directive that sets the height of all specified items to fit the content of the largest items. If the content height changes, all items heights will adjust automatically. To use it:
            <ol>
                <li>include jQuery on the page</li>
                <li>include the 'angular-directives.js' script before your app definition</li>
                <li>include the 'angular.directives' module dependency in the app module declaration (usually in 'app.js')</li>
                <li>add a identifying class to all items (such as 'item')</li>
                <li>add the attribute 'ap-match-height' to the container with a unique group name in string format as the property: ap-match-height="'uniqueGroupName'"</li>
                <li>add the attribute 'selector' to the container with a string property of the jQuery selector (in scope): selector="'.item'"</li>
            </ol>
            <pre>
&lt;div class="col-s-pad-1" ap-match-height="'items'" selector="'.item'"&gt;
    &lt;div class="item col s-pad-1 ml-1-3 s-border-1"&gt;Lorem ipsum dolor...&lt;/div&gt;
    &lt;div class="item col s-pad-1 ml-1-3 s-border-1"&gt;Lorem ipsum dolor sit amet...&lt;/div&gt;
    &lt;div class="item col s-pad-1 ml-1-3 s-border-1"&gt;Lorem...&lt;/div&gt;
&lt;/div&gt;
            </pre>
        </div>

        <div class="col-s-pad-1" ap-match-height="'items'" selector="'.item'">
            <div class="item col s-pad-1 ml-1-3 s-border-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, sapiente.</div>
            <div class="item col s-pad-1 ml-1-3 s-border-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus facilis impedit iste modi nisi repellat sequi voluptas! Accusamus aliquam at fugiat labore libero maiores necessitatibus quas repellat? A, culpa laudantium.</div>
            <div class="item col s-pad-1 ml-1-3 s-border-1">Lorem ipsum dolor sit amet.</div>
            <div class="item col s-pad-1 ml-1-3 s-border-1">Lorem ipsum dolor sit amet.</div>
            <div class="item col s-pad-1 ml-1-3 s-border-1">Lorem ipsum dolor sit amet Ducimus facilis impedit iste modi nisi repellat sequi voluptas! Accusamus aliquam at fugiat labore libero maiores necessitatibus quas repellat? A, culpa laudantium.</div>
            <div class="item col s-pad-1 ml-1-3 s-border-1">Lorem ipsum dolor sit amet.</div>
        </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <?php air_includes(); ?>

    <script type="text/javascript" src="<?php echo ROOT; ?>assets/js/lib/angularjs.1.0.5/angular.min.js"></script>
    <script type="text/javascript" src="<?php echo ROOT; ?>assets/js/lib/angularjs.1.0.5/angular-cookies.min.js"></script>
    <script type="text/javascript" src="<?php echo ROOT; ?>assets/js/lib/angularjs.1.0.5/angular-resource.min.js"></script>
    <script type="text/javascript" src="<?php echo ROOT; ?>assets/js/lib/angularjs.1.0.5/angular-sanitize.min.js"></script>
    <script type="text/javascript" src="<?php echo ROOT; ?>assets/js/lib/angularjs.1.0.5/angular-loader.min.js"></script>

    <script type="text/javascript" src="<?php echo ROOT; ?>assets/js/lib/underscore/underscore-min.js"></script>

    <script type="text/javascript" src="<?php echo ROOT; ?>assets/js/apparent-directives.js"></script>
    <script type="text/javascript" src="<?php echo ROOT; ?>assets/js/land-app.js"></script>
    <script type="text/javascript" src="<?php echo ROOT; ?>assets/js/land-directives.js"></script>
    <script type="text/javascript" src="<?php echo ROOT; ?>assets/js/land-filters.js"></script>
    <script type="text/javascript" src="<?php echo ROOT; ?>assets/js/land-services.js"></script>
    <script type="text/javascript" src="<?php echo ROOT; ?>assets/js/land-controllers.js"></script>

</body>
</html>