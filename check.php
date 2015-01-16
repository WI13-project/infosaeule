<?php
include("auth-user.php");
include("header.php");


// Erstellt ein thumbnail eines Bildes
// Ordner unter $speicherordner ben�tigt ggf. Schreibrechte CHMOD(777)

// Parameter:
// $imgfile: Pfad zur Bilddatei
// $speicherordner: Ordner indem die Thumbnails gespeichert werden sollen
// $filenameOnly: Soll nur der Dateiname als Name f�r Thumbnail verwendet werden,
// ansonsten inkl. Pfad
function thumbnail($imgfile, $speicherordner="./thumbnail/", $filenameOnly=true)
   {
   //Max. Gr��e des Thumbnail (H�he und Breite)
   $thumbsize = 300;

   //Dateiname erzeugen
   $filename = basename($imgfile);

   //F�gt den Pfad zur Datei dem Dateinamen hinzu
   //Aus ordner/bilder/bild1.jpg wird dann ordner_bilder_bild1.jpg
   if(!$filenameOnly)
      {
      $replace = array("/","\\",".");
      $filename = str_replace($replace,"_",dirname($imgfile))."_".$filename;
      }

   //Schreibarbeit sparen
   $ordner = $speicherordner;

   //Speicherordner vorhanden
   if(!is_dir($ordner))
      return false;

   //Wenn Datei schon vorhanden, kein Thumbnail erstellen
   if(file_exists($ordner.$filename))
      return $ordner.$filename;

   //Ausgansdatei vorhanden? Wenn nicht, false zur�ckgeben
   if(!file_exists($imgfile))
      return false;



   //Infos �ber das Bild
   $endung = strrchr($imgfile,".");

   list($width, $height) = getimagesize($imgfile);
   $imgratio=$width/$height;

   //Ist das Bild h�her als breit?
   if($imgratio>1)
      {
      $newwidth = $thumbsize;
      $newheight = $thumbsize/$imgratio;
      }
   else
      {
      $newheight = $thumbsize;
      $newwidth = $thumbsize*$imgratio;
      }

   //Bild erstellen
   //Achtung: imagecreatetruecolor funktioniert nur bei bestimmten GD Versionen
   //Falls ein Fehler auftritt, imagecreate nutzen
   if(function_exists("imagecreatetruecolor"))
     $thumb = imagecreatetruecolor($newwidth,$newheight);
   else
      $thumb = imagecreate ($newwidth,$newheight);

   if($endung == ".jpg")
      {
      imageJPEG($thumb,$ordner."temp.jpg");
      $thumb = imagecreatefromjpeg($ordner."temp.jpg");

      $source = imagecreatefromjpeg($imgfile);
      }
   else if($endung == ".gif")
      {
      imageGIF($thumb,$ordner."temp.gif");
      $thumb = imagecreatefromgif($ordner."temp.gif");

      $source = imagecreatefromgif($imgfile);
      }
   else if($endung == ".png")
      {
      imagePNG($thumb,$ordner."temp.png");
      $thumb = imagecreatefrompng($ordner."temp.png");

      $source = imagecreatefrompng($imgfile);
      }
   imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

   //Bild speichern
   if($endung == ".png")
      imagepng($thumb,$ordner.$filename);
   else if($endung == ".gif")
      imagegif($thumb,$ordner.$filename);
   else
      imagejpeg($thumb,$ordner.$filename,100);


   //Speicherplatz wieder freigeben
   ImageDestroy($thumb);
   ImageDestroy($source);


   //Pfad zu dem Bild zur�ckgeben
   return $ordner.$filename;
   }



$dateityp = GetImageSize($_FILES['datei']['tmp_name']);
//Dateiendung extrahieren
if($_FILES['datei']['name'] == "")
        {
        	die( 
        	'<script language="javascript">
					alert(unescape(""Bitte Datei angeben!""));
			</script>');
      
        }
else
        {
        //$teile =explode(".",$_FILES['datei']['name']);
		$endung = substr( strrchr( $_FILES['datei']['name'], "." ),1);
		if ( stristr($endung,'GIF'))
			$endung = '.gif';
		elseif ( stristr($endung,'PNG'))
			$endung = '.png';
		elseif ( stristr($endung,'JPG'))
			$endung = '.jpg';
		else
			die( 
        	'<script language="javascript">
					alert(unescape(""Endung nicht erkannt!""));
			</script>');
      
		
		
		
        //$endung =".".$teile[1];
        }
//echo "Endung: ".$endung."<br>";

//Dateipraefix generieren
date_default_timezone_set('Europe/Berlin');
$user_id=$_SESSION['user_id'];
//echo "userid:";
//echo $_SESSION['user_id'];
if($_POST['bildname'] == "") {
        	'<script language="javascript">
					alert(unescape(""Bildname darf nicht leer sein!""));
			</script>';
        include("upload.php");
}
else {
        $fileprefix=date("Ymd_Hms")."-".$_POST['bildname'];
        if($dateityp[2] != 0)
          {
                                //Groesse in Byte ueberpruefen
                                if($_FILES['datei']['size'] <  1024000)
                                {
									move_uploaded_file($_FILES['datei']['tmp_name'], "upload/".$fileprefix.$endung);
									echo "<p>Das Bild wurde Erfolgreich nach upload/".$fileprefix.$endung." hochgeladen und wartet auf Freigabe<br></p>";
									echo "<p><br><a href=view.php>Bilder ansehen</a></p>";
									$db = new SQLite3('db/infosaeule.sqlite');

									if(!$db) die($db->lastErrorMsg());


									if($db)
									{
										 $db->exec("INSERT INTO Bilder(name, user, erstzeit, akt_ab, akt_bis,ort,status)
										 VALUES ('".$_POST['bildname'].$endung."', '".$user_id."', '".date("Ymd_Hms")."', '','','upload','0')");
										 //echo "<p><br><br>Bilddatei: upload/".$fileprefix.$endung."<br></p>";
										 echo "<p><img src=\"".thumbnail("upload/".$fileprefix.$endung)."\" alt=\"Vorschau ".$fileprefix.$endung."\"></p>";
										 //echo "<p><br>Bild wurde hinzugef&uuml;gt</p>";

										$db->close();
									}
								}
                                else
                                {
                                 die( 
                                 '<script language="javascript">
									alert(unescape("Das Bild darf nicht gr&ouml;ßer als 1MB sein!"));
								</script>');
                                }
           }
		else
                {
                	die( 
                                 '<script language="javascript">
									alert(unescape(""Bitte nur Bilder im gif bzw. jpg Format hochladen""));
								</script>');
               }
}
?>