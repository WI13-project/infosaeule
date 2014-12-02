
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
				<li id="a_add" style="background-color: #848484"><a href="#" onclick="javascript:show_add();">
					<input id="radio_add" type="radio" name="radio_tbl" value="add" checked="true" style="display:none;">Benutzer Hinzuf&uuml;gen</a></li>
				<li id="a_pwd_change" style="background-color: #D8D8D8"><a href="#" onclick="javascript:show_pwd_change();">
					<input id="radio_pwd_change" type="radio" name="radio_tbl" value="pwd_change" style="display: none;">Passwort &Auml;ndern</a></li>
        		<li id="a_clr" style="background-color: #D8D8D8"><a href="#" onclick="javascript:show_clr();">
					<input id="radio_clr" type="radio" name="radio_tbl" value="clr" style="display: none;">Benutzer L&ouml;schen</a></li>
			</ul>
		</div>
		
		<!-- Benutzer hinzufügen -->
		<div id="tbl_add" class="user_function" style="background-color: #848484">
		<table class="tbl">
			<tr > <th class="headline" colspan="2"><b>Benutzer Hinzuf&uuml;gen</b></th></tr>
			<tr>
				<td>Benutzernamen:</td>
				<td> <input type="text" name="new_name"> </td>
			</tr>
			<tr>
				<td>Passwort:</td>
				<td> <input type="text" name="new_pwd1"></td>
			</tr>
			<tr>
				<td>Passwort wiederholen:</td>
				<td> <input type="text" name="new_pwd2"></td>
			</tr>
			<tr> <td> <input type="submit" name="add" value="Hinzuf&uuml;gen"></td></tr>
		</table>
		</div>
		
		<!-- Passwort ändern -->
		<div id="tbl_pwd_change" class="user_function" style="display:none;">
		<table class="tbl">
			<tr > <th class="headline" colspan="2"><b>Passwort &Auml;ndern</b></th></tr>
			<tr>
			<td>Benutzernamen:</td>
				<td> <input type="text" name="chg_name"> </td>
			</tr>
			<tr>
				<td>Neues Passwort:</td>
				<td> <input type="text" name="chg_pwd1"></td>
			</tr>
			<tr>
				<td>Passwort wiederholen:</td>
				<td> <input type="text" name="chg_pwd2"></td>
			</tr>
			<tr> <td> <input type="submit" name="change" value="Passwort &Auml;ndern"></td></tr>
		</table>
		</div>
		
		<!-- Benutzer Löschen -->
		<div id="tbl_clr" class="user_function" style="display:none;">
		<table class="tbl">
			<tr > <th class="headline" colspan="2"><b>Benutzer L&ouml;schen</b></th></tr>
			<tr>
				<td>Benutzernamen:</td>
				<td> <input type="text" name="user"> </td>
			</tr>
			
			<tr> <td> <input type="submit" name="remove" value="L&ouml;schen"/></td></tr> 
		</table>
		</div>
		
	</form>
	</div>
	</body>
</html>
