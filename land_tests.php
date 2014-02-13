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

    <link rel="stylesheet" type="text/css" media="all" href="/css/site.css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

</head>
<body class="debug">
    <div class="LaND-container animate center debuggable">

        <div class="col">Layout: s m ml t d b</div>
        <div class="col s">s</div>
        <div class="col m">m</div>
        <div class="col ml">ml</div>
        <div class="col t">t</div>
        <div class="col d">d</div>
        <div class="col dl">dl</div>


        <div class="col">
            <div class="col s-pad-0 s-1-2">1-2</div><div class="col s-pad-0 s-1-2">1-2</div>
            <div class="col s-pad-0 t-3-7">3-7</div><div class="col s-pad-0 t-4-7">4-7</div>
            <div class="col s-pad-0 ml-2-5">2-5</div><div class="col s-pad-0 ml-3-5">3-5</div>
            <div class="col s-pad-0 t-3-8">3-8</div><div class="col s-pad-0 t-5-8">5-8</div>
            <div class="col s-pad-0 m-1-3">1-3</div><div class="col s-pad-0 m-2-3">2-3</div>
            <div class="col s-pad-0 m-1-4">1-4</div><div class="col s-pad-0 m-3-4">3-4</div>
            <div class="col s-pad-0 ml-1-5">1-5</div><div class="col s-pad-0 ml-4-5">4-5</div>
            <div class="col s-pad-0 ml-1-6">1-6</div><div class="col s-pad-0 ml-5-6">5-6</div>
            <div class="col s-pad-0 t-1-7">1-7</div><div class="col s-pad-0 t-6-7">6-7</div>
            <div class="col s-pad-0 t-1-8">1-8</div><div class="col s-pad-0 t-7-8">7-8</div>
        </div>

        <div class="col d-position-fixed right d-auto">fixed right auto</div>

        <div class="col m-pad-1 m-border-bottom-5">
            <div class="col d-1-4 m-1-2 ml-1-3 d-pad-1">1</div>
            <div class="col d-1-4 m-1-2 ml-1-3 d-pad-1">
                <div class="col d-border-1">bordered</div>
            </div>
            <div class="col d-1-4 m-1-2 ml-1-3 d-pad-1">3</div>
            <div class="col d-1-4 m-1-2 ml-1-3 d-pad-1">4</div>

            <div class="col d-1-4 m-1-2 ml-1-3 d-pad-1">
                <div class="col d-border-1">bordered</div>
            </div>
            <div class="col d-1-4 m-1-2 ml-1-3 d-pad-1">1</div>
            <div class="col d-1-4 m-1-2 ml-1-3 d-pad-1">3</div>
            <div class="col d-1-4 m-1-2 ml-1-3 d-pad-1">4</div>
        </div>
        <div class="col d-pad-0">
            <div class="col d-pad-0 d-margin-2">No padding on parent and margin on child = Too wide</div>
        </div>
        <div class="col d-pad-2">
            <div class="col d-pad-0">Padding on parent instead = just right</div>
        </div>
        <div class="col d-1-2">left</div>
        <div class="col d-1-2 m-1-1 d-clear d-margin-auto">Centered but full on mobile</div>
        <div class="col d-1-2">left</div>

        <div class="col d-1-3 d-clear d-float-right m-float-left">1</div>
        <div class="col d-1-3 d-float-right m-float-left m-float-left">2</div>
        <div class="col d-1-3 d-float-right m-float-left">3</div>

        <div class="col">
            <div class="col d-pad-t-0"><div class="col">a-pad-t-0</div></div>
            <div class="col d-pad-r-0"><div class="col">a-pad-r-0</div></div>
            <div class="col d-pad-b-0"><div class="col">a-pad-b-0</div></div>
            <div class="col d-pad-l-0"><div class="col">a-pad-l-0</div></div>
        </div>

        <div class="col">
            <div class="col d-pad-5px"><div class="col">a-pad-5px</div></div>
            <div class="col d-pad-5px"><div class="col">a-pad-5px</div></div>
            <div class="col d-pad-5px"><div class="col">a-pad-5px</div></div>
            <div class="col d-pad-5px"><div class="col">a-pad-5px</div></div>
        </div>

        <div class="col">
            <div class="col d-pad-0 d-1-2"></div>
            <div class="col d-pad-0 d-1-2">2</div>
        </div>
    </div>

    <div class="LaND-container animate center debuggable">
        <div class="col d-3-4">LaND-container 2</div>
        <div class="col d-1-4">Test thing</div>
    </div>

    <div class="LaND-container animate center debuggable">
        <div class="col d-pad-3 d-pad-v-2">
            <div class="col">content</div>
        </div>
    </div>

    <?php air_includes(); ?>

</body>
</html>