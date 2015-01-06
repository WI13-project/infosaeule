<?php
include("auth-cm.php");
?>
<html>
<head>
	<title></title>
	<script language="JavaScript" type="text/javascript" src="js/cms_links.js" ></script>	
  	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div id="inhalt" class="container">
	<h1>Willkommen im ContentManager</h1>
	<ul class="nav nav-tabs">
		<li id="cms_home" class="active"><a href=cms.php>&Uuml;bersicht</a></li>
		<li id="new"><a href=cms_neue.php>Neue/freizugebende Bilder</a></li>
		<li id="aktive"><a href=cms_aktiv.php>Aktive Bilder</a></li>
		<li id="inaktive"><a href=cms_inaktiv.php>Inaktive Bilder</a></li>
		<li id="pref"><a href=cms_pref.php>Einstellungen</a></li>		
	</ul>

</div>
</body>
</html>