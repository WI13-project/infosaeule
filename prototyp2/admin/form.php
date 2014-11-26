
<html>
	<head>
		<title>Nutzerverwaltung</title>
		<script src="form.js" language="JavaScript" type="text/javascript"></script>
	</head>
	<body>
		<form action="user.php" method="post">
		<div id="head">
			
			<a href="#" onclick="javascript:show_add('tbl_add');">
				<input id="radio_add" type="radio" name="radio_tbl" value="add" checked="true" style="display: none;">Benutzer Hinzuf&uumlgen</a>
			<a href="#" onclick="javascript:show_clr('tbl_clr');">
				<input id="radio_clr" type="radio" name="radio_tbl" value="clr" style="display: none;">Benutzer L&oumlschen</a>
		</div>
		<div id="tbl_add">
		<table>
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
		</div>
		
		<div id="tbl_clr" style="display:none;">
		<table>
			<tr> <td><b>Benutzer L&ouml;schen</b></td></tr>
			<tr>
				<td>Benutzernamen:</td>
				<td> <input type="text" name="user"> </td>
			</tr>
			
			<tr> <td> <input type="submit" name="remove" value="Loeschen"/></td></tr> 
		</table>
		</div>
		
	</form>
	</body>
</html>