<?php 

require_once("../config.php");

try {
	$db = new PDO("mysql:host=".Config::DB_HOST.";dbname=".Config::DB_NAME, Config::DB_USER, Config::DB_PASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}
catch(PDOException $e) {
	$return = $e->getMessage();
}

$type = !empty($_POST["type"]) ? $_POST["type"] : false;
$start = !empty($_POST["start"]) && is_numeric($_POST["start"]) ? $_POST["start"] : 0;
$limit = !empty($_POST["limit"]) && is_numeric($_POST["limit"]) ? $_POST["limit"] : 10;
$period = !empty($_POST["period"]) ? $_POST["period"] : false;
$buildQuery = "";
switch($type) {
	case "recent":
		$buildQuery .= "SELECT * FROM visits ORDER BY requestDatetime DESC";
		break;
	case "referrers":
		$buildQuery .= "SELECT referrerDomain, COUNT(*) as referrerCount FROM visits";
		switch($period) {
			case "1 day":
				$buildQuery .= " WHERE requestDatetime >= NOW() - INTERVAL 1 DAY";
				break;
			case "1 week":
				$buildQuery .= " WHERE requestDatetime >= NOW() - INTERVAL 1 WEEK";
				break;
			case "1 month":
				$buildQuery .= " WHERE requestDatetime >= NOW() - INTERVAL 1 MONTH";
				break;
			case "3 months":
				$buildQuery .= " WHERE requestDatetime >= NOW() - INTERVAL 3 MONTHS";
				break;
			case "6 months":
				$buildQuery .= " WHERE requestDatetime >= NOW() - INTERVAL 6 MONTHS";
				break;
			case "1 year":
				$buildQuery .= " WHERE requestDatetime >= NOW() - INTERVAL 1 YEAR";
				break;
		}
		$buildQuery .= " GROUP BY referrerDomain ORDER BY referrerCount DESC";
		break;
	case "sizes":
		$buildQuery .= "SELECT imageWidth, imageHeight, COUNT(*) as referrerCount FROM visits";
		switch($period) {
			case "1 day":
				$buildQuery .= " WHERE requestDatetime >= NOW() - INTERVAL 1 DAY";
				break;
			case "1 week":
				$buildQuery .= " WHERE requestDatetime >= NOW() - INTERVAL 1 WEEK";
				break;
			case "1 month":
				$buildQuery .= " WHERE requestDatetime >= NOW() - INTERVAL 1 MONTH";
				break;
			case "3 months":
				$buildQuery .= " WHERE requestDatetime >= NOW() - INTERVAL 3 MONTHS";
				break;
			case "6 months":
				$buildQuery .= " WHERE requestDatetime >= NOW() - INTERVAL 6 MONTHS";
				break;
			case "1 year":
				$buildQuery .= " WHERE requestDatetime >= NOW() - INTERVAL 1 YEAR";
				break;
		}
		$buildQuery .= " GROUP BY imageWidth, imageHeight ORDER BY referrerCount DESC";
		break;
	case "days":
		$buildQuery .= "SELECT COUNT(*) as requestCount, DATE(requestDatetime) as requestDate FROM visits";
		switch($period) {
			case "1 week":
				$buildQuery .= " WHERE requestDatetime >= NOW() - INTERVAL 1 WEEK";
				break;
			case "1 month":
				$buildQuery .= " WHERE requestDatetime >= NOW() - INTERVAL 1 MONTH";
				break;
			case "3 months":
				$buildQuery .= " WHERE requestDatetime >= NOW() - INTERVAL 3 MONTHS";
				break;
			case "6 months":
				$buildQuery .= " WHERE requestDatetime >= NOW() - INTERVAL 6 MONTHS";
				break;
			case "1 year":
				$buildQuery .= " WHERE requestDatetime >= NOW() - INTERVAL 1 YEAR";
				break;
		}
		$buildQuery .= " GROUP BY requestDate ORDER BY requestCount DESC";
		break;
	default:
		break;
}
$buildQuery .= " LIMIT " . $start . ", " . $limit; 
$query = $db->query($buildQuery);
$return = $query->fetchAll();

header("Content-type: application/json");
echo json_encode($return);