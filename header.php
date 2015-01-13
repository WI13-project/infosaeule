
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
 <head>
  <title>Infos&auml;ule</title>
  	<script language="JavaScript" type="text/javascript" src="js/header.js" ></script>
  	<link href="css/bootstrap.min.css" rel="stylesheet">
  	<link href="css/nav.css" rel="stylesheet">
 </head>
<html>
<body>
<div class="container">
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
		    	<div id="navbar" class="navbar-collapse collapse">  
		    		<ul class="nav navbar-nav">
		    			<li id="a_home">
		    				<a href=index.php>Home</a>
		    			</li>
		    			<li>
		    				<a href=view.php>Show</a>
		    			</li>
		    			<li id="a_upload">
		    				<a href=upload.php>Bild hochladen</a>
		    			</li>
						<?php
						if($_SESSION['rolle'] == 'admin' || $_SESSION['rolle'] == 'cm') {
							echo "<li id='a_inhalt'><a href=cms.php>Inhalte verwalten</a></li>";
						}
		    			if($_SESSION['rolle'] == 'admin') {
							echo "<li id='a_nutzer'><a href=form.php>Nutzer verwalten</a></li>";
		    			}
						?>						
		    			
		    		</ul>			
					<ul class="nav navbar-nav navbar-right">
		    			<li>
							<p class="navbar-text"><?php echo "Sie sind eingeloggt als: ".$_SESSION['rolle']; ?></p>
		    			</li>
		    			<li>
		    				<a href=logout.php>Ausloggen</a>
		    			</li>
		    			
		    		</ul>		
				</div>  <!--/.nav-collapse -->					 
			</div><!--/.container-fluid -->
		</nav>  	
	</div>
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>