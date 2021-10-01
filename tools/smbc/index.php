<?php
$PageName = "SMBC Fetcher";
include("../../header.php");
?>

<style type="text/css">
	.error{
		font-size: larger;
		font-weight: bold;
		color: #b7124c;
	}
	form, hr{
		margin: 10px;
	}
	
</style>

</head>
<body>
<img id="flourish" src="/php/img/flourish2.png" alt="Welcome!">

<div id="wrapper">
	<a href="/php/index.php"><img id="logo" src="/php/img/logoSmall.png" alt="Back to Main Menu"></a>

	<div class="translucent pink frame">
		<div class="content">
		
			<h1><?php echo $PageName; ?></h1>
			
			<p><a href="http://www.smbc-comics.com/"><b>Saturday Morning Breakfast Cereal</b></a></i> (<i><b>SMBC</b></i>) is a humorous webcomic by Zach Weiner.</p>
			<p><b>This page</b></i> is a tool for retrieving SMBC comics when the website is not available from your location.</p>
			
			<form action="index.php" method="get">
				Enter a date (yyyy/mm/dd): 
				<input id="date" type="text" name="date">
				<input type="submit" value="View">
			</form>
			
		</div>
	</div>
	
	<div class="opaque pink frame">
		<div class="content">
			
			<p style="float:right"><a href="index.php">Reset</a></p>
			
			<?php

			if (empty($_GET)){
				echo "<p class=\"error\">No comic data has been entered.</p>";
			}
			else{
				$comic_date = str_replace("/","%2F", $_GET["date"]);
				$request = "smbc_fetch.php?date=" . $comic_date;
				/*if (!getimagesize($request)){
					echo "<p class=\"error\">That date is not valid, or there was no comic on that date.</p>";
				}else{}*/
				echo "<img id=\"comic\" src=\"" . $request . "\" alt=\"SMBC for " . $comic_date . "\">";
			}

			?>
			
		</div>
	</div>
	
	<div class="translucent blue frame">
		<div class="content" id="copyrightFrame">
			<p id="copyright"><a href="http://stegriff.co.uk">Stephen Griffiths</a> 2011</p>
		</div>
	</div>

</div>
</body>
</html>