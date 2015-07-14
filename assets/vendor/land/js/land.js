/*
 * A script to compliment the LaND CSS framework.
 * Watches for LaND media query changes and applies layout abbreviation to HTML element.
 * NB - It's working in recent Chrome. Add paulirish's matchMedia for some IE 9 support.
 */

var console = typeof console !== 'undefined' ? console : {log:function(){}};

var LaND = function(options) {
    var that = this;
    options = typeof options !== 'undefined' ? options : {};

    this.mqls = {};

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

        findMediaQueries();

        return this;
    }

    this.addListener = function(name, handler) {
        if (!listeners.hasOwnProperty(name)) {
            throw "LaND: Can't add listener to unknown event: '" + name + "'";
            //return false;
        }

        listeners[name][handler] = handler;

        return that;
    };

    this.layoutChanges = function() {
        var result = {
            'add': [],
            'remove': []
        };
        var layouts = this.layouts;

        for (var la in layouts) {
            if (layouts.hasOwnProperty(la)) {
                if (layouts[la]) result.add.push('La-'+la);
                else {
                    result.remove.push('La-'+la);
                }
            }
        }

        return result;
    };

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
    }

    function findMediaQueries() {

        var sheetsLength = document.styleSheets.length;
        var sheet;

        for (var i=0; i<sheetsLength; ++i) {
            sheet = document.styleSheets[i];

            if (sheet.href.indexOf('/land.') > -1) {
                console.log(sheet);

                var rules = sheet.cssRules || sheet.rules;
                var numRules = rules.length;

                var landInfoRule = rules[0];
                console.log(landInfoRule.cssText);
                var landInfoString = landInfoRule.cssText.split("*")[1];
                console.log(landInfoString);
                var rows = landInfoString.split('|');
                console.log(rows);
                that.landInfo = {
                    'layouts': rows[0].split(','),
                    'subLayouts': rows[1].split(','),
                    'max': rows[2].split(','),
                    'min': rows[3].split(','),
                    'containerMax': rows[4].split(',')
                };
                console.log(that.landInfo);

                if (that.mediaQuerySupport) {
                    for (var j = 1; j < numRules; j += 1) {
                        if (rules[j].constructor === CSSMediaRule) {

                            var layouts = rules[j].cssRules[0].selectorText.split('-');
                            layouts.shift();

                            that.mqls[j] = window.matchMedia(rules[j].media.mediaText);
                            that.mqls[j].addListener(function(mql, layouts) {
                                return function() {
                                    handleMediaChange(mql.matches, layouts);
                                }
                            }(that.mqls[j], layouts));

                            console.log(that.mqls[j]);

                            handleMediaChange(that.mqls[j].matches, layouts);
                        }
                    }
                }

                break; // CSS file found, stop looking.
            }
        }
    }
};

LaND.events = {
    CHANGE: 'change'
};