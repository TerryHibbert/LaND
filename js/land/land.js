/*
 * A script to compliment the LaND CSS framework.
 * Watches for LaND media query changes and applies layout abbreviation to HTML element.
 * NB - It's working in recent Chrome. Add paulirish's matchMedia for some IE 9 support.
 */

var console = typeof console !== 'undefined' ? console : {log:function(){}};

var LaND = function(options) {
    var that = this;
    var options = typeof options !== 'undefined' ? options : {};

    this.mediaQuerySupport = typeof CSSMediaRule !== 'undefined';

    var defaults = {
        'applyToHTML': true
    };

    if (typeof jQuery === 'undefined') {
        console.log('jQuery is required');
        return;
    }

    options = jQuery.extend(defaults, options);

    this.layouts = {};

    var listeners = {
        change: {}
    };

    this.init = function() {
        console.log("LaND: init...");

        if (options.applyToHTML) addHTMLaddListeners();

        findMediaQueries();

        return this;
    }

    this.addListener = function(name, handler) {
        if (!listeners.hasOwnProperty(name)) {
            throw "LaND: Can't add listener to unknown event: '" + name + "'";
            return false;
        }

        listeners[name][handler] = handler;

        return that;
    }

    this.layoutChanges = function() {
        var result = {
            'add': [],
            'remove': []
        };
        var layouts = this.layouts;

        for (la in layouts) {
            if (layouts.hasOwnProperty(la)) {
                if (layouts[la]) {
                    result.add.push('La-'+la);
                } else {
                    result.remove.push('La-'+la);
                }
            }
        }

        return result;
    }

    function addHTMLaddListeners() {
        var $html = $('html');
        that.addListener(LaND.events.CHANGE, function() {
            var changes = that.layoutChanges();
            //console.log('Change event caught:');
            //console.log(changes);
            $html.removeClass(changes.remove.join(' '));
            $html.addClass(changes.add.join(' '));
        });
    }

    function dispatch(name, args) {
        var list = listeners[name];

        for (var prop in list) {
            if(list.hasOwnProperty(prop)){
                list[prop].apply(this, args);
            }
        }
    }

    function handleMediaChange(active, layouts) {
        console.log(layouts);
        console.log(active);

        var layoutLength = layouts.length;
        for (var i=0; i<layoutLength; ++i) {
            that.layouts[layouts[i]] = active;
        }

        dispatch('change', []);
    };

    function findMediaQueries() {

        if (!that.mediaQuerySupport) {
            console.log('LaND: MediaQueries are not supported by this browser');
            return;
        }

        var sheetsLength = document.styleSheets.length;
        var sheet;

        for (var i=0; i<sheetsLength; ++i) {
            sheet = document.styleSheets[i];

            if (sheet.href.indexOf('/land.') > -1) {
                console.log(sheet);

                var rules = sheet.cssRules || sheet.rules;
                var numRules = rules.length,
                    mqls = {};

                for (var j = 0; j < numRules; j += 1) {
                    if (rules[j].constructor === CSSMediaRule) {
                        //console.log('Found media rule:');
                        //console.log(rules[j].media.mediaText);
                        //console.log(rules[j].cssRules[0].selectorText);

                        var layouts = rules[j].cssRules[0].selectorText.split('-');
                        layouts.shift();

                        //console.log(layouts);

                        mqls['mql' + j] = window.matchMedia(rules[j].media.mediaText);
                        mqls['mql' + j].addListener(function(mql, layouts) {
                            return function() {
                                handleMediaChange(mql.matches, layouts);
                            }
                        }(mqls['mql' + j], layouts));

                        handleMediaChange(mqls['mql' + j].matches, layouts);
                    }
                }

                break; // CSS file found, stop looking.
            }
        }
    }
}

LaND.events = {
    CHANGE: 'change'
};