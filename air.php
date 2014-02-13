<?php
    $air_url_path = '/js/air/';

    function air($airClasses, $imageClasses, $fullImageUrl, $srcsArray, $placeholderImageUrl, $id = null) {
        ?>
        <a class="air <?php echo $airClasses; ?>" data-class="<?php echo $imageClasses; ?>" href="<?php echo $fullImageUrl; ?>"
           data-srcs='<?php echo json_encode($srcsArray); ?>'>
            <script>document.write('<img class="<?php echo $imageClasses; ?>" src="<?php echo $placeholderImageUrl; ?>" />');</script>
            <noscript><img class="<?php echo $imageClasses; ?>" src="<?php echo $fullImageUrl; ?>" /></noscript>
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
