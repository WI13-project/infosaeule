
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
 <head>
  <title>Infos&auml;ule</title>
  
  	<script language="JavaScript" type="text/javascript" src="js/header.js" ></script>
  	
  	<link href="css/nav.css" rel="stylesheet">
  	
  	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Infosäule</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Unterstützung für Media Queries und HTML5-Elemente in IE8 über HTML5 shim und Respond.js -->
    <!-- ACHTUNG: Respond.js funktioniert nicht, wenn du die Seite über file:// aufrufst -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 </head>
<html>
<body>

<nav class="navbar navbar-default fixed-top">
	<div class="container-fluid">
		<!-- Titel und Schalter werden für eine bessere mobile Ansicht zusammengefasst -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Navigation ein-/ausblenden</span>
        <span class="icon-bar"></span>
        
        <span class="icon-bar"></span>
      </button>
	<a class="navbar-brand" href=index.php>Infosäule</a>
	</div>
	 <!-- Alle Navigationslinks, Formulare und anderer Inhalt werden hier zusammengefasst und können dann ein- und ausgeblendet werden -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
	        <li><a href=index.php>Home <span class="sr-only">(aktuell)</span></a></li>
	        <li><a href=view.php>Show</a></li>
	        <li><a href=upload.php>Bild hochladen</a></li>
	        <?php
			if($_SESSION['rolle'] == 'admin' || $_SESSION['rolle'] == 'cm') {
				echo "<li><a href=cms.php>Inhalte verwalten</a></li>";
			}
			if($_SESSION['rolle'] == 'admin') {
				echo "<li><a href=form.php>Nutzer verwalten</a></li>";
			}
			?>							
      </ul>
       <ul class="nav navbar-nav navbar-right">
       		<li><p class="navbar-text"><?php echo "Sie sind eingeloggt als: ".$_SESSION['rolle']; ?></p></li>
          	<li><a href=logout.php>Ausloggen</a></li>
          	
       </ul>
 	 </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>