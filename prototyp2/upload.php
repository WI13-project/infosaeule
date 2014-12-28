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
<form action="check.php" method="post" enctype="multipart/form-data">
        <table>
               <tr>
                        <td>Bitte Bildnamen eingeben:</td>
                        <td><input type="text" name="bildname"></td>
                </tr>
                <tr>
                        <td>Bild ausw&auml;hlen:</td>
                        <td><input type="file" name="datei"></td>
                </tr>
                <tr>

                        <td> </td>

                </tr>
                <tr>

                        <td><b>Optional:</b></td>

                </tr>

                <tr>
                        <td>aktiv ab Datum(tt.mm.jjjj):</td>
                        <td><input type="text" name="aktab"></td>
                        <td>Uhrzeit(hh:mm):</td>
                        <td><input type="text" name="aktab"></td>
                </tr>
                <tr>
                        <td>aktiv bis Datum(tt.mm.jjjj):</td>
                        <td><input type="text" name="aktab"></td>
                        <td>Uhrzeit(hh:mm):</td>
                        <td><input type="text" name="aktab"></td>
                </tr>
        </table>
 <br>
<input type="submit" value="Hochladen">
</form>
Nur Bilder bis 1 MB im jpg,gif oder png-Format!

	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>