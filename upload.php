<?php
include("auth-user.php");
include("header.php");
?>
<html>

<body>
        <div id="upload" class="container">

<h1>Willkommen beim Bild-Upload-Skript</h1>

<form class="form-horizontal" action="check.php" method="post" enctype="multipart/form-data">
               <div class="control-group">
                                        <label class="control-label" for="bildname"></label>
                                                <div class="controls">
                                                        <input name="bildname" type="text" id="bildname" placeholder="Bildbeschreibung" required autofocus>
                                        <span class="btn btn-default btn-file">
                                                Bild ausw&auml;hlen <input name="datei" type="file" id="datei">
                                        </span>
                                                </div>
                                   </div>

<!--
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
-->
<input class="btn btn-default btn-file" type="submit" value="Hochladen">
</form>
<h4>Nur Bilder bis 1 MB im jpg,gif oder png-Format!</h4>
<<<<<<< HEAD
<h5>Bilder werden automatisch auf 1920x1080 Pixel und in einem 16:9-Breitbild scaliert.<br>
Dies geschieht bei PNG und GIF durch transparente Hintergr&uuml;nde.<br>
Bei JPG sind die Hintergr&uuml;nde grunds&auml;tzlich Schwarz.</h5>
=======
<h5>Bilder werden automatisch auf 1920x1080 Pixel und in einem 16:9-Breitbild skaliert.<br>
Dies geschieht bei PNG und GIF durch transparente Hintergr&uuml;nde.<br>
Bei JPG sind die Hintergr&uuml;nde grunds&auml;tzlich schwarz.</h5>
>>>>>>> origin/release


        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed
    <script src="js/bootstrap.min.js"></script>
        -->
</body>
</html>