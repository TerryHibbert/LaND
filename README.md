# LaND
A responsive, fraction based CSS layout framework.

## CONTAINER
Wrap your page with an container of class 'LaND-container', optionally with 'center' and/or 'animate'.

## COL LAYOUTS
Usage add these classes to your block elements: 'col La-N-D' where:
'La' is replaced by the shorthand of the targeted layout:
```
a   :   any
b   :   big
d   :   desktop
t   :   tablet
m   :   mobile
ml  :   mobile landscape
mp  :   mobile portrait
```

There's also limited visibility options for print vs screen
```
p   :   print only
s   :   screen only
```

Then '-N-D' to represent the fraction: N/D where
```
'N'   is the numerator (top of the fraction)
'D'   is the denominator (bottom of the fraction)
```

E.g. 'col a-1-2 mp-1-1' will be a half column that changes to full width on mobile portrait.

## PADDING / MARGINS
Generally, only padding should be used as margins breaks horisontal box model. Margin is OK vertically though.
By default, col has 20px padding. This can be modified with classes like so:

```
a-pad-0     : No padding for all layouts
m-pad-h-1   : Horisontal padding of 10px for mobile layout
t-pad-v-4   : Vertical padding of 40px for tablet layout
a-pad-b-2   : Bottom padding of 20px for all layouts
```

Padding classes can be chained. The following has 40px padding on everything except 20px on mobile and 0px horisontal on mobile portrait.
```
a-pad-4 m-pad-2 mp-pad-h-0
```

## OTHER STYLES:
This framework and documentation are not complete. There are other features that use a similar format. Some quick examples:
```
a-float-right m-float-left      : This will float right except for mobile which will float right.
a-clear-left                    : Does what it says
m-text-center                   : Center text on mobile
mp-margin-auto                  : Margin auto on mobile portrait
a-position-absolute             : Does what it says
m-z99                           : z-index of 99 (depths: 9, 99, 999 ... 999999)
m-border-bottom-3               : Border of 3px on mobile
                                  (some shorthands are now available: m-border-b-3)
<img> a-fill                    : Make an image width 100%
```

... There's more, have a dig around.

## JAVASCRIPT:
Don't use the JS library yet. It's a work in progress.

## TIPS:
* Look at the example pages for implementation and examples.
* IE8 and below are fixed width. There are no surely no mobile devices (we care about) using <IE8.
* Edit the SCSS and not the CSS. Add non-layout styles to a different CSS file loaded after LaND
* SASS is required to modify LaND, but not to use without modification
* Layout definitions can be defined in /css/land.scss

## BUGS / FEATURE REQUESTS / HELP:
Please use GitHub issues (with appropriate labels) to report bugs, suggest enhancements and ask questions.

---
Copyright &copy; 2013 Terry Hibbert

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.