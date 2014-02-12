var AIR = function() {
    var that = this;
    //return; // disable
    $ = jQuery;

    var $window = $(window);

    function handleInterval($el, lazy) {
        if (lazy && !isVisible($el)) return;
        if (!isVisible($el)) return;
        var elWidth = $el.width();
        setImage($el, elWidth);
    }

    this.updateAirs = function(selector) {
        AIR.$airs = $(selector);
    }

    var intervalToken = setInterval(function() {
            AIR.$airs.each(function(i, el) {
                var $el = $(el);
                var lazy = $el.hasClass('lazy');
                handleInterval($el, lazy);
            });
        },
        500
    );

    function isVisible($el) {
        var fromTop = ($el.offset().top + $el.height()) - $window.scrollTop();
        var fromBottom = -($el.offset().top - ($window.scrollTop() + $window.height()));
        return fromBottom > 0 && fromTop > 0;
    }

    function setImage($el, elWidth) {
        var $img = $('img', $el);

        var dataSrcs = $el.data('srcs');
        var dataClass = $el.data('class');

        var closestSrc = false;

        $.each(dataSrcs, function(i, item) {
            if (parseInt(i) >= elWidth) {
                closestSrc = item;
                return false; // exit each
            }
        });

        if (!closestSrc) closestSrc = $el.attr('href');

        var currentImageUrl = $img.attr('src');

        if (!currentImageUrl || closestSrc == $img.attr('src')) return;

        $el.addClass('updating');

        var image = (!$img.length)
            ? new Image()
            : $img[0];

        image.src = closestSrc;

        var imageClasses = $img.className;
        $newImg = $(image).attr('class', dataClass);

        $newImg.on('load', function() {
            $el.removeClass('updating');
            $el.removeClass('lazy');
        });
    }
    this.addAir = function($container, classes, imgClasses, href, srcs, placeholderSrc) {
        var srcsString = JSON.stringify(srcs);

        $air = $('<a target="_blank" class="air ' + classes + '" href="' + href + '"></a>');
        $air.attr('data-srcs', srcsString);
        $img = $('<img class="' + imgClasses + '" src="' + placeholderSrc + '" />');

        $air.append($img);
        $container.append($air);

        that.updateAirs('.air');
    }

    this.updateAirs('.air');
}

jQuery(document).ready(function() {
    var air = new AIR();

    var categories = ['abstract','animals','business','cats','city','food','nightlife','fashion','people','nature','sports','technics','transport'];
    function getCat(i) {
        i = (i) ? i : Math.floor(Math.random()*categories.length);
        return categories[i];
    }

    return;
    for (var i = 0; i<10; ++i) {
        var cat = getCat();

        air.addAir(
            $("#airContainer"),
            "col s-pad-0 lazy grayscale",
            "s-fill",
            "http://lorempixel.com/1150/575/" + cat + "/3/1150",
            {
                "200": "http://lorempixel.com/200/100/" + cat + "/3/200",
                "200": "http://lorempixel.com/200/100/" + cat + "/3/200",
                "320": "http://lorempixel.com/320/160/" + cat + "/3/320",
                "400": "http://lorempixel.com/400/200/" + cat + "/3/400",
                "500": "http://lorempixel.com/500/250/" + cat + "/3/500",
                "600": "http://lorempixel.com/600/300/" + cat + "/3/600",
                "700": "http://lorempixel.com/700/350/" + cat + "/3/700",
                "940": "http://lorempixel.com/940/470/" + cat + "/3/940"
            },
            "/images/2x1.gif"
        );
    }
});