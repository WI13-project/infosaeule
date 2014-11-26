<?php

$dateityp = GetImageSize($_FILES['datei']['tmp_name']);
//Dateiendung extrahieren
if($_FILES['datei']['name'] == "")
	{
	echo "Bitte Datei angeben!";
	}
else
	{
	$teile =explode(".",$_FILES['datei']['name']);
	$endung =".".$teile[1];
	}
//echo "Endung: ".$endung."<br>";

//Dateipraefix generieren
date_default_timezone_set('Europe/Berlin');
if($_POST['username'] == "") {
	echo "Nutzername darf nicht leer sein!";
	include("upload.php");
}
else {
	$fileprefix=date("Ymd_Hms")."-".$_POST['username'];
	if($dateityp[2] != 0)
	  {
				//Groesse in Byte ueberpruefen
				if($_FILES['datei']['size'] <  1024000)
				{ 
					move_uploaded_file($_FILES['datei']['tmp_name'], "upload/".$fileprefix.$endung);
					echo "Das Bild wurde Erfolgreich nach upload/".$fileprefix.$endung." hochgeladen<br>";
					echo "<br><a href=view.php>Bilder ansehen</a>";
				}
				else
				{
					echo "Das Bild darf nicht größer als 1 MB sein ";
				}	 
	   }

	else
		{
		echo "Bitte nur Bilder im gif bzw. jpg Format hochladen";
		}
}	   
?>

