<?php
$PageName = "Tally generator";
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
	p#help{
		margin: 0.5em 0em;
	}
	img#comic{
		margin: 20px;
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
			
			<p><b>Tally marks</b>, or <b>hash marks</b>, are a unary numeral system. They are a form of numeral</a> used for counting. They allow updating written intermediate results without erasing or discarding anything written down.</p>
			<p><b>This page</b></i> is a tool which generates an image of tally marks.</p>
			
			<form action="index.php" method="get">
				How many?: 
				<input id="quantity" type="text" name="q">
				<input type="submit" value="Generate">
			</form>
			
		</div>
	</div>
	
	<div class="opaque pink frame">
		<div class="content">
			
			<p style="float:right"><a href="index.php?new=1">Reset</a></p>
			
			<?php

			$can_continue = true;
			$too_big = false;
			
			if (empty($_GET["q"])){
				$can_continue = false;
			}
			else{
				$quantity = $_GET["q"];
				if (!is_numeric($quantity) || $quantity <= 0){
					$can_continue = false;
				}
				elseif ($quantity > 3600){
					$can_continue = false;
					$too_big = true;
				}
			}

			if ($can_continue){
				$request = "tally_make.php?q=" . $quantity;
				echo "<h2>Tally</h2>";
				echo "<img id=\"comic\" src=\"" . $request . "\" alt=\"Tally chart of " . $quantity . " items\">";
				echo "<p id=\"help\">Right click and select \"Save Image As...\" to keep this tally image.</p>";
			}
			else{
				if (empty($_GET["new"])){
					echo "<p class=\"error\">Tally chart could not be generated.</p>";
					if ($too_big){
						echo "<p>Sorry, I can't tally more than 3600 items.</p>";
					}
					else{
						echo "<p>Did you enter a whole number greater than zero?</p>";
					}
				}
				else{
					echo "<p class=\"error\">Enter a number above.</p>";
				}
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