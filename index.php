<?php
  date_default_timezone_set("Europe/London");
  $now = time();
  $file = "//placeponi.es";
  if(date('H', $now) >= 21 || date('H', $now) <= 6) { 
    $file .= "/g";
  }
  $file .= "/5" . substr($now, 1, 2);
  $file .= "/4" . substr($now, 5, 2);
?><!doctype html>
<!-- 

         _,..wWWw--.11/+'.            11_      ,.
   ..wwWWWWWWWWW;7ooo8;11++++.        11.ll'  ,.++;"
    `'"">wW7;oOOOOOO8;:11++\++.      11.;;; .;"+++'   ,..
      ,ww7OOOOOOOO8,,,11++++\+++.    11lll',ll'++;  ,++;'
     ,oOOOOOOOO8,,,,11+++++`'++9ll. 11;lll ll:+++' ;+++'
    ;OOOOOOOOO8,,,'11++++++++++9lll 11;lll ll:++:'.+++'
    OOOO;OOO"8,,"/;11++++,+,++++9ll`11:llllll++++'+++
   OOOO;OO"8,,'11++'+++14;14###;"-11++9;;12X11 llll`;+++++++'  ,.    6,.      _
  ;O;'oOOO8 ,'11+++14\,-6:  14###11++++9ll12X 11:l.;;;,--++."-+++++ 6w":---wWWWWWww-._
 ;'  /O'"'"11++++++14' 6:;0";14#11'11+++9lll12XX6,11llll;++.+++++++++6W,6"WWWWWWWWww;""""'`
    ."     11`"+++++14'.13'"''`11;'9ll;12xXX6w11llll++;--.++++6;wWW;12xXXXXXXXXXx"6Ww.
           .+++++++++++';12xXXXXX6;W11ll"+-"++,'---"-12.x""`"9lllllllx12XXx6WWw.
           "12---'11++++++-;12XXXXXX6wWW11l"++++,"---++++"8,,,,,,,,,,;9lll12XXXx6WW,
             `'""""',+12xXXXXX6;wWW11'+++++++++;;;"4;;;;7;;;;7oOo8,,,,,9;;12XXX6;WW`
                   ,+12xXXXXX6wWw"11++.++++-.0;;11+++<'   4`"WWWww;7Oo8,,,9ll12XXX6"Ww
                   +12xXXX6"wwW"11+++++'"--00'"'  )11+++     4`WWW"Ww7OO8,,9lll12XXX6ww
                  ,X++++;"11+++++++++++0`., )  )11+++     4)W; ,W7OO8,,9lll12X:6"Ww
                  :++++++++++++++++++++4W8'"-12:11++++    4.W'  WW7OO8,,9lll12X; 6`w
                  .++++++++++++++++.+++4"ww 12:11+++'   4,"   ,WW7OO8,,9lll12X;  6;
           ;ll--.-"`.;++++++++++++++.+++;+8.12;11++(         4:WW7OO8,,9lll12Xx
          ,'lllllllll,++++;+++++++++;"++++++++++++-.    4:WW7OO8,,9lll12Xx
          ;llll;;;"';'++++;'"""'''`` `lll;;:+++++++++.  4WW7OOO8,,9lll12X'
         ,lllll,    ;+++++;            `"lllll.++++++++ 4WWw7O8,,,9ll12X;
         lllllll,  ,++++++;               llllll+++++++.4:WWw8',,9ll12x
        ,llllllll, ;++++++;               :llllll+++++++.4"WW8;,,9ll12x
        ;lllllllllV+++++++;               :lllllll+++++++.4`w'8 `.9l12x.
        `lllllllll'+++++++;               :lllllll++++++++  4`4\  12`,X\
         "llllll;++++++++;                ;llllll'+++++++++   4`-  12\X;
          "llll'+++++++++;               ;lllllll"+++++++++        12`)
           `-'`+++++++++;'              ,llllllll++++++++++
             +++++++++++;              ,llllllll'++++++++++
            '++++++++++"               `""""""""'+++++++++"

-->
<html lang="en-GB" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="description" content="Put a pony in your placeholder.">
  <meta name="keywords" content="my little pony, friendship is magic, mlp, fim, mlp:fim, ponies, bronies, design, placeholder, image, filler content, lorem ipsum, lorem pixel, lorem image, screenshot">
  <meta name="author" content="Grey Hargreaves (http://greysadventures.com/)">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <link rel="shortcut icon" href="//placeponi.es/16">
  <link rel="apple-touch-icon" sizes="144x144" href="//placeponi.es/144">
  <link rel="apple-touch-icon" sizes="114x114" href="//placeponi.es/114">
  <link rel="apple-touch-icon" sizes="72x72" href="//placeponi.es/72">
  <link rel="apple-touch-icon" href="//placeponi.es/57">
  <!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <[endif]-->
  <title>placeponi.es &mdash; put a pony in your placeholder</title>
  <style>
    @font-face {
      font-family: 'celestia_reduxmedium';
      src: url('/a/celestiamediumredux1.55-webfont.eot');
      src: url('/a/celestiamediumredux1.55-webfont.eot?#iefix') format('embedded-opentype'),
           url('/a/celestiamediumredux1.55-webfont.woff') format('woff'),
           url('/a/celestiamediumredux1.55-webfont.ttf') format('truetype'),
           url('/a/celestiamediumredux1.55-webfont.svg#celestia_reduxmedium') format('svg');
      font-weight: normal;
      font-style: normal;
    }
    html,
    body {
      min-height: 100%;
      margin: 0;
      padding: 0;
      position: relative;
    }
    body {
      position: absolute;
      top: 0; right: 0; bottom: 0; left: 0;
      color: #fff;
      background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAIAAAACCAYAAABytg0kAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABhJREFUeNpiYGBgmPn//38GRhABAgABBgBBQAaVpWxAOAAAAABJRU5ErkJggg=="), url('<?php echo $file; ?>');
      background-position: center center;
      background-attachment: scroll;
      -moz-background-size: auto auto, cover;
           background-size: auto auto, cover;
      font: 0.8em/1.5 "Helvetica Neue", Helvetica, Arial, FreeSans, sans-serif;
      -webkit-box-shadow: inset 0px 0px 10em 5em rgba(0, 0, 0, .5);
              box-shadow: inset 0px 0px 10em 5em rgba(0, 0, 0, .5);
    }
    a {
      color: #fff; 
    }
    .container {
      width: 300px;
      padding: 15px;
      position: fixed;
      top: 0; left: 0; bottom: 0;
      background-color: #222;
      background-color: rgba(0, 0, 0, 0.75);
    }
    .branding {
      text-align: center;
    }
    .branding h1 {
      margin: 0;
      font-size: 3em;
      font-family: "celestia_reduxmedium", "Helvetica Neue", Helvetica, Arial, FreeSans, sans-serif;
      font-weight: normal;
    }
    .branding strong {
      font-size: 1.2em;
    }
    #main {
      margin: 1em 0;
    }
    #main p:first-child {
      font-weight: bold;
    }
    .examples label {
      display: block;
      font-size: 0.9em;
    }
    .examples input {
      display: block;
      -webkit-box-sizing: border-box;
         -moz-box-sizing: border-box;
              box-sizing: border-box;
      width: 100%;
      margin-bottom: 8px;
      padding: 4px;
      border: 1px solid #222;
      -webkit-border-radius: 3px;
         -moz-border-radius: 3px;
              border-radius: 3px;
      color: #fff;
      background-color: #444;
      background-color: rgba(60, 60, 60, 0.4);
      font-size: 1.2em;
    }
    footer {
      position: absolute;
      bottom: 15px; right: 15px; left: 15px;
    }
  </style>
</head>
<body>
  <div class="container">
    <header class="branding">
      <h1>placeponi.es</h1>
      <strong>put a pony in your placeholder</strong>
    </header>
    <div id="main">
      <p>Using cats and puppies for placeholder images is cool, but using ponies is 20% cooler.</p>
      <p>That's why Placeponi.es exists, a quick and easy way to throw everyone's favourite candy-coloured equines into your latest wireframe or mockup, just stick in a width and height and away you go!</p>
      <div class="examples">
        <label for="standard">
          Link like so:
          <input type="text" id="standard" value="http://placeponi.es/400/300" readonly>
        </label>
        <label for="greyscale">
          Or for greyscale:
          <input type="text" id="greyscale" value="http://placeponi.es/g/400/300" readonly>
        </label>
      </div>
    </div>
    <footer>
      <small>
        My Little Pony: Friendship is Magic is &copy; Hasbro. Placeponi.es is not affiliated in any way with Hasbro or DHX Media. No copyright infringement intended. Another one of <a href="//greysadventures.com">Grey's Adventures</a>.
      </small>
    </footer>
  </div>
  <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-31842948-3']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

  </script>
</body>
</html>