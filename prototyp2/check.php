<?php
include("header.php");


// Erstellt ein thumbnail eines Bildes
// Ordner unter $speicherordner benötigt ggf. Schreibrechte CHMOD(777)

// Parameter:
// $imgfile: Pfad zur Bilddatei
// $speicherordner: Ordner indem die Thumbnails gespeichert werden sollen
// $filenameOnly: Soll nur der Dateiname als Name für Thumbnail verwendet werden,
// ansonsten inkl. Pfad
function thumbnail($imgfile, $speicherordner="./thumbnail/", $filenameOnly=true)
   {
   //Max. Größe des Thumbnail (Höhe und Breite)
   $thumbsize = 300;

   //Dateiname erzeugen
   $filename = basename($imgfile);

   //Fügt den Pfad zur Datei dem Dateinamen hinzu
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

   //Ausgansdatei vorhanden? Wenn nicht, false zurückgeben
   if(!file_exists($imgfile))
      return false;



   //Infos über das Bild
   $endung = strrchr($imgfile,".");

   list($width, $height) = getimagesize($imgfile);
   $imgratio=$width/$height;

   //Ist das Bild höher als breit?
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
   else if($endung == ".PNG")
      {
      imagePNG($thumb,$ordner."temp.PNG");
      $thumb = imagecreatefrompng($ordner."temp.PNG");

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


   //Pfad zu dem Bild zurückgeben
   return $ordner.$filename;
   }



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
if($_POST['bildname'] == "") {
        echo "Bildname darf nicht leer sein!";
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
                                        echo "Das Bild wurde Erfolgreich nach upload/".$fileprefix.$endung." hochgeladen<br>";
                                        echo "<br><a href=view.php>Bilder ansehen</a>";
                                         $db = new SQLite3('db/infosaeule.sqlite');

                                  if(!$db) die($db->lastErrorMsg());
                                      $result=$db->querySingle("Select lfdnr from bilder desc limit 1");

                if($result){

                                 $db->exec("INSERT INTO Bilder(name, user, erstzeit, akt_ab, akt_bis,ort,status)
                                 VALUES ('".$_POST['bildname']."', '1', '', '','','upload','0')");
                                 echo "<br><br>Bildatei: upload/".$fileprefix.$endung."<br>";
                                 echo "<img src=\"".thumbnail("upload/".$fileprefix.$endung)."\" alt=\"Vorschau ".$fileprefix.$endung."\">";


                                 echo "<br>Bild wurde hinzugef&uuml;gt";

                $db->close();




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
}      }
?>
