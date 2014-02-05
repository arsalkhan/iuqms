<?php

include("../application/config/constants.php");

// save to file (true) or output to browser (false)
$save_to_file = false;

// quality
$image_quality = 100;

// resulting image type (1 = GIF, 2 = JPG, 3 = PNG)
// enter code of the image type if you want override it
// or set it to -1 to determine automatically
$image_type = -1;

// maximum thumb side size
$max_x = 100;
$max_y = 100;

// Folder where source images are stored (thumbnails will be generated from these images).
// MUST end with slash.
$images_folder = '';

// Folder to save thumbnails, full path from the root folder, MUST end with slash.
// Only needed if you save generated thumbnails on the server.
// Sample for windows:     c:/wwwroot/thumbs/
// Sample for unix/linux:  /home/site.com/htdocs/thumbs/
$thumbs_folder = '';


///////////////////////////////////////////////////
/////////////// DO NOT EDIT BELOW
///////////////////////////////////////////////////

$to_name = '';

if (isset($_REQUEST['f'])) {
  $save_to_file = intval($_REQUEST['f']) == 1;
}

if (isset($_REQUEST['src'])) {
  $from_name = urldecode($_REQUEST['src']);
}
else {
  die("Source file name must be specified.");
}

if (isset($_REQUEST['dest'])) {
  $to_name = urldecode($_REQUEST['dest']);
}
else if ($save_to_file) {
  die("Thumbnail file name must be specified.");
}

if (isset($_REQUEST['q'])) {
  $image_quality = intval($_REQUEST['q']);
}

if (isset($_REQUEST['t'])) {
  $image_type = intval($_REQUEST['t']);
}

if (isset($_REQUEST['x'])) {
  $max_x = intval($_REQUEST['x']);
}

if (isset($_REQUEST['y'])) {
  $max_y = intval($_REQUEST['y']);
}

// Allocate all necessary memory for the image.
// Special thanks to Alecos for providing the code.
ini_set('memory_limit', '-1');

function SaveImage($type, $im, $filename, $quality, $to_file = true)
{
  $res = null;

  // ImageGIF is not included into some GD2 releases, so it might not work
  // output png if gifs are not supported
  if(!function_exists('imagegif')) $type = 3;

  switch ($type) {
    case 1:
      if ($to_file) {
        $res = imagegif($im,$filename);
      }
      else {
        header("Content-type: image/gif");
        $res = imagegif($im);
      }
      break;
    case 2:
      if ($to_file) {
        $res = imagejpeg($im,$filename,$quality);
      }
      else {
        header("Content-type: image/jpeg");
        $res = imagejpeg($im,'',$quality);
      }
      break;
    case 3:
      if ($to_file) {
        $res = imagepng($im,$filename);
      }
      else {
        header("Content-type: image/png");
        $res = imagepng($im);
      }
      break;
  }

  return $res;

}

function ImageCreateFromType($type,$filename)
{
 $im = null;
 switch ($type) 
 {
   case 1:
     $im = imagecreatefromgif($filename);
     break;
   case 2:
     $im = imagecreatefromjpeg($filename);
     break;
   case 3:
     $im = imagecreatefrompng($filename);
     break;
  }
  return $im;
}

// generate thumb from image and save it
function GenerateThumbFile($from_name, $to_name, $max_x, $max_y) 
{

  global $save_to_file, $image_type, $image_quality;

  // if src is URL then download file first
  $temp = false;
  if (substr($from_name,0,7) == 'http://') {
    $tmpfname = tempnam(DIR_PATH."tmp/", "TmP-");
    $temp = @fopen($tmpfname, "w");
    if ($temp) {
      @fwrite($temp, @file_get_contents($from_name)) or die("Cannot download image");
      @fclose($temp);
      $from_name = $tmpfname;
    }
    else {
      die("Cannot create temp file");
    }
  }

  // get source image size (width/height/type)
  // orig_img_type 1 = GIF, 2 = JPG, 3 = PNG
  list($orig_x, $orig_y, $orig_img_type, $img_sizes) = getimagesize($from_name);

  // should we override thumb image type?
  $image_type = ($image_type != -1 ? $image_type : $orig_img_type);

  // check for allowed image types
  if ($orig_img_type < 1 or $orig_img_type > 3) die("Image type not supported");

  if ($orig_x > $max_x or $orig_y > $max_y) {

    // resize
    $per_x = $orig_x / $max_x;
    $per_y = $orig_y / $max_y;
    if ($per_y > $per_x) {
      $max_x = $orig_x / $per_y;
    }
    else {
      $max_y = $orig_y / $per_x;
    }

  }
  else
  {
	// keep original sizes, i.e. just copy
	if ($save_to_file)
	{
	  @copy($from_name, $to_name);
	}
	else
	{
	  switch ($image_type)
	  {
		case 1:
			header("Content-type: image/gif");
			readfile($from_name);
			break;
		case 2:
			header("Content-type: image/jpeg");
			readfile($from_name);
			break;
		case 3:
			header("Content-type: image/png");
			readfile($from_name);
			break;
	  }
	}
	return;
  }

  if ($image_type == 1) {
    // should use this function for gifs (gifs are palette images)
    $ni = imagecreate($max_x, $max_y);
  }
  else {
    // Create a new true color image
    $ni = imagecreatetruecolor($max_x,$max_y);
  }

  // Fill image with white background (255,255,255)
  $white = imagecolorallocate($ni, 255, 255, 255);
  imagefilledrectangle( $ni, 0, 0, $max_x, $max_y, $white);
  // Create a new image from source file
  $im = ImageCreateFromType($orig_img_type,$from_name); 
  // Copy the palette from one image to another
  imagepalettecopy($ni,$im);
  // Copy and resize part of an image with resampling
  imagecopyresampled(
    $ni, $im,             // destination, source
    0, 0, 0, 0,           // dstX, dstY, srcX, srcY
    $max_x, $max_y,       // dstW, dstH
    $orig_x, $orig_y);    // srcW, srcH

  // save thumb file
  SaveImage($image_type, $ni, $to_name, $image_quality, $save_to_file);

  if($temp) {
    unlink($tmpfname); // this removes the file
  }
}

// generate
GenerateThumbFile($images_folder . $from_name, $thumbs_folder. $to_name, $max_x, $max_y);

?>