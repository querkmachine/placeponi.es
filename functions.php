<?php

  function log_it($err_no, $err_msg) {
    error_log("[".date('Y-m-d H:i:s T')."] (".$err_no.") ".$err_msg."\n", 3, "log");
  }

  // All this comes from here, I don't know the original author. 
  // http://pastebin.ca/355985

  // gives a nice rectangular crop of an image
  function zoom_crop($img, $w, $h, $grey = false)
  {
    // min resize the bastard...
    $img = c_minresize($img, $w, $h);
    
    $orig_w = imagesx($img);
    $orig_h = imagesy($img);
    
    $start_y = floor(($orig_h - $h) /2);
    $start_x = floor(($orig_w - $w) /2);

    // now lets create a new image...
    $new_im = imagecreatetruecolor($w, $h);
    
    imagecopy($new_im, $img,
          0,0,
          $start_x, $start_y,
          $w,$h);

    if($grey === true) { imagefilter($new_im, IMG_FILTER_GRAYSCALE); }
              
    return $new_im;
  }

  // modified from: http://www.zend.com/codex.php?id=379&single=1
  // original author of c_resize: http://www.zend.com/search_code_author.php?author=allah03
  function c_resize( $img, $max_width, $max_height) 
  { 
    $FullImage_width  = imagesx ($img);     // Original image width 
    $FullImage_height   = imagesy ($img);     // Original image height 
     
    // now we check for over-sized images and pare them down 
    // to the dimensions we need for display purposes 
    $ratio =  ( $FullImage_width > $max_width ) ? (real)($max_width / $FullImage_width) : 1 ; 
    $new_width = ((int)($FullImage_width * $ratio));    //full-size width 
    $new_height = ((int)($FullImage_height * $ratio));    //full-size height 
    //check for images that are still too high 
    $ratio =  ( $new_height > $max_height ) ? (real)($max_height / $new_height) : 1 ; 
    $new_width = ((int)($new_width * $ratio));    //mid-size width 
    $new_height = ((int)($new_height * $ratio));    //mid-size height 
     
    $NEW_IM = imagecreatetruecolor( $new_width , $new_height );        //create an image 
    imagecopyresampled( $NEW_IM, $img, 
            0,0,  0,0, //starting points 
            $new_width, $new_height, 
            $FullImage_width, $FullImage_height ); 
  
    return $NEW_IM;     
  }
  
  // constrained resize.. (min value)
  function c_minresize($img, $w, $h)
  {
    $src_w = imagesx($img);
    $src_h = imagesy($img);

    $pct_w = ($w / $src_w) * 100;
    $pct_h = ($h / $src_h) * 100;
    
    if($pct_w > $pct_h)
    {
      $new_w = $src_w * ($pct_w / 100);
      $new_h = $src_h * ($pct_w / 100);
    }
    else
    {
      $new_w = $src_w * ($pct_h / 100);
      $new_h = $src_h * ($pct_h / 100);
    }

    $new_w *= 1.05;
    $new_h *= 1.05;
    
    return c_resize( $img, $new_w, $new_h);
  }
