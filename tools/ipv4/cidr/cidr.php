<?php

define("ADDRESS_MAX_VALUE", 4294967296);

function allOfHaystackAfterNeedle($haystack, $needle){
	$pos = stripos($haystack,$needle);
	$result="";
	if ($pos > -1){
		$result = substr($haystack, $pos + 1);
		return $result;
	}
	else{
		return $haystack;
	}
}

function makeSubnetMask($numOfAddresses){
	$subnetMaskValue = ADDRESS_MAX_VALUE - $numOfAddresses;
	//Change the whole thing to hex like ffffffff
	$hexValue = dechex($subnetMaskValue);
	
	//Split it to pairs, ff ff ff ff
	$splitArray = str_split($hexValue,2);
	$result="";
	
	foreach($splitArray as $pair){
		//Change each pair to dec (255) and concatenate with dots
		$decPair = hexdec($pair);
		$result .= $decPair . ".";
	}
	//Remove trailing dot and return
	$result = rtrim($result, ".");
	return $result;
}

if (empty($_GET["p"])){
	die("No POST");
}

$error ="";
$prefix = $_GET["p"];
$prefix = allOfHaystackAfterNeedle($prefix, "/");

if ($prefix < 0){
	$error = "Prefix must be /0 or greater";
}
else if($prefix > 32){
	$error = "Prefix must be /32 or less";
}

$bits = 32 - $prefix;
$numOfAddresses = pow(2,$bits);

$subnetMask = makeSubnetMask($numOfAddresses);

if ($error){
	$JSONData = array("error" => $error);
}
else{
	$JSONData = array(
		"bits" => $bits,
		"range" => $numOfAddresses,
		"mask" => $subnetMask
	);
}

$theJSON = json_encode($JSONData);
$strippedJSON = str_replace('\/','/',$theJSON);
die($strippedJSON);

?>
