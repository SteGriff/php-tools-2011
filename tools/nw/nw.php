<?php
include('nwf.php');

if(!empty($_GET['q'])){
	die(convert_number_to_words($_GET['q']));
}
else{
	die("No ?q= parameter!");
}

?>