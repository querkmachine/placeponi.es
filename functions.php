<?php 

// Code based on a stripped down version of thus TutsPlus code: 
// http://code.tutsplus.com/tutorials/image-resizing-made-easy-with-php--net-10362

Class resize {
	private $image;
	private $width;
	private $height;
	private $imageResized;

	function __construct($fileName) {
		$this->image = $this->openImage($fileName);
		$this->width = imagesx($this->image);
		$this->height = imagesy($this->image);
	}

	private function openImage($file) {
		$extension = strtolower(strrchr($file, "."));
		switch($extension) {
			case ".jpg":
			case ".jpeg":
				$img = @imagecreatefromjpeg($file);
				break;
			case ".gif":
				$img = @imagecreatefromgif($file);
				break;
			case ".png":
				$img = @imagecreatefrompng($file);
				break;
			default: 
				$img = false;
				break;
		}
		return $img;
	}

	public function resizeImage($newWidth, $newHeight) {
		$optionArray = $this->getOptimalCrop($newWidth, $newHeight);
		$optimalWidth = $optionArray["optimalWidth"];
		$optimalHeight = $optionArray["optimalHeight"];
		$this->imageResized = imagecreatetruecolor($optimalWidth, $optimalHeight);
		imagecopyresampled($this->imageResized, $this->image, 0, 0, 0, 0, $optimalWidth, $optimalHeight, $this->width, $this->height);
		$this->crop($optimalWidth, $optimalHeight, $newWidth, $newHeight);
	}

	private function getOptimalCrop($newWidth, $newHeight) {
		$widthRatio = $this->width / $newWidth;
		$heightRatio = $this->height / $newHeight;
		if($heightRatio < $widthRatio) {
			$optimalRatio = $heightRatio;
		}
		else {
			$optimalRatio = $widthRatio;
		}
		$optimalWidth = $this->width / $optimalRatio;
		$optimalHeight = $this->height / $optimalRatio;
		return array("optimalWidth" => $optimalWidth, "optimalHeight" => $optimalHeight);
	}

	private function crop($optimalWidth, $optimalHeight, $newWidth, $newHeight) {
		$cropStartX = ($optimalWidth / 2) - ($newWidth / 2);
		$cropStartY = ($optimalHeight / 2) - ($newHeight / 2);
		$crop = $this->imageResized;
		$this->imageResized = imagecreatetruecolor($newWidth, $newHeight);
		imagecopyresampled($this->imageResized, $crop, 0, 0, $cropStartX, $cropStartY, $newWidth, $newHeight, $newWidth, $newHeight);
	}

	public function grayscaleImage() {
		imagefilter($this->imageResized, IMG_FILTER_GRAYSCALE);
	}

	public function saveImage($savePath, $imageQuality = 100) {
		$extension = strtolower(strrchr($savePath, "."));
		switch($extension) {
			case ".jpg":
			case ".jpeg":
				if(imagetypes() & IMG_JPG) {
					imagejpeg($this->imageResized, $savePath, $imageQuality);
				}
				break;
			case ".gif":
				if(imagetypes() & IMG_GIF) {
					imagegif($this->imageResized, $savePath);
				}
				break;
			case ".png":
				$scaleQuality = round(($imageQuality / 100) * 9);
				$invertScaleQuality = 9 - $scaleQuality;
				if(imagetypes() & IMG_PNG) {
					imagepng($this->imageResized, $savePath, $invertScaleQuality);
				}
				break;
		}
		imagedestroy($this->imageResized);
	}

}