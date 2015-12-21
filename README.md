# placeponi.es
A random evening's coding that lets you put a pony in your placeholder. Service available online at [placeponi.es](http://placeponi.es/). Can, of course, be repurposed to create placeholder images of any sort—ponies not required.

Source code is provided as-is, with no guarantees as to quality or support. 

## URL parameters
URL parameters can be written in any order and are delimited by a forward slash (/). Numerical values must be defined in order of width, height, and variant; aka, the first integer is assumed to be width, the second height, and third variant. They do not need to be grouped, so URLs like `http://placeponi.es/400/g/300/regen/3` are perfectly valid. 

`http://placeponi.es/400/300`  
Generate a standard image 400 pixels wide and 300 pixels tall. Both values are capped between 1 and 5000 pixels. 

`http://placeponi.es/400/300/1`
Add a third number to use multiple images with the same dimensions. Values are capped between 0 and 9, allowing for up to 10 variants. 

`http://placeponi.es/400/300/g`
Add `/g/` anywhere in the URL to make the image grayscale. 

`http://placeponi.es/400/300/regen` 
Add `/regen/` anywhere in the URL to replace the existing image of this type.

## Changelog 

### 2.0.1 
* Re-enable logging for images with a referrer of placeponi.es. 

### 2.0.0
* Refactor basically everything.
* Now supports generating images larger than the source image.
* Now supports generating more that one image with the same dimensions. 
* Now supports putting URL parameters in (almost) any order.
* Added simple (and very unfinished) logging page. 

### 1.1.1
* Fix issue caused by there being no referrer information available.
* Simplify how `img.php` grabs URL parameters.

### 1.1.0
* Add referrer tracking.

### 1.0.0
* Initial release.
