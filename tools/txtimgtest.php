<?php

function imageFromText($text){
	//Returns image resource
	$width = 7*(strlen($text));
	$height = 23;

	$im = imagecreatetruecolor($width, $height);
	imagealphablending($im,false);
	$transparent = imagecolorallocatealpha($im, 0,0,0,127);
	imagefilledrectangle($im,0,0,$width,$height,$transparent);
	imagealphablending( $im, true );

	// Color and add the text
	$black = imagecolorallocate($im, 20, 20, 20);
	$font = 'ARIAL.TTF';
	imagettftext($im, 12, 0, 4, 16, $black, $font, $text);

	imagealphablending( $im, false );
	imagesavealpha( $im, true );
	return $im;
}


$text = 'Error';
if($_GET["t"]){
	$text=$_GET["t"];
}
	
$im = imageFromText($text);

header('Content-Type: image/png');
imagepng( $im );
imagedestroy($im);
?>
