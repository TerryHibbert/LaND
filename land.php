<?php
    $width_to_load_responsive_css = 481;
    $url_path_to_land = '/assets/vendor/land/';

    $enable_land_js = false; // Not ready yet
?>
<!-- BEGIN LaND -->
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo $url_path_to_land; ?>css/normalize.css">

        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!--[if lt IE 8]>
        <script src="<?php echo $url_path_to_land; ?>js/json2.js"></script>
        <![endif]-->
        <!--[if lt IE 7]>
        <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js"></script>
        <![endif]-->

        <link rel="stylesheet" type="text/css" media="all" href="<?php echo $url_path_to_land; ?>css/land-mobile.css">

        <!--[if lte IE 8]><link rel="stylesheet" type="text/css" media="all" href="<?php echo $url_path_to_land; ?>land-desktop.css"><![endif]-->
        <!--[if IE 9]><link rel="stylesheet" type="text/css" media="screen" href="<?php echo $url_path_to_land; ?>land-respond.css"><![endif]-->
        <!--[if !IE | gte IE 10]><!-->
        <script>
            if (window.matchMedia) {
                var mm = window.matchMedia('screen and (min-width: <?php echo $width_to_load_responsive_css; ?>px)');

                function loadResponsiveCSS() {
                    var ref = document.createElement("link");
                    ref.setAttribute("rel", "stylesheet");
                    ref.setAttribute("type", "text/css");
                    ref.setAttribute("href", "<?php echo $url_path_to_land; ?>css/land-respond.css");
                    document.getElementsByTagName("head")[0].appendChild(ref);
                }

                if (mm.matches) {
                    document.write('<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $url_path_to_land; ?>css/land-respond.css">');
                } else {
                    function handleMMChange() {
                        mm.removeListener(handleMMChange);
                        loadResponsiveCSS();
                    };

                    mm.addListener(handleMMChange);
                }
            } else {
                document.write('<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $url_path_to_land; ?>css/land-desktop.css">');
            }
        </script>
        <noscript><link rel="stylesheet" type="text/css" media="screen" href="<?php echo $url_path_to_land; ?>css/land-desktop.css"></noscript>
        <!--<![endif]-->

<?php if ($enable_land_js) : ?>
        <script type="text/javascript" src="<?php echo $url_path_to_land; ?>/js/land.js"></script>
        <script type="text/javascript">
             var land = new LaND({
                'applyToHTML': true
             });

             land.addListener('change', function() {
             console.log('LaND change...');
             $output = $('.output');

             var activeLayouts = [];
             $.each(land.layouts, function(i, layout) {
                if (layout) activeLayouts.push(i);
             });

             $output.html(activeLayouts.join(', '));
                 console.log(land.layouts);
                 console.log($output);
             });

             land.init();
        </script>
<?php endif; ?>
<!-- / END LaND -->
