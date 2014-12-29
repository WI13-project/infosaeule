<?php
include("auth-user.php");
include("header.php");
?>
<html>
<head>
	<title></title>
	
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		
<h1>Willkommen beim Bild-Upload-Skript</h1>

<form class="form-horizontal" action="check.php" method="post" enctype="multipart/form-data">
               <div class="control-group">
					<label class="control-label" for="bildname"></label>
						<div class="controls">
							<input type="text" id="bildname" placeholder="Bildbeschreibung">
					<span class="btn btn-default btn-file">
						Bild ausw&auml;hlen <input type="file" id="datei">
					</span>
						</div>
				   </div>
				   
					
    
           
		   
	
   
    
                

                        <h3>Optional:</h3>

             

				
                <div class="control-group">
                        <td>aktiv ab Datum(tt.mm.jjjj):</td>
                        <td><input type="text" name="aktab"></td>
                        <td>Uhrzeit(hh:mm):</td>
                        <td><input type="text" name="aktab"></td>
                </div>
                <div class="control-group">
                        <td>aktiv bis Datum(tt.mm.jjjj):</td>
                        <td><input type="text" name="aktab"></td>
                        <td>Uhrzeit(hh:mm):</td>
                        <td><input type="text" name="aktab"></td>
                </div>
 <br>

<input type="submit" value="Hochladen">
</form>
Nur Bilder bis 1 MB im jpg,gif oder png-Format!

	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<!--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed 
    <script src="js/bootstrap.min.js"></script> 
	-->
</body>
</html>