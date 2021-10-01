<html>
<head>
<title>Bible In One Year</title>
</head>
<body>
<?php
	$rss = new DOMDocument();
	$rss->load('http://thebibleinoneyear.wordpress.com/feed/');
	$feed = array();
	foreach ($rss->getElementsByTagName('item') as $node) {
		$item = array (
			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
			'description' => $node->getElementsByTagName('description')->item(0)->nodeValue,
			);
		array_push($feed, $item);
	}
	$limit = 7;
	for($x=0;$x<$limit;$x++) {
		$title = str_replace(' &amp; ', ' &amp;amp; ', $feed[$x]['title']);
		$desc = $feed[$x]['description'];
		$start = strpos($desc, "dings:");
		$start = ($start ? $start : stripos($desc, "s are:"));
		$desc = substr($desc, $start+6);
		
		//Stripos is case insensitive
		$psalm_loc = stripos($desc, "psalm");
		$psalm_loc = ($psalm_loc ? $psalm_loc : stripos($desc, "psalms"));
		$prov_loc = stripos($desc, "proverbs");
		$end = 64;
		if ($psalm_loc){
			$end = strpos($desc, " ", $psalm_loc+9);
		}
		else{
			$end = strpos($desc, " ", $prov_loc+12);
		}
		$desc = substr($desc, 0, $end);
		echo "<p>$title<br/><b>$desc</b></p>\n";
	}
?>
<p>Service from <a href="http://twitter.com/stegriff">@SteGriff</a>. God bless!</p>
</body>
</html>
