var LaND = function() {
    var that = this;

    this.layouts = {};

    this.init = function() {
        console.log("LaND init...");

        var sheetsLength = document.styleSheets.length;
        var sheet;

        for (var i=0; i<sheetsLength; ++i) {
            sheet = document.styleSheets[i];
            if (sheet.href.indexOf('/land.') > -1) {
                //console.log(sheet);

                var rules = sheet.cssRules,
                    numRules = rules.length,
                    mqls = {};

                var mediaChange = function (active, layouts) {
                    //console.log(layouts);
                    //console.log(active);

                    var layoutLength = layouts.length;
                    for (var i=0; i<layoutLength; ++i) {
                        that.layouts[layouts[i]] = active;
                    }
                };

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
                                mediaChange(mql.matches, layouts);
                            }
                        }(mqls['mql' + j], layouts));

                        mediaChange(mqls['mql' + j].matches, layouts);
                    }
                }
                break;
            }
        }
        return this;
    }

}