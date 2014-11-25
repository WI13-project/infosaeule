<?php

$dateityp = GetImageSize($_FILES['datei']['tmp_name']);

if($dateityp[2] != 0)
  {
	   		//Dateiendung und Groesse in Byte ueberpruefen
	   		if($_FILES['datei']['size'] <  102400)
	   		{ 
	   			//Aus dem Temp-Ordner in den upload ordner verschieben
	   			if($_FILES['datei']['tmp_name']= "upload/".$_FILES['datei']['tmp_name'])
	   			{
	   				echo "Datei bereits vorhanden";
	   				move_uploaded_file($_FILES['datei']['tmp_name'], "upload/".$_FILES['datei']['tmp_name']."_Kopie");
	   			} 
	   			else
	   			{
	   				move_uploaded_file($_FILES['datei']['tmp_name'], "upload/".$_FILES['datei']['tmp_name']);
	   				echo "Das Bild wurde Erfolgreich nach upload/".$_FILES['datei']['tmp_name']." hochgeladen";
	   			}
	   		}
	   		else
	   		{
	   			echo "Das Bild darf nicht größer als 100 kb sein ";
	   		}	 
   }

else
    {
    echo "Bitte nur Bilder im Gif bzw. jpg Format hochladen";
    }
    date_default_timezone_set('Europe/Berlin');
    $fileprefix=date("Ymd_Hms")."-".$_POST['username'];
    echo "<br>und so wird das noch: ".$fileprefix;
?>

