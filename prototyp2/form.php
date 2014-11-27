<?php
include("header.php");
?>
<html>
	<head>
		<title>Nutzerverwaltung</title>
	</head>
	<body>
	<!--<a href="#" onclick="show_add()">Benutzer Hinzuf&uumlgen</a>
	<a href="#" onclick="show_clr()">Benutzer L&oumlschen</a>-->
	<form action="user.php" method="post">
		<table id="add">
			<tr> <td><b>Benutzer Hinzuf&uuml;gen</b></td></tr>
			<tr>
				<td>Benutzernamen:</td>
				<td> <input type="text" name="name" value="name"> </td>
			</tr>
			<tr>
				<td>Passwort:</td>
				<td> <input type="text" name="pwd"></td>
			</tr>
			<tr> <td> <input type="submit" name="add" value="Hinzufuegen"></td></tr>
		</table>
		<!-- erstmal ausgeblendet, da nicht genutzt -->
		<table id="clr" style="display:none;">
			<tr> <td><b>Benutzer L&ouml;schen</b></td></tr>
			<tr>
				<td>Benutzernamen:</td>
				<td> <input type="text" name="user"> </td>
			</tr>
			
			<tr> <td> <input type="submit" name="remove" value="Loeschen"/></td></tr> 
		</table>
	</form>
	</body>
</html>
