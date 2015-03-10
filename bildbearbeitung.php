<?php


// Erstellt ein 16:9 Darstellung in gew�nschter Gr��e ein Bild in PNG
// Ordner unter $speicherordner ben�tigt ggf. Schreibrechte CHMOD(777)

// Parameter:
// $imgfile: Pfad zur Bilddatei
// $speicherordner: Ordner indem die Thumbnails gespeichert werden sollen
// $filenameOnly: Soll nur der Dateiname als Name f�r Thumbnail verwendet werden,
// ansonsten inkl. Pfad
function bild_zu_breitbild_png($imgfile, $speicherordner,$thumbsize, $filenameOnly=true)
   {
   //Max. Gr��e des Thumbnail (H�he und Breite)
  // $thumbsize = 1920;
     $thumbsize_h=ceil($thumbsize*9/16);
   //Dateiname erzeugen
   $filename = basename($imgfile,"JPG");

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

//echo $thumbsize."zu:".$thumbsize_h;

$im = imagecreatetruecolor($thumbsize,$thumbsize_h);
$black = imagefill ($im, 0, 0, 0);

// Make the background transparent
imagecolortransparent($im, $black);


// Save the image
//imagepng($im, './imagecolortransparent.png');
//imagedestroy($im);

//            $image = imagecreatefromjpeg($path);
// Auf Vorschaugr��e schrumpfen ...

//Ist das Bild h�her als breit?
   if($imgratio>1)
      {
      $newwidth = $thumbsize;
      $newheight = $thumbsize/$imgratio;
      }
   else
      {
      $newheight = $thumbsize*$imgratio;
      $newwidth = $thumbsize;
      }

   if ($newheight>($thumbsize*9/16))
      {
      $newwidth = $newwidth/($newheight/$thumbsize_h);
      $newheight = $thumbsize_h;
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
      $filename = basename($imgfile,"jpg");                      //jpg als Endung wegnehmen
      imagePNG($thumb,$ordner."temp.png");                       //erzeuge leeres temp.png
      $thumb = imagecreatefrompng($ordner."temp.png");           //speichert temp.png-Datenstrom in Variable zur weiteren verarbeitung
      $source = imagecreatefromjpeg($imgfile);                   //liest Datenstrom des eingesendeten JPG�s in die $source ein
      imagepng($source,$ordner."temp2.png");                     //erstellt aus der $source(jpg) ein temp2.png
      $source =imagecreatefrompng($ordner."temp2.png");          //liest   temp2.png wieder als Daten ein
                                                                 //die letzten 3 Zeilen wandeln quasi JPG zu png


      }
   else if($endung == ".gif")
      {
       $filename = basename($imgfile,"gif");                     //gif als Endung wegnehmen
      imagePNG($thumb,$ordner."temp.png");                       //erzeuge leeres temp.png
      $thumb = imagecreatefrompng($ordner."temp.png");           //speichert temp.png-Datenstrom in Variable zur weiteren verarbeitung
      $source = imagecreatefromgif($imgfile);                   //liest Datenstrom des eingesendeten GIF�s in die $source ein
      imagepng($source,$ordner."temp2.png");                     //erstellt aus der $source(jpg) ein temp2.png
      $source =imagecreatefrompng($ordner."temp2.png");          //liest   temp2.png wieder als Daten ein
                                                                 //die letzten 3 Zeilen wandeln quasi GIF zu png


      }
   else if($endung == ".png")
      {
       $filename = basename($imgfile,"png");                    //png als Endung wegnehmen
      imagePNG($thumb,$ordner."temp.png");
      $thumb = imagecreatefrompng($ordner."temp.png");
      $source = imagecreatefrompng($imgfile);
      }

   imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

   imagecopyresized($im,$thumb,($thumbsize-$newwidth)/2,($thumbsize_h-$newheight)/2,0,0,$newwidth,$newheight,$newwidth, $newheight);


   //Bild speichern

   imagepng($im,$ordner.$filename."png");

   //Speicherplatz wieder freigeben
   ImageDestroy($im);
   ImageDestroy($thumb);
   ImageDestroy($source);


   //Pfad zu dem Bild zur�ckgeben
   return $ordner.$filename;
   }


?>