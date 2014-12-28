<?php
include("auth-cm.php");
?>
<html>
<head>
	<title></title>
	
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<h1>Willkommen im ContentManager</h1>
	<ul class="nav nav-tabs">
		<li class="active"><a href=cms.php>&Uuml;bersicht</a></li>
		<li><a href=cms_neue.php>Neue/freizugebende Bilder</a></li>
		<li><a href=cms_aktiv.php>Aktive Bilder</a></li>
		<li><a href=cms_inaktiv.php>Inaktive Bilder</a></li>
		<li><a href=cms_pref.php>Einstellungen</a></li>
		
	</ul>

</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
</body>
</html>