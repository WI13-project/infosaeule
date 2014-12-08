<?php
include("header.php");
?>
<h1>Willkommen beim Bild-Upload-Skript</h1>
<form action="check.php" method="post" enctype="multipart/form-data">
        <table>
                <tr>
                        <td>Bitte Namen eingeben:</td>
                        <td><input type="text" name="bildname"></td>
                </tr>
                <tr>
                        <td>Bild auswaehlen:</td>
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
Nur Bilder bis 1 MB im jpg oder gif-Format!