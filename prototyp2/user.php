<!-- um nach 3 Sekunden zur form.php zurück zu springen -->
<meta  http-equiv="refresh" content="3; URL=form.php"/>
		
<?php
$filename = "../../passwd/.htpasswd";
$mode = "a+";
$lines = file($filename);//speichert .htpasswd in ein array
$name_ok = true;
$pwd_ok = true;
//Prüfen ob die Textfelder beschrieben sind

if($_POST['name']==""){
	echo "Keine Benutzernamen eingegeben! <br>";
	$name_ok = false;
}
if ($_POST['pwd']=="") {
	echo "Kein Passwort eingegeben!";
	$pwd_ok = false;
}

//Neuen Benutzer eintragen

if($name_ok && $pwd_ok){
	$htpwfile = fopen($filename, $mode);
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
			echo "Neuer Benutzer ".$_POST['name']." wurde hinzugef&uumlgt. <br>";
		}
		if(!fclose($htpwfile)){
			echo "Fehler";
		}
	}
}

?>