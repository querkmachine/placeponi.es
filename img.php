<?php 

// Includes
require_once("config.php");
require_once("functions.php");

$startTime = microtime(true);

// Default properties
$imageWidth = 400;
$imageHeight = $imageWidth;
$imageVariant = 0;
$imageGrayscale = false;
$imageRegen = false;

// Get automatically defined properties
$numericParamCounter = 0;
$referrer = !empty($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : null;

// Get user-defined properties
$parameters = explode("/", $_GET["params"]);
for($i = 0; $i < count($parameters); $i++) {
	$value = $parameters[$i];
	if($value === "g") {
		$imageGrayscale = true;
	}
	else if($value === "regen") {
		$imageRegen = true;
	}
	else if(is_numeric($value)) {
		switch($numericParamCounter) {
			case 0:
				$imageWidth = $value;
				$imageHeight = $value;
				break;
			case 1:
				$imageHeight = $value;
				break;
			case 2: 
				$imageVariant = $value;
				break;
		}
		$numericParamCounter++;
	}
}

// Clip properties that are outside of acceptable bounds
if($imageWidth < 1) { $imageWidth = 1; }
else if($imageWidth > 5000) { $imageWidth = 5000; }
else { $imageWidth = floor($imageWidth); }

if($imageHeight < 1) { $imageHeight = 1; }
else if($imageHeight > 5000) { $imageHeight = 5000; }
else { $imageHeight = floor($imageHeight); }

if($imageVariant < 0) { $imageVariant = 0; }
else if($imageVariant > 9) { $imageVariant = 9; }
else { $imageVariant = floor($imageVariant); }

// Get the associated filename
$filename = Config::DIR_GENERATED . md5("{$imageWidth}_{$imageHeight}_{$imageVariant}_{$imageGrayscale}") . ".png";
$filenameLocal = getcwd() . $filename;

// If the file doesn't exist, create it 
if(!file_exists($filenameLocal) || $imageRegen === true) {
	$imageRegen = true;
	// First, pick something at random...
	$listFiles = glob(getcwd() . Config::DIR_SOURCE . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
	$workingFile = $listFiles[array_rand($listFiles)];
	// ...run it through the appropriate processing...
	$workingFile = new resize($workingFile);
	$workingFile->resizeImage($imageWidth, $imageHeight);
	if($imageGrayscale) {
		$workingFile->grayscaleImage();
	}
	// ...and then save it out
	$workingFile->saveImage($filenameLocal, 100);
}

$timeElapsed = microtime(true) - $startTime;

// Connect to the database to log this shizzle
try {
	$db = new PDO("mysql:host=".Config::DB_HOST.";dbname=".Config::DB_NAME, Config::DB_USER, Config::DB_PASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	$query = $db->prepare("INSERT INTO visits (requestDatetime, imageWidth, imageHeight, imageGreyscale, imageVariant, imageGenerated, referrerUrl, referrerDomain, requestResponseTime) VALUES (:datetime, :width, :height, :greyscale, :variant, :generated, :url, :domain, :response)");
	$query->execute(array(
		"datetime" => date("Y-m-d H:i:s"),
		"width" => $imageWidth, 
		"height" => $imageHeight,
		"greyscale" => $imageGrayscale,
		"variant" => $imageVariant,
		"generated" => $imageRegen,
		"url" => $referrer,
		"domain" => parse_url($referrer, PHP_URL_HOST),
		"response" => $timeElapsed
	));
}
catch(PDOException $e) {
	// Do nothing for now I guess???
	// $e->getMessage();
}

// Output the requested image
header("Location: " . $filename);
