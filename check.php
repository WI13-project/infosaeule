<?php
include("auth-user.php");
include("header.php");
include ("bildbearbeitung.php");

  echo "<link href='css/bootstrap.min.css' rel='stylesheet'>";
  echo "<div id='cms_inaktiv' class='container'>";


 $db = new SQLite3('db/infosaeule.sqlite');
//Prüfe auf Bildnamen
if(empty($_POST['bildname'])) {
                die('Bildname darf nicht leer sein! Nochmal..<meta http-equiv="refresh" content="1;url=upload.php">');
       }

//Dateiendung extrahieren
if(empty($_FILES['datei']['name'])){
        die('Bitte Datei angeben! Nochmal..<meta http-equiv="refresh" content="1;url=upload.php">');
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
                        die('Falsche Dateiendung! Nochmal..<meta http-equiv="refresh" content="1;url=upload.php">');




        //$endung =".".$teile[1];
        }
//echo "Endung: ".$endung."<br>";

//Dateipraefix generieren
date_default_timezone_set('Europe/Berlin');
$user_id=$_SESSION['user_id'];
//echo "userid:";
//echo $_SESSION['user_id'];
$dateityp = GetImageSize($_FILES['datei']['tmp_name']);

        $zeit=date("Ymd_His");
        $fileprefix=$zeit."-".$_POST['bildname'];
        if($dateityp[2] != 0)
          {



          $groesse_b=1920;
          $groesse_thumb=300;
          $ordner_b="./upload/";
          $ordner_thumb="./thumbnail/";

        if(!$db)die($db->lastErrorMsg());
        else{
          $results = $db->query("SELECT lfdnr,con,value,value_s from preferences");
           if($results)
             {

                   while ($row = $results->fetchArray() )
                    {
                            if ($row['lfdnr']=='5') $ordner_thumb="./".$row['value']."/";
                            if ($row['lfdnr']=='6') $ordner_b="./".$row['value']."/";
                            if ($row['lfdnr']=='7') $groesse_thumb=$row['value'];
                            if ($row['lfdnr']=='8') $groesse_b=$row['value'];

                    }

             }

           $db->close();
           }




                                //Groesse in Byte ueberpruefen
                                if($_FILES['datei']['size'] <  1024000)
                                {
                                                                        move_uploaded_file($_FILES['datei']['tmp_name'], "tmp/".$fileprefix.$endung);
                                                                        bild_zu_breitbild_png("tmp/".$fileprefix.$endung,$ordner_b,$groesse_b);

                                                                        echo "<p>Das Bild wurde Erfolgreich nach upload/".$fileprefix.".png hochgeladen und wartet auf Freigabe<br></p>";
                                                                        echo "<p><br><a href=view.php>Bilder ansehen</a></p>";
                                                                        $db = new SQLite3('db/infosaeule.sqlite');

                                                                        if(!$db) die($db->lastErrorMsg());


                                                                        if($db)
                                                                        {
                                                                                 $db->exec("INSERT INTO Bilder(name, user, erstzeit, akt_ab, akt_bis,ort,status)
                                                                                 VALUES ('".$_POST['bildname'].".png', '".$user_id."', '".$zeit."', '','','upload','0')");
                                                                                 //echo "<p><br><br>Bilddatei: upload/".$fileprefix.".png"<br></p>";
                                                                                 echo "<p><img src=\"".bild_zu_breitbild_png("tmp/".$fileprefix.$endung,$ordner_thumb,$groesse_thumb)."png\" alt=\"Vorschau ".$fileprefix.".png\"></p>";
                                                                                 //echo "<p><br>Bild wurde hinzugef&uuml;gt</p>";

                                                                                $db->close();
                                                                        }
                                                                         unlink("tmp/".$fileprefix.$endung);
                                                                }
                                else
                                {
                                die('Das Bild darf nicht größer als 1MB sein! Nochmal..<meta http-equiv="refresh" content="1;url=upload.php">');
                                }
           }
                else
                {
                    die('Bitte nur Bilder im jpg oder gif Format hochladen! Nochmal..<meta http-equiv="refresh" content="1;url=upload.php">');
               }

?>
</div>