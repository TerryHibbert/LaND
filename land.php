<?php
    $LaND_debug = false;
    $LaND_enable_js = false; // Not ready yet
    $LaND_media = 'all';

    $width_to_load_responsive_css = 481;
    $root = defined('ROOT') ? ROOT : '/';
    $url_path_to_land = isset($url_path_to_land) ? $url_path_to_land : "{$root}assets/vendor/land/";

    $LaND_protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443)
        ? "https"
        : "http";

    function land_debug($message, $renderScriptTags = false) {
        global $LaND_debug;
        if (!$LaND_debug) return;
        $action = "console.log(\"$message\");";
        echo $renderScriptTags ? "<script>$action</script>" : $action;
    }
?>
<!-- BEGIN LaND -->
<link rel="stylesheet" type="text/css" media="<?php echo $LaND_media; ?>" href="<?php echo $url_path_to_land; ?>css/normalize.css"/>

<!--[if lt IE 9]><script src="<?php echo $LaND_protocol; ?>://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lt IE 8]><script src="<?php echo $url_path_to_land; ?>js/json2.js"></script><![endif]-->
<!--[if lt IE 7]><script src="<?php echo $LaND_protocol; ?>://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js"></script><![endif]-->

<link rel="stylesheet" type="text/css" media="<?php echo $LaND_media; ?>" href="<?php echo $url_path_to_land; ?>css/land-mobile.css"/>

<!--[if lte IE 8]><link rel="stylesheet" type="text/css" media="<?php echo $LaND_media; ?>" href="<?php echo $url_path_to_land; ?>css/land-desktop.css"/><![endif]-->
<!--[if IE 9]><link rel="stylesheet" type="text/css" media="<?php echo $LaND_media; ?>" href="<?php echo $url_path_to_land; ?>css/land-respond.css"/><![endif]-->
<!--[if !IE | gte IE 10]><!-->
<style type="text/css">@media all and (min-width:1px) {.mediatest{position:absolute;}}</style>
<script>
    <?php land_debug('LaND start'); ?>

    function loadResponsiveCSS() {
        var ref = document.createElement("link");
        ref.setAttribute("rel", "stylesheet");
        ref.setAttribute("type", "text/css");
        ref.setAttribute("media", "<?php echo $LaND_media; ?>");
        ref.setAttribute("href", "<?php echo $url_path_to_land; ?>css/land-respond.css");
        document.getElementsByTagName("head")[0].appendChild(ref);
        <?php land_debug('LaND loaded responsive CSS'); ?>
    }

    if (window.matchMedia) {
        <?php land_debug('LaND has matchMedia support'); ?>
        var mm = window.matchMedia('<?php echo $LaND_media; ?> and (min-width: <?php echo $width_to_load_responsive_css; ?>px)');

        if (mm.matches) {
            <?php land_debug('LaND matches min width'); ?>
            document.write('<link rel="stylesheet" type="text/css" media="<?php echo $LaND_media; ?>" href="<?php echo $url_path_to_land; ?>css/land-respond.css"/>');
            <?php land_debug('LaND loaded responsive CSS'); ?>

        } else {
            <?php land_debug('LaND doesn\'t match min width'); ?>

            function handleMMChange() {
                mm.removeListener(handleMMChange);
                loadResponsiveCSS();
            }

            mm.addListener(handleMMChange);
        }
    } else {
        <?php land_debug('LaND does\'t have matchMedia support'); ?>

        if (typeof CSSMediaRule !== 'undefined') {
            <?php land_debug('LaND no matchMedia, but CSS media queries are supported'); ?>
            document.write('<link rel="stylesheet" type="text/css" media="<?php echo $LaND_media; ?>" href="<?php echo $url_path_to_land; ?>css/land-respond.css"/>');
            <?php land_debug('LaND loaded responsive CSS'); ?>
        } else {
            <?php land_debug('LaND no matchMedia and no CSS media queries supported'); ?>
            document.write('<link rel="stylesheet" type="text/css" media="<?php echo $LaND_media; ?>" href="<?php echo $url_path_to_land; ?>css/land-desktop.css"/>');
            <?php land_debug('LaND loaded desktop CSS'); ?>
        }
    }
</script>
<noscript><link rel="stylesheet" type="text/css" media="<?php echo $LaND_media; ?>" href="<?php echo $url_path_to_land; ?>css/land-desktop.css"/></noscript>
<!--<![endif]-->

<?php if ($LaND_enable_js) : ?>
    <script type="text/javascript" src="<?php echo $url_path_to_land; ?>/js/land.js"></script>
    <script type="text/javascript">
        var land = new LaND({'applyToHTML': true});

        land.addListener('change', function() {
            console.log('LaND change...');
            var $output = $('.output');

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
