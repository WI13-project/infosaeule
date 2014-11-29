<!-- um nach 3 Sekunden zur form.php zurück zu springen -->
<meta  http-equiv="refresh" content="2; URL=form.php" http-equiv="content-type" content="text/html; charset=utf-8" />
		
<?php
$file = "../passwd/.htpasswd";
$file_new = "../passwd/.htpasswd.new"; //Datei zum zwischenspeichern für Löschfunktion
$mode = "a+";
$lines = file($file);//speichert .htpasswd in ein array
$name_ok = true;
$pwd1_ok = true;
$pwd2_ok =true;
$radio_check = $_POST['radio_tbl'];

switch($radio_check){
	//Prüfen ob die Textfelder beschrieben sind
	case 'add':
	if($_POST['new_name']==""){
		echo "Keine Benutzernamen eingegeben! <br>";
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
	
	//Neuen Benutzer eintragen
	if($name_ok && $pwd1_ok && $pwd2_ok){
		$htpwfile = fopen($file, $mode);
		if ($_POST['new_pwd1'] != $_POST['new_pwd2']){
			die("Die Passwörter stimmen nicht überein");
		}
		if($htpwfile==NULL){
			echo "Datei konnte nicht gelesen werden";
		}else {
			//überprüfen ob Benutzer schon vorhanden
			$length = sizeof($lines);
			for($i=0;$i<$length;$i++){
				$user_list = explode(":", $lines[$i]);
			}
			$pattern = $_POST['name'];
			if(in_array($pattern, $user_list)){
				die( "Benutzer ist schon vorhanden");//bricht Vorgang ab und erstellt Ausgabe
			}
			//Benutzer ist nicht vorhanden, also wird er hinzugefügt
			if(fwrite($htpwfile, $_POST['name'].":".$_POST['pwd']."\r\n")){
				echo "Neuer Benutzer ".$_POST['name']." wurde hinzugef&uuml;gt. <br>";
			}
			if(!fclose($htpwfile)){
				echo "Fehler";
			}
		}
	}
	case 'clr':
	if($_POST['user']==""){
		die("Keine Benutzernamen eingegeben! <br>");
	}
	$pattern = $_POST['user']; //pattern für die Suche nach dem Benutzernamen
	$length = sizeof($lines);
	$a = 0;
	//erstellen eines neuen Array, mit den Usern die weiterhin zugriff haben sollen
	for($i=0; $i<$length; $i++){
		$user = explode(":", $lines[$i]);
		if($user[0]!=$pattern){
			$user_list[$a] = $lines[$i];
			$a++;
		}
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
					echo "Benutzer ".$_POST['user']." wurde gel&ouml;scht. <br>";
				
			}
		}
	}
	case 'pwd_change':
		echo "Hier kann bald ein Passwort ge&auml;ndert werden.";

}	
?>