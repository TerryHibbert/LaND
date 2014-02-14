<?php
    $air_url_path = '/assets/js/air/';

    function air($airClasses, $imageClasses, $fullImageUrl, $srcsArray, $placeholderImageUrl, $title='', $id = null, $textFallback = false, $lazy = true) {
        ?>
        <a class="air <?php echo $airClasses; ?>" data-lazy="<?php echo $lazy ? 'true' : 'false'; ?>" data-class="<?php echo $imageClasses; ?>" href="<?php echo $fullImageUrl; ?>"
           data-srcs='<?php echo json_encode($srcsArray); ?>' title="<?php echo $title; ?>">
            <script>document.write('<img class="<?php echo $imageClasses; ?>" src="<?php echo $placeholderImageUrl; ?>" />');</script>
            <noscript><img class="<?php echo $imageClasses; ?>" src="<?php echo $fullImageUrl; ?>" alt="<?php echo $title; ?>" /></noscript>
        </a>
        <?php
    }

    function air_includes() {
        global $air_url_path;
        ?>
        <link rel="stylesheet" href="<?php echo $air_url_path; ?>air.css"/>
        <script type="text/javascript" src="<?php echo $air_url_path; ?>air.js"></script>
        <?php
    }
