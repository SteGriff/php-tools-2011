<?php
$PageName = "Number Words";
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
			
			<p><b>Changes a numeric sequence into speakable words</b></p>
			
			<form action="index.php" method="get">
				Number:
				<input id="q" type="text" name="q" value="427">
				<input type="submit" value="Convert">
			</form>
			
			<p><b>API</b></p>
			<p>Usage: <span class="code">
			<a href="http://stegriff.co.uk/php/tools/nw/nw.php?q=99">
			http://stegriff.co.uk/php/tools/nw/nw.php?q=99
			</a></span></p>
			<p>Thanks to <a href="http://www.karlrixon.co.uk/">Karl Rixon</a> (<a href="http://www.karlrixon.co.uk/writing/convert-numbers-to-words-with-php/">original</a>)</p>

		</div>
	</div>
	
	<div class="opaque pink frame">
		<div class="content">
			
			<p style="float:right"><a href="index.php?new=1">Reset</a></p>
			
			<?php
				
			$error="";
			$query="";
			
			if (empty($_GET["new"])){
				//This is not a clean page
				if (empty($_GET["q"])){
					$error="You didn't supply a number.";
				}
				else{
					$query=$_GET['q'];
					if (!is_numeric($query)) {
						$error="Input was not numeric.";
					}
				}
			}
			else{
				//First visit, make friendly error
				$error = "Enter number above and click 'Convert'";
			}
			
			if (empty($error)){
				//Import the number word function. It's OK to declare it here.
				include('nwf.php');
				$answer = convert_number_to_words($query);
				echo "<span class=\"code\">$answer</span><br />";
			}
			else{
				echo "<p class=\"error\">" . $error . "</p>";
			}
			?>
		</div>
	</div>
<?php include("../../footer.php"); ?>