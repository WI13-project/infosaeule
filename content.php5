<?php
$objObjekt->file_name(DEVELOPE,"content.php5" , "a" );

if (isset($_GET["go"])){
switch($_GET["go"]){


    case "start":
                                            $contenInhalt= "start.php5";   //Datei-Zuordnung
                                            $contenTitel= "Ihr Installateur | Heizungs- und Sanit&auml;rinstallation | Zwenkau | Sachsen";   //Titel
                                            $contenLink_1= "link_aktiv";        //Farbe aktiver Link
    break;


    case "edit":
                                            $contenInhalt= "edit.php5";   //Datei-Zuordnung
                                            $contenTitel= "Beiträge editieren";   //Titel
                                            $contenLink_2= "link_aktiv";        //Farbe aktiver Link
    break;

    case "inhalt":
                                            $contenInhalt= "inhalt.php5";   //Datei-Zuordnung
                                            $contenTitel= "DB-Inhalte";   //Titel
                                            $contenLink_3= "link_aktiv";        //Farbe aktiver Link
    break;



    case "admin":
                                            $contenInhalt= "admin.php5";   //Datei-Zuordnung
                                            $contenTitel= "Admin-Bereich";   //Titel
                                            $contenLink_3= "link_aktiv";        //Farbe aktiver Link
    break;


     case "referenzen":
                                            $contenInhalt= "referenzen.php5";   //Datei-Zuordnung
                                            $contenTitel= "Referenzen | Heizungs- und Sanit&auml;rinstallation | Zwenkau | Sachsen";   //Titel
                                            $contenLink_4= "link_aktiv";        //Farbe aktiver Link
    break;


    default:                                $contenInhalt= "start.php5";   //Datei-Zuordnung
                                            $contenTitel= "HFTL";   //Titel-Zuordnung
                                            $contenLink_1= "link_aktiv";        //Farbe aktiver Link


} }
else {

                                            $contenInhalt= "start.php5";   //Datei-Zuordnung
                                            $contenTitel= "HFTL";   //Titel-Zuordnung
                                            $contenLink_1= "link_aktiv";        //Farbe aktiver Link

}
$objObjekt->file_name(DEVELOPE,"content.php5" , "e" );
?>