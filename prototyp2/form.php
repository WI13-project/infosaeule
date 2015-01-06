<?php
include("auth-admin.php");
include("header.php");
?>
<html>
	<head>
		<title>Nutzerverwaltung</title>
		<script language="JavaScript" type="text/javascript" src="js/form.js" ></script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div id="nutzer" class="container">
		<h1>Willkommen bei der Nutzerverwaltung</h1>
		<div id="admin">
		<form action="user.php" method="post">
		<div class="menue">
			<ul class="nav nav-tabs">
				<li class="active" id="a_add" ><a href="#" onclick="javascript:show_add();">
					<input id="radio_add" type="radio" name="radio_tbl" value="add" checked="true" style="display:none;">Benutzer Hinzuf&uuml;gen</a></li>
				<li id="a_pwd_change" ><a href="#" onclick="javascript:show_pwd_change();">
					<input id="radio_pwd_change" type="radio" name="radio_tbl" value="pwd_change" style="display: none;">Passwort &Auml;ndern</a></li>
        		<li id="a_clr" ><a href="#" onclick="javascript:show_clr();">
					<input id="radio_clr" type="radio" name="radio_tbl" value="clr" style="display: none;">Benutzer L&ouml;schen</a></li>
			</ul>
		</div>
		
		<!-- Benutzer hinzufügen -->
		<div id="tbl_add" class="user_function" >
		<table class="tbl">
			<tr > <th class="headline" colspan="2"><b>Benutzer Hinzuf&uuml;gen</b></th></tr>
			<tr>
				<td>Benutzernamen:</td>
				<td> <input id="add_name" type="text" name="new_name" autofocus> </td>
			</tr>
			<tr>
				<td>E-Mail Adresse:</td>
				<td> <input type="text" name="mail"> </td>
			</tr>
			<tr>
				<td>Benutzergruppe:</td>
				<td > 
					<div class="menue">
					<ul  style="list-style: none;">
						<li><input id="radio_admin" type="radio" name="radio_user_group" value="admin">Administrator</a></li>
						<li><input id="radio_cm" type="radio" name="radio_user_group" value="cm">Contenmanager</a></li>
		        		<li><input id="radio_user" type="radio" name="radio_user_group" checked="true" value="user">User</a></li>
					</ul>
					</div>
				</td>
			</tr>
			<tr>
				<td>Passwort:</td>
				<td> <input type="password" name="new_pwd1"></td>
			</tr>
			<tr>
				<td>Passwort wiederholen:</td>
				<td> <input type="password" name="new_pwd2"></td>
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
				<td> <input id="chg_name" type="text" name="chg_name"> </td>
			</tr>
			<tr>
				<td>Neues Passwort:</td>
				<td> <input type="password" name="chg_pwd1"></td>
			</tr>
			<tr>
				<td>Passwort wiederholen:</td>
				<td> <input type="password" name="chg_pwd2"></td>
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
				<td> <input id="clr_name" type="text" name="user"> </td>
			</tr>
			
			<tr> <td> <input type="submit" name="remove" value="L&ouml;schen"/></td></tr> 
		</table>
		<table border="1" style="margin-top: 50px;">
			<tr>
				<td width="150px" style="padding: 2px;"><b>Benutzername</b></td>
				<td width="150px" style="padding: 2px;"><b>Gruppe</b></td>
			</tr>
			<?php
				$db = new SQLite3("db/infosaeule.sqlite");
				$results = $db->query("SELECT Benutzername, Gruppe FROM user");
				while ($row = $results->fetchArray()){
					 echo "<tr><td style='padding: 2px;'>".$row['Benutzername']."</td>";
					 echo "<td style='padding: 2px;'>".$row['Gruppe']."</td>";
					 echo "</tr>";
         		}
			
			?>
		</table>
		</div>
		
	</form>
	</div>
	</div>
	
	</body>
</html>
