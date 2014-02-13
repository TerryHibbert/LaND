# LaND (and AIR beta)
A responsive, fraction based CSS layout framework. Now Mobile First!

##INTRODUCING AIR...
Adaptive Image Requests - A JS solution to enable the browser to request the appropriate size image for it's container.
Examples only, documentation to come:
    /example4.html

## CONTAINER
Wrap your page with an container of class 'LaND-container', optionally with 'center' and/or 'animate'.

## COL LAYOUTS
Usage add these classes to your block elements: 'col La-N-D' where:
'La' is replaced by the shorthand of the targeted layout:
```
s   :   small
m   :   mobile
ml  :   mobile landscape
t   :   tablet
d   :   desktop
dl  :   desktop large
```
Following the mobile first paradigm, layouts cascade from smallest to large.
i.e. small settings will affect all layouts unless overridden by wider layouts.
The default 'La-N-D' setting for 'col' elements is 's-1-1' (full width).

Then '-N-D' to represent the fraction: N/D where
```
'N'   is the numerator (top of the fraction)
'D'   is the denominator (bottom of the fraction)
```

E.g. 'col m-1-2 t-1-3' will be a full column that:
    On mobile and wider will be half of of it's container wide...
    until tablet, when it becomes one third of the container width.


There's also limited visibility options for print vs screen
```
print   :   print only
screen   :   screen only
```

## PADDING / MARGINS
Generally, only padding should be used as horizontal margins break the box model. Margin is OK vertically though.
By default, col has 10px padding. This can be modified with classes like so:

```
s-pad-0     : No padding for all layouts
m-pad-h-1   : Horizontal padding of 10px for mobile and wider layouts
t-pad-v-2   : Vertical padding of 40px for tablet and wider layout
d-pad-b-4   : Bottom padding of 20px for desktop layouts
```

Padding classes can be chained. The following has:
* no horizontal padding on on the small layout (and default vertical padding of 10px)
* 20px of padding on mobile and wider layouts
* 40px of horizontal padding on tablet and wider layouts.
```
...class="col s-pad-h-0 m-pad-2 t-pad-h-4"...
```

## OTHER STYLES:
This framework and documentation are not complete. There are other features that use a similar format. Some quick examples:
```
s-float-right d-float-left      : This will float right up to desktop which will float left.
s-clear-left                    : Does what it says
m-text-center                   : Center text on mobile (also right and left)
ml-margin-auto                  : Margin auto on mobile landscape (center the block)
s-position-absolute             : Does what it says
m-z99                           : z-index of 99 (depths: 9, 99, 999 ... 999999) for mobile and wider
m-border-bottom-3               : Border of 3px on mobile and wider
                                  (some shorthands are now available: m-border-b-3)
<img class="s-fill"...          : Make an image width 100%
<img class="s-fit"              : Make an image max width 100%
```

... There's more, have a dig around.

##

## INCLUDING LAND
The two main files are:
'land-mobile.css'               : Core styles and 's', 'm' and 'ml' layouts (always loaded)
'land-responsive.css'           : 't' and wider layouts (loaded when needed or if ie9)

'land-desktop.css'              : Fixed width 'd' layout for IE 8 and other old browsers with no MediaQuery support.

Conditional comments and javascript tests detect capabilities and decide what's to be loaded. See 'PHP usage' for the
recommended inclusion method.

## PHP usage
A php bootstrap file exists for easy LaND inclusion in <head>:
```
<php include 'land.php'; ?>
```
Edit land.php to point to the right place and used the right breakpoint.

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