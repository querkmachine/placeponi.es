<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="robots" content="noindex, nofollow">
	<link rel="stylesheet" href="assets/stylesheet.css">
	<title>placeponi.es / usage reporting</title>
</head>
<body>
	<header class="header">
		<h1><a href="/">placeponi.es</a> / usage reporting</h1>
		<p>The current archive only has data going back to 2014-02-10 15:11:00 UTC. Data from prior to this has unfortunately been deleted.</p>
	</header>
	<main class="main">
		<section class="group group--3">
			<div class="group__item">
				<article class="report">
					<header class="report__header">
						Referrers (last 24 hours)
					</header>
					<div class="report__body">
						<table class="table" data-referrers-day>
							<thead>
								<tr>
									<th class="string">Domain</th>
									<th class="number">Referrals</th>
								</tr>
							</thead>
							<tbody>
								<tr><td colspan="2" class="loading"> </td></tr>
							</tbody>
						</table>
					</div>
				</article>
			</div>
			<div class="group__item">
				<article class="report">
					<header class="report__header">
						Referrers (last month)
					</header>
					<div class="report__body">
						<table class="table" data-referrers-month>
							<thead>
								<tr>
									<th class="string">Domain</th>
									<th class="number">Referrals</th>
								</tr>
							</thead>
							<tbody>
								<tr><td colspan="2" class="loading"> </td></tr>
							</tbody>
						</table>
					</div>
				</article>
			</div>
			<div class="group__item">
				<article class="report">
					<header class="report__header">
						Referrers (all time)
					</header>
					<div class="report__body">
						<table class="table" data-referrers-all>
							<thead>
								<tr>
									<th class="string">Domain</th>
									<th class="number">Referrals</th>
								</tr>
							</thead>
							<tbody>
								<tr><td colspan="2" class="loading"> </td></tr>
							</tbody>
						</table>
					</div>
				</article>
			</div>
			<div class="group__item">
				<article class="report">
					<header class="report__header">
						Most requested (all time)
					</header>
					<div class="report__body">
						<table class="table" data-sizes>
							<thead>
								<tr>
									<th class="img-sep" colspan="3">Image</th>
									<th class="number">Requests</th>
								</tr>
							</thead>
							<tbody>
								<tr><td colspan="4" class="loading"> </td></tr>
							</tbody>
						</table>
					</div>
				</article>
			</div>
			<div class="group__item">
				<article class="report">
					<header class="report__header">
						Busiest days (last year)
					</header>
					<div class="report__body">
						<table class="table" data-dates-year>
							<thead>
								<tr>
									<th class="string">Date</th>
									<th class="number">Requests</th>
								</tr>
							</thead>
							<tbody>
								<tr><td colspan="2" class="loading"> </td></tr>
							</tbody>
						</table>
					</div>
				</article>
			</div>
			<div class="group__item">
				<article class="report">
					<header class="report__header">
						Busiest days (all time)
					</header>
					<div class="report__body">
						<table class="table" data-dates-all>
							<thead>
								<tr>
									<th class="string">Date</th>
									<th class="number">Requests</th>
								</tr>
							</thead>
							<tbody>
								<tr><td colspan="2" class="loading"> </td></tr>
							</tbody>
						</table>
					</div>
				</article>
			</div>
			<div class="group__item group__item--wider">
				<article class="report">
					<header class="report__header">
						Recent requests
					</header>
					<div class="report__body">
						<table class="table" data-recent>
							<thead>
								<tr>
									<th class="string">Time</th>
									<th class="img-sep" colspan="3">Image</th>
									<th class="string">Flags</th>
									<th class="string">Referrer</th>
								</tr>
							</thead>
							<tbody>
								<tr><td colspan="6" class="loading"> </td></tr>
							</tbody>
						</table>
					</div>
				</article>
			</div>
		</section>
	</main>
	<script type="template/x-mustache" data-mustache-referrer>
		<tr>
			<td class="primary string">
				{{#referrerDomain}}{{referrerDomain}}{{/referrerDomain}}
				{{^referrerDomain}}<em>(no referrer)</em>{{/referrerDomain}}
			</td>
			<td class="secondary number">
				{{referrerCount}}
			</td>
		</tr>
	</script>
	<script type="template/x-mustache" data-mustache-recent>
		<tr>
			<td class="secondary string">
				{{requestDatetime}}
			</td>
			<td class="primary img-w">
				{{imageWidth}}
			</td>
			<td class="primary img-sep">
				&times;
			</td>
			<td class="primary img-h">
				{{imageHeight}}
			</td>
			<td class="secondary string">
				{{#imageVariant}}<span class="flag flag--blue" title="Variant {{imageVariant}}">{{imageVariant}}</span>{{/imageVariant}}
				{{#imageGreyscale}}<span class="flag flag--grey" title="Grayscale">G</span>{{/imageGreyscale}}
				{{#imageGenerated}}<span class="flag flag--red" title="New/regenerated image">R</span>{{/imageGenerated}}
			</td>
			<td class="primary string">
				{{#referrerUrl}}{{referrerUrl}}{{/referrerUrl}}
				{{^referrerUrl}}<em>(no referrer)</em>{{/referrerUrl}}
			</td>
		</tr>
	</script>
	<script type="template/x-mustache" data-mustache-sizes>
		<tr>
			<td class="primary img-w">
				{{imageWidth}}
			</td>
			<td class="primary img-sep">
				&times;
			</td>
			<td class="primary img-h">
				{{imageWidth}}
			</td>
			<td class="secondary number">
				{{referrerCount}}
			</td>
		</tr>
	</script>
	<script type="template/x-mustache" data-mustache-dates>
		<tr>
			<td class="primary string">
				{{requestDate}}
			</td>
			<td class="secondary number">
				{{requestCount}}
			</td>
		</tr>
	</script>
	<script src="/reporting/assets/jquery-1.11.3.min.js"></script>
	<script src="/reporting/assets/mustache.js"></script>
	<script>
		var reporting = {
			loadReferrers: function($target, period) {
				period = typeof period !== 'undefined' ? period : false;
				$.ajax({
					url: "query.php",
					method: "POST",
					data: {
						type: "referrers",
						period: period,
						limit: 15
					}
				}).done(function(data) {
					var template = $("[data-mustache-referrer]").html();
					Mustache.parse(template);
					var output;
					$.each(data, function(i, row) {
						output += Mustache.render(template, row);
					});
					$target.html(output);
				});
			},
			loadRecent: function($target) {
				$.ajax({
					url: "query.php",
					method: "POST",
					data: {
						type: "recent",
						limit: 50
					}
				}).done(function(data) {
					var template = $("[data-mustache-recent]").html();
					Mustache.parse(template);
					var output;
					$.each(data, function(i, row) {
						if(row.imageVariant == 0) { row.imageVariant = false; } 
						if(row.imageGreyscale == 0) { row.imageGreyscale = false; } 
						if(row.imageGenerated == 0) { row.imageGenerated = false; } 
						output += Mustache.render(template, row);
					});
					$target.html(output);
				});
			},
			loadSizes: function($target) {
				$.ajax({
					url: "query.php",
					method: "POST",
					data: {
						type: "sizes",
						limit: 5
					}
				}).done(function(data) {
					var template = $("[data-mustache-sizes]").html();
					Mustache.parse(template);
					var output;
					$.each(data, function(i, row) {
						output += Mustache.render(template, row);
					});
					$target.html(output);
				});
			},
			loadDates: function($target, period) {
				period = typeof period !== 'undefined' ? period : false;
				$.ajax({
					url: "query.php",
					method: "POST",
					data: {
						type: "days",
						period: period,
						limit: 5
					}
				}).done(function(data) {
					var template = $("[data-mustache-dates]").html();
					Mustache.parse(template);
					var output;
					$.each(data, function(i, row) {	
						console.log(row);
						output += Mustache.render(template, row);
					});
					$target.html(output);
				});
			},
		}
		$(document).ready(function() {
			reporting.loadReferrers($("[data-referrers-day] tbody"), "1 day");
			reporting.loadReferrers($("[data-referrers-month] tbody"), "1 month");
			reporting.loadReferrers($("[data-referrers-all] tbody"));
			reporting.loadRecent($("[data-recent] tbody"));
			reporting.loadSizes($("[data-sizes] tbody"));
			reporting.loadDates($("[data-dates-year] tbody"), "1 year");
			reporting.loadDates($("[data-dates-all] tbody"));
		});
	</script>
</body>
</html>