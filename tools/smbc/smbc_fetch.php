<?php
header('Content-Type: image/gif');
$comic_date = $_GET["date"];
$comic_date = str_replace("%2F","",$comic_date);
$comic_date = str_replace("/","", $comic_date);
$comic_date = str_replace(".","", $comic_date);
$comic_date = str_replace(" ","", $comic_date);
$url = "http://smbc-comics.com/comics/";
$uri = $url . $comic_date . ".gif";
$comic_img = imagecreatefromgif($uri);
imagegif($comic_img);
?>