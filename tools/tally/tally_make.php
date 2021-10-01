<?php
$quantity = $_GET["q"];
$spacing = 4;
$width_per_mark = (2 * $spacing) + 1;

if ($IE == true){
	$tally_img = imagecreate($quantity * $width_per_mark ,32);
	$white = imagecolorallocate($tally_img, 255,255,255);
}
else{
	$tally_img = imagecreatetruecolor($quantity * $width_per_mark ,32);
	$black = imagecolorallocate($tally_img, 0, 0, 0);
	imagecolortransparent($tally_img, $black);
}

imageantialias($tally_img, true);
$mark_colour = imagecolorallocate($tally_img, 1, 1, 1);

$mark = 0;
$left = 0;

for($mark = 0; $mark < $quantity; $mark++)
{
	if ($mark % 4 == 0 && $mark != 0){
		$backtrack = (8 * $spacing);
		imageline($tally_img, $left - $backtrack, 30, $left, 2, $mark_colour);
		$left += $width_per_mark;
		$quantity -= 1;
	}

	if($mark < $quantity){
		$left += 4;
		imageline($tally_img, $left, 2, $left, 30, $mark_colour);
		$left += 4;
	}

}

header("Content-type: image/png");
imagepng($tally_img);
?>