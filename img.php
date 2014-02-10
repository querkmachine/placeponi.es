<?php

  require('functions.php');

  date_default_timezone_set("UTC");
  error_reporting(E_ALL);
  set_error_handler("log_it");

  define('images_dir', getcwd().'/images/');
  define('cache_dir', getcwd().'/cache/');

  $imgWidth = $_GET['w'];
  if(!empty($_GET['h'])) { $imgHeight = $_GET['h']; } else { $imgHeight = $imgWidth; }
  if(!empty($_GET['g'])) { $grey = true; } else { $grey = false; }
  if(!empty($_GET['regen'])) { $regen = true; } else { $regen = false; }
  $referer =  $_SERVER['HTTP_REFERER'];

  if($imgWidth < 1) { $imgWidth = 1; }
  elseif($imgWidth > 1280) { $imgWidth = 1280; }

  if($imgHeight < 1) { $imgHeight = 1; }
  elseif($imgHeight > 1280) { $imgHeight = 1280; }

  header("Content-type: image/png");

  if($grey) { $fileName = cache_dir."{$imgWidth}_{$imgHeight}_g.png"; }
  else { $fileName = cache_dir."{$imgWidth}_{$imgHeight}.png"; }

  if(!file_exists($fileName) || $regen === true) {

    // Pick out a random file for our use
    // From Stack Overflow: http://stackoverflow.com/questions/1761252/how-to-get-random-image-from-directory-using-php
    $listFiles = glob(images_dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
    $workingFile = $listFiles[array_rand($listFiles)];

    // Prepare for croppage
    $newFile = imagecreatefromstring(file_get_contents($workingFile));

    // Zoom crop this thing
    $newFile = zoom_crop($newFile, $imgWidth, $imgHeight, $grey);

    // And save it
    imagepng($newFile, $fileName);

    if($regen === true) {
      log_it(601, "$fileName regenerated. (".$referer.")");
    } else { 
      log_it(600, "$fileName generated. (".$referer.")");
    }
  }
  else {
    log_it(602, "$fileName loaded from cache. (".$referer.")");
  }

  readfile($fileName);

?>