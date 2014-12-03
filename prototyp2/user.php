<!-- um nach 3 Sekunden zur form.php zurück zu springen 
<meta  http-equiv="refresh" content="2; URL=form.php" http-equiv="content-type" content="text/html; charset=utf-8" />
		-->

<?php
require_once('db.php');

$file = "../passwd/.htpasswd";
$file_new = "../passwd/.htpasswd.new"; //Datei zum zwischenspeichern für Löschfunktion
$mode = "a+";
$lines = file($file);//speichert .htpasswd in ein array
$name_ok = true;
$pwd1_ok = true;
$pwd2_ok =true;
$radio_check = $_POST['radio_tbl'];

$group = 'user';
$mail = 'test@test.de';

switch($radio_check){
	
	//Prüfen ob die Textfelder beschrieben sind
	case 'add':
	if($_POST['new_name']==""){
		echo "Keinen Benutzernamen eingegeben! <br>";
		$name_ok = false;
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
		$db = new SQLite3('db/user.db');
		
		if(!$db)
			die($db->lastErrorMsg());
			$name = $_POST['new_name'];
			$pwd = $_POST['new_pwd1'];
		$result=$db->querySingle("Select Benutzername from user where Benutzername='$name'");
		
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
	
	case 'clr':
		if($_POST['user']==""){
			die("Keinen Benutzernamen eingegeben! <br>");
		}
		$db = new SQLite3('db/user.db');
		if(!$db)
			die($db->lastErrorMsg());
		$name = $_POST['user'];
		$result = $db->querySingle("DELETE FROM user where Benutzername='$name'");
		if($result){
			echo "Eintrag konnte nicht geschrieben werden";
		}
		$db->close();
		break;
	
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
	if($name_ok && $pwd1_ok && $pwd2_ok){
		if ($_POST['chg_pwd1'] != $_POST['chg_pwd2']){
			die("Die Passwörter stimmen nicht überein");
		}
		$pattern = $_POST['chg_name']; //pattern für die Suche nach dem Benutzernamen
		$length = sizeof($lines);
		$a = 0;
		//erstellen eines neuen Array, mit den Usern die weiterhin zugriff haben sollen
		for($i=0; $i<$length; $i++){
			$user = explode(":", $lines[$i]);
			if($user[0]!=$pattern){
				$user_list[$a] = $lines[$i];
			}else{
				$user_list[$a] = $user[0].":".$_POST['chg_pwd1']."\r\n";
				break;
			}
			$a++;
		}
		if($length==$a)
			die("Benutzer wurde nicht gefunden!");
		
		//zurückschreiben der user:passwort kombination
		$htpwfile = fopen($file_new, $mode);
		if($htpwfile==NULL){
			echo "Datei konnte nicht gelesen werden";
		}else {
			$length = sizeof($user_list);
			for($i=0;$i<$length;$i++)
				fwrite($htpwfile, $user_list[$i]);
			if(!fclose($htpwfile))
					echo "Fehler";
			if(file_exists($file)==true){
				if(unlink($file)==true){
					if(rename("../passwd/.htpasswd.new", "../passwd/.htpasswd")==true)
						echo "Passwort f&uuml;r Benutzer ".$_POST['chg_name']." wurde gel&auml;ndert. <br>";
				}
			}
		}
	}
	break;
}	
?>