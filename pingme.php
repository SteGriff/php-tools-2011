<?php
if (empty($_POST["user"]) || empty($_POST["machine"])){
	header('Content-Type: text/plain');
	echo "UNAUTHORISED";
}
else{
	$username = $_POST["user"];
	$machine = $_POST["machine"];

	$file=fopen("log.txt","a");
	$content = "user[" . $username . "] on [" . $machine . "]\n";
	fwrite($file,$content);
	fclose($file);
}
?>