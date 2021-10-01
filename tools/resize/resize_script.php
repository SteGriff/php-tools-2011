<?php

$orig_uri = $_GET["url"];
$factor = $_GET["scale"];

$orig_img = @imagecreatefrompng($orig_uri)
	or die("Can't open the requested url. Must be a .png image.");

$orig_width = 0;
$orig_height = 0;

list($orig_width, $orig_height) = getimagesize($orig_uri)
	or die("Can't get size of ".$orig_uri);

$new_width = ($factor * $orig_width);
$new_height = ($factor * $orig_height);

$new_img = @imagecreate($new_width , $new_height)
	or die("Couldn't build new image stream. Hmm.");
	
@imagecopyresampled( $new_img  , $orig_img  , 0  , 0  , 0  , 0  , $new_width, $new_height  , $orig_width, $orig_height  )
	or die("Resampling image failed.");

header("Content-type: image/png");

imagepng($new_img);
?>