
<?php
include("header.php");
?>
<html>
	<head>
		<title>Nutzerverwaltung</title>
		<script language="JavaScript" type="text/javascript" src="js/form.js" ></script>
		<link rel="stylesheet" type="text/css" href="css/form.css">
	</head>
	<body>
		<div id="admin">
		<form action="user.php" method="post">
		<div id="menue">
			<ul>
				<li id="a_add" style="background-color: #848484"><a href="#" onclick="javascript:show_add('tbl_add');">
					<input id="radio_add" type="radio" name="radio_tbl" value="add" checked="true" style="display:none;">Benutzer Hinzuf&uumlgen</a></li>
        		<li id="a_clr" style="background-color: #D8D8D8"><a href="#" onclick="javascript:show_clr('tbl_clr');">
					<input id="radio_clr" type="radio" name="radio_tbl" value="clr" style="display: none;">Benutzer L&oumlschen</a></li>
			</ul>
		</div>
		<div id="tbl_add" style="background-color: #848484">
		<table>
			<tr style="text-decoration: underline"> <td><b>Benutzer Hinzuf&uuml;gen</b></td></tr>
			<tr>
				<td>Benutzernamen:</td>
				<td> <input type="text" name="name"> </td>
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
			<tr style="text-decoration: underline"> <td><b>Benutzer L&ouml;schen</b></td></tr>
			<tr>
				<td>Benutzernamen:</td>
				<td> <input type="text" name="user"> </td>
			</tr>
			
			<tr> <td> <input type="submit" name="remove" value="Loeschen"/></td></tr> 
		</table>
		</div>
		
	</form>
	</div>
	</body>
</html>
