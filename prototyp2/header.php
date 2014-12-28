
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
 <head>
  <title>Infos&auml;ule</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/nav.css" rel="stylesheet">
 </head>
<html>
<body>

	<div class="container">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
		    	<div id="navbar" class="navbar-collapse collapse">  
		    		<ul class="nav navbar-nav">
		    			<li>
		    				<a href=index.php>Home</a>
		    			</li>
		    			<li>
		    				<a href=view.php>Show</a>
		    			</li>
		    			<li>
		    				<a href=upload.php>Bild hochladen</a>
		    			</li>
		    			<li>
		    				<a href=cms.php>CMS</a>
		    			</li>
		    			<li>
		    				<a href=form.php>Nutzer anlegen</a>
		    			</li>
		    			
		    		</ul>			
					<ul class="nav navbar-nav navbar-right">
		    			<li>
							<a><?php echo "Sie sind eingeloggt als: ".$_SESSION['rolle']; ?></a>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>