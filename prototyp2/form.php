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
		<div class="menue" style="margin-bottom: 20px;">
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
			<tr > <th class="headline" colspan="2"><b><h3>Benutzer Hinzuf&uuml;gen</h3></b></th></tr>
			<tr>
				<td>Benutzernamen:</td>
				<td> <input class="form-control" id="add_name" type="text" name="new_name" autofocus> </td>
			</tr>
			<tr>
				<td>E-Mail Adresse:</td>
				<td> <input class="form-control" type="text" name="mail"> </td>
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
				<td> <input class="form-control" type="password" name="new_pwd1"></td>
			</tr>
			<tr>
				<td>Passwort wiederholen:</td>
				<td> <input class="form-control" type="password" name="new_pwd2"></td>
			</tr>
			<tr> <td> <input class="btn btn-default btn-file" type="submit" name="add" value="Hinzuf&uuml;gen"></td></tr>
		</table>
		</div>
		
		<!-- Passwort ändern -->
		<div id="tbl_pwd_change" class="user_function" style="display:none;">
		<table class="tbl">
			<tr > <th class="headline" colspan="2"><b><h3>Passwort &Auml;ndern</h3></b></th></tr>
			<tr>
			<td>Benutzernamen:</td>
				<td> <input class="form-control" id="chg_name" type="text" name="chg_name"> </td>
			</tr>
			<tr>
				<td>Neues Passwort:</td>
				<td> <input class="form-control" type="password" name="chg_pwd1"></td>
			</tr>
			<tr>
				<td>Passwort wiederholen:</td>
				<td> <input class="form-control" type="password" name="chg_pwd2"></td>
			</tr>
			<tr> <td> <input class="btn btn-default btn-file" type="submit" name="change" value="Passwort &Auml;ndern"></td></tr>
		</table>
		</div>
		
		<!-- Benutzer Löschen -->
		<div id="tbl_clr" class="user_function" style="display:none;">
		<table class="tbl">
			<tr > <th class="headline" colspan="2"><b><h3>Benutzer L&ouml;schen</h3></b></th></tr>
			<tr>
				<td>Benutzernamen:</td>
				<td> <input class="form-control" id="clr_name" type="text" name="user"> </td>
			</tr>
			
			<tr> <td> <input class="btn btn-default btn-file" type="submit" name="remove" value="L&ouml;schen"/></td></tr> 
		</table>
		
		</div>
		<div id="user_table" class="user_function" style="display: none;">
		<table class="table table-striped table-bordered " style="margin-top: 50px;">
			<thead>
				<th>ID</th>
				<th>Benutzername</th>
				<th>Gruppe</th>
			</thead>
			<tbody>
			<?php
				$db = new SQLite3("db/infosaeule.sqlite");
				if(!$db)die($db->lastErrorMsg());
				$results = $db->query("SELECT ID, Benutzername, Gruppe FROM user");
				while ($row = $results->fetchArray()){
					echo "<tr><td>".$row['ID']."</td>";
					echo "<td>".$row['Benutzername']."</td>";
					echo "<td>".$row['Gruppe']."</td>";
					echo "</tr>";
         		}
				$db->close();
			?>
			</tbody>
		</table>
		</div>
	</form>
	</div>
	</div>
	
	</body>
</html>
