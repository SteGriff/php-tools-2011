<?php
$PageName = "Pixel art resizer";
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
	p.help{
		margin: 0.5em auto;
	}
	img#resized{
		margin: 10px;
	}
	span.code{
		color: blue;
		font-family: monospace;
		font-size: larger;
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
			
			<p><b>Resize pixel art</b></p>
			<p>Performs a nearest-neighbour resize on a PNG image. Not finished yet.</p>
			
			<form action="index.php" method="get">
				URL of original: 
				<input id="url" type="text" name="url" value="test.png">
				<br>
				Scale factor (Between 1 and 10): 
				<input id="scale" type="text" name="scale" value="5">
				<br>
				<input type="submit" value="Resize">
			</form>
			
		</div>
	</div>
	
	<div class="opaque pink frame">
		<div class="content">
			
			<p style="float:right"><a href="index.php?new=1">Reset</a></p>
			
			<?php

			$error="";
			$btw="";
			$url="";
			
			if (empty($_GET["new"])){
				//Catalog errors if this isn't first visit.
				if (empty($_GET["url"])){
					$error="You didn't supply the address of an image to resize. ";
				}
				else{
					$url=$_GET["url"];
					if (!getimagesize($url)){
						$error="There is no image at that address.";
					}
				}
				
				if (empty($_GET["scale"])){
					$btw="By the way, you didn't enter a scale, so it defaulted to 2x. ";
					$factor=2;
				}
				else{
					$factor = $_GET["scale"];
					if ($factor <= 1){
						$error += "Scale needs to be greater than 1.";
					}
					if ($factor > 10){
						$error += "I can't go higher than scale factor 10.";
					}
				}
			}
			else{
				//First visit, make friendly error
				$error = "Enter details above or use the sample image.";
			}
						
			if (empty($error)){
				$request = "resize_script.php?url=" . $url . "&scale=" . $factor; 
				$address_of_image="http://".$_SERVER['HTTP_HOST']."/php/tools/resize/$request";
				echo "<img id=\"resized\" src=\"" . $request . "\" alt=\"Resized image\">";
				echo "<p class=\"help\">Right click and select \"Save Image As...\" to keep the image.</p>";
				echo "<p class=\"help\">Forum code:<br /><span class=\"code\">[img]" . $address_of_image . "[/img]</span></p>";
			}
			else{
				echo "<p class=\"error\">" . $error . "</p>";
			}
			
			?>
			
		</div>
	</div>
<? include('../../footer.php'); ?>