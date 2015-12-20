<?php 
	require_once("../config.php");
	try {
		$db = new PDO("mysql:host=".Config::DB_HOST.";dbname=".Config::DB_NAME, Config::DB_USER, Config::DB_PASS);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	}
	catch(PDOException $e) {
		$e->getMessage();
	}
	function urlMaker($width, $height, $greyscale = false) {
		$output = "<a href=\"http://placeponi.es/";
		if($greyscale) {
			$output .= "g/";
		}
		$output .= $width."/".$height."\">".$width."&times;".$height."</a>";
		return $output;
	}
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Placeponi.es reporting</title>
	</head>
	<body>
		<h1>Placeponi.es reporting</h1>
		<p>The current archive only has data going back to 2014-02-10 15:11:00 UTC. Data from prior to this has unfortunately been deleted.</p>
		<h2>Most recent</h2>
		<table width="100%" border="1">
			<thead>
				<tr>
					<th>Requested (UTC)</th>
					<th>Image</th>
					<th>Referrer</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$query = $db->query("SELECT * FROM visits ORDER BY requestDatetime DESC LIMIT 100");
					while($row = $query->fetch()):
				?>
				<tr>
					<td><?php echo $row["requestDatetime"]; ?></td>
					<td>
						<?php echo urlMaker($row["imageWidth"], $row["imageHeight"], $row["imageGreyscale"]); ?>
						<?php if($row["imageVariant"]): ?>
							<abbr title="Variant"><?php echo $row["imageVariant"]; ?></abbr>
						<?php endif; ?>
						<?php if($row["imageGreyscale"]): ?>
							<abbr title="Greyscale">G</abbr>
						<?php endif; ?>
						<?php if($row["imageGenerated"]): ?>
							<abbr title="Image regenerated">N</abbr>
						<?php endif; ?>
					</td>
					<td><?php echo $row["referrerUrl"]; ?></td>
				</tr>
				<?php
					endwhile;
				?>
			</tbody>
		</table>
		<h2>Top referrers (all time)</h2>
		<table width="100%" border="1">
			<thead>
				<tr>
					<th>Domain</th>
					<th>Requests</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$query = $db->query("SELECT referrerDomain, COUNT(*) as referrerCount FROM visits WHERE referrerDomain IS NOT NULL GROUP BY referrerDomain ORDER BY referrerCount DESC LIMIT 25");
					while($row = $query->fetch()):
				?>
				<tr>
					<td><?php echo $row["referrerDomain"]; ?></td>
					<td><?php echo $row["referrerCount"]; ?></td>
				</tr>
				<?php
					endwhile;
				?>
			</tbody>
		</table>
		<h2>Top referrers (last month)</h2>
		<table width="100%" border="1">
			<thead>
				<tr>
					<th>Domain</th>
					<th>Requests</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$query = $db->query("SELECT referrerDomain, COUNT(*) as referrerCount FROM visits WHERE referrerDomain IS NOT NULL AND requestDatetime >= DATE_SUB(NOW(), INTERVAL 1 MONTH) GROUP BY referrerDomain ORDER BY referrerCount DESC LIMIT 10");
					while($row = $query->fetch()):
				?>
				<tr>
					<td><?php echo $row["referrerDomain"]; ?></td>
					<td><?php echo $row["referrerCount"]; ?></td>
				</tr>
				<?php
					endwhile;
				?>
			</tbody>
		</table>
		<h2>Most requested sizes</h2>
		<table width="100%" border="1">
			<thead>
				<tr>
					<th>Image dimensions</th>
					<th>Requests</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$query = $db->query("SELECT imageWidth, imageHeight, COUNT(*) as referrerCount FROM visits GROUP BY imageWidth, imageHeight ORDER BY referrerCount DESC LIMIT 10");
					while($row = $query->fetch()):
				?>
				<tr>
					<td><?php echo urlMaker($row["imageWidth"], $row["imageHeight"], false) ?></td>
					<td><?php echo $row["referrerCount"]; ?></td>
				</tr>
				<?php
					endwhile;
				?>
			</tbody>
		</table>
		<h2>Busiest days</h2>
		<table width="100%" border="1">
			<thead>
				<tr>
					<th>Date</th>
					<th>Requests</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$query = $db->query("SELECT COUNT(*) as requestCount, DATE(requestDatetime) as requestDate FROM visits GROUP BY requestDate ORDER BY requestCount DESC LIMIT 10");
					while($row = $query->fetch()):
				?>
				<tr>
					<td><?php echo $row["requestDate"] ?></td>
					<td><?php echo $row["requestCount"]; ?></td>
				</tr>
				<?php
					endwhile;
				?>
			</tbody>
		</table>
	</body>
</html>