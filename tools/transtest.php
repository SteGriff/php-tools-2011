<?php
// Set the content-type

header('Content-type: image/png');

// Create the image
$im = imagecreatetruecolor(175, 15);
imagesavealpha($im, true);

// Create some colors
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);
imagefilledrectangle($im, 0, 0, 150, 25, $black);
$trans_colour = imagecolorallocatealpha($im, 0, 0, 0, 127);
imagefill($im, 0, 0, $trans_colour);

// The text to draw
$text = $_GET['text'];
// Replace path by your own font path
$font = 'ARIAL.TTF';

// Add some shadow to the text
imagettftext($im, 9, 0, 13, 16, $black, $font, $text);

// Add the text
imagettftext($im, 9, 0, 12, 15, $white, $font, $text);

// Using imagepng() results in clearer text compared with imagejpeg()
imagepng($im);
imagedestroy($im);
?>