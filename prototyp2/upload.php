<?php
include("header.php");
?>
<h1>Willkommen beim Bild-Upload-Skript</h1>
<form action="check.php" method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Bitte Namen eingeben:</td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>Bild auswaehlen:</td>
			<td><input type="file" name="datei"></td>
		</tr>
	</table>
 <br>
<input type="submit" value="Hochladen">
</form>
Nur Bilder bis 1 MB im jpg oder gif-Format!
