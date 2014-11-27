<!-- um nach 3 Sekunden zur form.php zurück zu springen -->
<meta  http-equiv="refresh" content="2; URL=form.php"/>
		
<?php
$file = "../passwd/.htpasswd";
$file_new = "../passwd/.htpasswd.new"; //Datei zum zwischenspeichern für Löschfunktion
$mode = "a+";
$lines = file($file);//speichert .htpasswd in ein array
$name_ok = true;
$pwd_ok = true;
$radio_check = $_POST['radio_tbl'];

if($radio_check == 'add'){
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
		$htpwfile = fopen($file, $mode);
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
}elseif($radio_check == 'clr'){
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
					echo "Benutzer ".$_POST['user']." wurde gel&oumlscht. <br>";
				
			}
		}
	}
	
}
?>