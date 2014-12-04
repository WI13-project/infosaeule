<!-- um nach 3 Sekunden zur form.php zurück zu springen -->
<meta  http-equiv="refresh" content="2; URL=form.php" http-equiv="content-type" content="text/html; charset=utf-8" />
		
<?php
$file = "db/infosaeule.sqlite";
$name_ok = true;
$pwd1_ok = true;
$pwd2_ok = true;
$mail_ok = true;
$radio_check = $_POST['radio_tbl'];
$group = $_POST['radio_user_group'];

switch($radio_check){
		
// ---- Neuen Benutzer anlegen ----
	case 'add':
		
		//Prüfen ob die Textfelder beschrieben sind
		if($_POST['new_name']==""){
			echo "Keinen Benutzernamen eingegeben! <br>";
			$name_ok = false;
		}
		if($_POST['mail']==""){
			echo "Keine E-Mail Adresse eingegeben! <br>";
			$mail_ok = false;
		}
		if ($_POST['new_pwd1']=="") {
			echo "Kein Passwort eingegeben! <br>";
			$pwd1_ok = false;
		}
		if ($_POST['new_pwd2']==""){
			echo "Bitte Passwort wiederholen";
			$pwd2_ok = false;
		}
		if ($_POST['new_pwd1'] != $_POST['new_pwd2'])
				die("Die Passwörter stimmen nicht überein");
		
		//Neuen Benutzer eintragen
		if($name_ok && $pwd1_ok && $pwd2_ok){
			$db = new SQLite3($file);
			
			if(!$db)
				die($db->lastErrorMsg());
				$name = $_POST['new_name'];
				$pwd = $_POST['new_pwd1'];
				$mail = $_POST['mail'];
				$result=$db->querySingle("Select benutzername from user where Benutzername='$name'");
			
			if($result){
				echo "Benutzername ist schon vorhanden";
			}else{		
				$db->exec("INSERT INTO user(Benutzername, Passwort, Gruppe, EMail)
				VALUES ('$name', '$pwd', '$group', '$mail');");
				echo "Benutzer wurde hinzugef&uuml;gt";		
			}
			$db->close();
		}
	break;
// ---- Neuen Benutzer anlegen Ende----

// ----- Passwort ändern ----- 
	case 'pwd_change':
		if($_POST['chg_name']==""){
			echo "Keinen Benutzernamen eingegeben! <br>";
			$name_ok = false;
		}
		if ($_POST['chg_pwd1']=="") {
			echo "Kein Passwort eingegeben! <br>";
			$pwd1_ok = false;
		}
		if ($_POST['chg_pwd2']==""){
			echo "Bitte Passwort wiederholen";
			$pwd2_ok = false;
		}
		if ($_POST['chg_pwd1'] != $_POST['chg_pwd2'])
			die("Die Passwörter stimmen nicht überein");
		
		if($name_ok && $pwd1_ok && $pwd2_ok){
			$pwd = $_POST['chg_pwd1'];
			$user = $_POST['chg_name'];
			$db = new SQLite3($file);
			if(!$db)
				die($db->lastErrorMsg());
			
			$result = $db->querySingle("UPDATE user SET Passwort='$pwd' where Benutzername='$user'");
			if($result){
				die("Der Benutzername ".$user." ist nicht vorhanden.");
			}else{
				echo "Passwort f&uuml;r ".$user." wurde ge&auml;ndert.";
			}
			$db ->close();
		}
		
	break;
// ----- Passwort ändern Ende ----- 

// ---- Benutzer löschen ----
	case 'clr':
		if($_POST['user']==""){
			die("Keinen Benutzernamen eingegeben! <br>");
		}
	
		$db = new SQLite3($file);
		if(!$db)
			die($db->lastErrorMsg());
			
		$name = $_POST['user'];
		$result = $db->querySingle("DELETE FROM user where Benutzername='$name'");
		if($result){
			echo "Benutzer ".$name." wurde nicht gefunden";
		}else{
			echo "Benutzer ".$name." wurde gel&ouml;scht";
		}
		$db->close();
	break;
// ---- Benutzer löschen Ende----

}	
?>