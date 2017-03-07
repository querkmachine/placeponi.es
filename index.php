<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="description" content="Put a pony in your placeholder.">
	<meta name="keywords" content="my little pony, friendship is magic, mlp, fim, mlp:fim, ponies, bronies, design, designer, developer, development, placeholder, image, filler content, lorem ipsum, lorem pixel, lorem image, screenshot">
	<link rel="icon" type="image/png" href="/32">
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="/152">
	<style>
		html,
		body {
			margin: 0;
			padding: 0;
			min-height: 100%;
		}
		body {
			background-color: #111;
			background-position: center;
			background-size: cover;
			background-repeat: no-repeat;
			font-family: sans-serif;
			font-size: 14px;
			line-height: 1.5em;
		}
		a {
			color: inherit;
		}
		.wrapper {

		}
		.body {
			max-width: 280px;
			padding: 30px;
			position: fixed;
			top: 0;
			bottom: 0;
			left: 0;
			color: #111;
			background-color: #fff;
			background-color: rgba(255, 255, 255, .95);
			overflow: auto;
		}
		.header {
			text-align: center;
		}
		.header__branding {
			margin: 0;
			margin-bottom: 8px;
			font-size: 2.6em;
		}
		.header__tagline {
			font-size: 1.15em;
			font-weight: bold;
		}
		.main {

		}
		.content {

		}
		.example {
			margin-bottom: 10px;
		}
		.example__label {
			display: block;
			margin-bottom: 4px;
		}
		.example__input {
			box-sizing: border-box;
			width: 100%;
			margin-bottom: 5px;
			padding: 5px;
			border: 1px solid #ddd;
			font-family: inherit;
			font-size: inherit;
		}
		.footer {
			margin-top: 120px;
			font-size: 11px;
			line-height: 14px;
		}
		.footer__github {
			font-weight: bold;
			text-decoration: none;
		}
		.footer__github::before {
			content: "";
			display: inline-block;
			width: 16px;
			height: 16px;
			margin-right: 5px;
			margin-bottom: 5px;
			background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg%20height%3D%2216%22%20width%3D%2216%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%20%20%3Cpath%20d%3D%22M8%200C3.58%200%200%203.58%200%208c0%203.54%202.29%206.53%205.47%207.59%200.4%200.07%200.55-0.17%200.55-0.38%200-0.19-0.01-0.82-0.01-1.49-2.01%200.37-2.53-0.49-2.69-0.94-0.09-0.23-0.48-0.94-0.82-1.13-0.28-0.15-0.68-0.52-0.01-0.53%200.63-0.01%201.08%200.58%201.23%200.82%200.72%201.21%201.87%200.87%202.33%200.66%200.07-0.52%200.28-0.87%200.51-1.07-1.78-0.2-3.64-0.89-3.64-3.95%200-0.87%200.31-1.59%200.82-2.15-0.08-0.2-0.36-1.02%200.08-2.12%200%200%200.67-0.21%202.2%200.82%200.64-0.18%201.32-0.27%202-0.27%200.68%200%201.36%200.09%202%200.27%201.53-1.04%202.2-0.82%202.2-0.82%200.44%201.1%200.16%201.92%200.08%202.12%200.51%200.56%200.82%201.27%200.82%202.15%200%203.07-1.87%203.75-3.65%203.95%200.29%200.25%200.54%200.73%200.54%201.48%200%201.07-0.01%201.93-0.01%202.2%200%200.21%200.15%200.46%200.55%200.38C13.71%2014.53%2016%2011.53%2016%208%2016%203.58%2012.42%200%208%200z%22%20%2F%3E%0A%3C%2Fsvg%3E");
			background-size: contain;
			background-repeat: no-repeat;
			vertical-align: middle;
		}
		.footer__boilerplate {
			display: block;
			font-size: 1em;
			opacity: .7;
		}
	</style>
	<title>placeponi.es / put a pony in your placeholder</title>
</head>
<body>
	<div class="wrapper">
		<article class="body">
			<header class="header">
				<h1 class="header__branding">placeponi.es</h1>
				<div class="header__tagline">put a pony in your placeholder</div>
			</header>
			<main class="main">
				<div class="content">
					<p><em>Using cats and puppies for placeholder images is cool, but using ponies is 20% cooler!</em> That's why <b>placeponi.es</b> exists, a quick and easy way to throw everyone's favourite candy-coloured equines into your latest wireframe or mockup, just stick in a width and height and away you go!</p>	
				</div>
				<div class="example">
					<label class="example__label">Generate 400&times;300 image</label>
					<input type="text" class="example__input" readonly value="https://placeponi.es/400/300">
				</div>
				<div class="example">
					<label class="example__label">Generate grayscale image</label>
					<input type="text" class="example__input" readonly value="https://placeponi.es/400/300/g">
				</div>
				<div class="example">
					<label class="example__label">Generate multiple images with the same dimensions</label>
					<input type="text" class="example__input" readonly value="https://placeponi.es/400/300/1">
					<input type="text" class="example__input" readonly value="https://placeponi.es/400/300/2">
					<input type="text" class="example__input" readonly value="https://placeponi.es/400/300/3">
				</div>
			</main>
			<footer class="footer">
				<a class="footer__github" href="https://github.com/querkmachine/placeponi.es">placeponi.es on GitHub</a>
				<small class="footer__boilerplate">
					My Little Pony: Friendship is Magic is &copy; Hasbro. placeponi.es is not affiliated in any way with Hasbro or DHX Media. No copyright infringement intended. Another one of <a href="http://greysadventures.com/">Grey's Adventures</a>.
				</small>
			</footer>
		</article>
	</div>
	<script>
		// From https://davidwalsh.name/javascript-debounce-function
		function debounce(func, wait, immediate) {
			var timeout;
			return function() {
				var context = this, args = arguments;
				var later = function() {
					timeout = null;
					if (!immediate) func.apply(context, args);
				};
				var callNow = immediate && !timeout;
				clearTimeout(timeout);
				timeout = setTimeout(later, wait);
				if (callNow) func.apply(context, args);
			};
		};
		var setBackgroundImage = debounce(function() {
			var width = window.innerWidth;
			var height = window.innerHeight;
			document.body.style.backgroundImage = "url(/" + width + "/" + height + ")";
		}, 250);
		document.onload = setBackgroundImage();
		window.onresize = function() { setBackgroundImage(); }
	</script>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-31842948-3', 'auto');
		ga('send', 'pageview');
	</script>
</body>
</html>