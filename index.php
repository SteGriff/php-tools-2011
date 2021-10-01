<?php
$PageName = "Main menu";
include("header.php");
?>

<style type="text/css">
img#logo{
	width: 50%;
	margin: 32px auto 32px 25%;
}
</style>
</head>
<body>
<img id="flourish" src="/php/img/flourish2.png" alt="Welcome!">

<div id="wrapper">
	<img id="logo" src="/php/img/logo.png" alt="Cloud Tools">

	<div class="translucent pink frame">
		<div class="content">
		
			<h1>Just some web gizmos.</h1>
			<p>Hi. These are some tools written in PHP, which can do some useful and some fun things. All the processing/presplotching/combobulation happens remotely on my server. You can use the webpages provided to interface with the tools, or the API details provided on some of them, if you are a developer. To the skies!</p>
			<h2>Gizmo list:</h2>
			<ul>
<?php include("appList.htm"); ?>
			</ul>
			
		</div>
	</div>
<?php include("footer.php"); ?>