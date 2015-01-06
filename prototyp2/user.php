<?php
include("auth-admin.php");
?>
<!-- um nach 3 Sekunden zur form.php zurück zu springen -->
<meta  http-equiv="refresh" content="0; URL=form.php" http-equiv="content-type" content="text/html; charset=utf-8" />

		
<?php
$file = "db/infosaeule.sqlite";
$name_ok = true;
$pwd1_ok = true;
$pwd2_ok = true;
$mail_ok = true;
$msg = "Folgende Fehler sind aufgetreten:".'\n\n';
$radio_check = $_POST['radio_tbl'];
$group = $_POST['radio_user_group'];

switch($radio_check){
		
// ---- Neuen Benutzer anlegen ----
	case 'add':
		
		//Prüfen ob die Textfelder beschrieben sind
		if($_POST['new_name']==""){
			$msg .= "Keinen Benutzernamen eingegeben!".'\n';
			$name_ok = false;
		}
		if($_POST['mail']==""){
			$msg .="Keine E-Mail Adresse eingegeben!".'\n';
			$mail_ok = false;
		}
		if ($_POST['new_pwd1']=="") {
			$msg .= "Kein Passwort eingegeben! ".'\n';
			$pwd1_ok = false;
		}
		if ($_POST['new_pwd2']==""){
			$msg .= "Bitte Passwort wiederholen";
			$pwd2_ok = false;
		}
		if(!$name_ok || !$pwd1_ok || !$pwd2_ok || !$mail_ok){
			die( '<script language="javascript">
					alert("'.$msg.'");
					</script>');
		}
		
		if ($_POST['new_pwd1'] != $_POST['new_pwd2']){
			die( '<script language="javascript">
					alert(unescape("Die Pass%F6wrter stimmen nicht %FCberein"));
					</script>');
		}
						
		
		//Neuen Benutzer eintragen
		if($name_ok && $pwd1_ok && $pwd2_ok){
			$db = new SQLite3($file);
			
			if(!$db)
				die($db->lastErrorMsg());
				$name = $_POST['new_name'];
				$pwd = password_hash("".$_POST['new_pwd1']."", PASSWORD_DEFAULT);
				$mail = $_POST['mail'];
				$result=$db->querySingle("Select benutzername from user where Benutzername='$name'");
			
			if($result){
				die( '<script language="javascript">
						alert("Der Benutzer ist schon vorhanden");
					</script>');
			}else{		
				$db->exec("INSERT INTO user(Benutzername, Passwort, Gruppe, EMail)
				VALUES ('$name', '$pwd', '$group', '$mail');");
				die( '<script language="javascript">
						alert(unescape("Benutzer wurde hinzugef%FCgt"));
					</script>');
			}
			$db->close();
		}
	break;
// ---- Neuen Benutzer anlegen Ende----

// ----- Passwort ändern ----- 
	case 'pwd_change':
		if($_POST['chg_name']==""){
			$msg .= "Keinen Benutzernamen eingegeben!".'\n';
			$name_ok = false;
		}
		if ($_POST['chg_pwd1']=="") {
			$msg .= "Kein Passwort eingegeben! ".'\n';
			$pwd1_ok = false;
		}
		if ($_POST['chg_pwd2']==""){
			$msg .= "Bitte Passwort wiederholen";
			$pwd2_ok = false;
		}
		
		if(!$name_ok || !$pwd1_ok || !$pwd2_ok){
			die( '<script language="javascript">
					alert("'.$msg.'");
				</script>');
		}
		if ($_POST['chg_pwd1'] != $_POST['chg_pwd2']){
			die( '<script language="javascript">
					alert(unescape("Die Passw%F6rter stimmen nicht %FCberein"));
				</script>');
		}
		
		//if($name_ok && $pwd1_ok && $pwd2_ok){
			$pwd = password_hash("".$_POST['chg_pwd1']."", PASSWORD_DEFAULT);
			$user = $_POST['chg_name'];
			$db = new SQLite3($file);
			
			
			if(!$db)
				die($db->lastErrorMsg());
			
			$result = $db->querySingle("UPDATE user SET Passwort='$pwd' where Benutzername='$user'");
			if($result){
				$msg .= "Der Benutzername ".$user." ist nicht vorhanden.";
				die( '<script language="javascript">
						alert("'.$msg.'");
					</script>');
			}else{
				$msg = "Passwort f%FCr ".$user." wurde ge%E4ndert.";
				die( '<script language="javascript">
						alert(unescape("'.$msg.'"));
					</script>');
			}
			
			$db ->close();
		//}
		
	break;
// ----- Passwort ändern Ende ----- 

// ---- Benutzer löschen ----
	case 'clr':
		if($_POST['user']==""){
			$msg .= "Keinen Benutzernamen angegeben";
			die( '<script language="javascript">
						alert(unescape("'.$msg.'"));
					</script>');
		}
	
		$db = new SQLite3($file);
		if(!$db)
			die($db->lastErrorMsg());
			
		$name = $_POST['user'];
		$result = $db->querySingle("DELETE FROM user where Benutzername='$name'");
		if($result){
			$msg .= "Benutzer ".$name." wurde nicht gefunden";
			die( '<script language="javascript">
					alert(unescape("'.$msg.'"));
				</script>');
		}else{
			$msg = "Benutzer ".$name." wurde gel%F6scht";
			die( '<script language="javascript">
					alert(unescape("'.$msg.'"));
				</script>');
		}
		$db->close();
	break;
// ---- Benutzer löschen Ende----

}	
?>