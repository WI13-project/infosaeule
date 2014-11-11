<?php
///// Definitionen wichtiger Konstanten im gesamten Projekt ///////////////

define("DEVELOPE",0);          //0---> Keine Anzeigen innerhalb der Seiten, 1---> Ja!
define("BORDER",0);            //setzt den Tabellenrahmen auf 1=sichtbar, 0= ohne Rahmen;
define("DEF_ERROR",0);            //0---> Keine Anzeigen, 1---> Zeigt alle Fehlermeldungen an
define("HELP",0);            //0---> Keine Anzeigen, 1---> Zeigt Nummer des Hilfetextes an
define("OPTI",0);            //0---> Keine Anzeigen, 1---> Zeigt versteckte Bereiche der Optimierungen


///// Höhen /////////////////////////////////
define("HEIGHT", "50");          //Zahl für eine Höhe
define("HEIGHT2", "150");          //Zahl für eine Höhe
define("HEIGHT3", "400");          //Zahl für eine Höhe

///// Sicherheit /////////////////////////////////
define("PWD", 5);          //Mindeststellen beim Passwort
define("SECRET", 9);   //Schlüssel zum ver/entschlüsseln in der eigenen Verschlüsselungs-Methode

///// Datum/Zeit /////////////////////////////////
$def_datum_db= date("Y-m-d", time()); //Aktuelles datum im DB-Format
$def_datum_de= date("d.m.Y", time()); //Aktuelles Datum
$def_jahr= date("Y", time()); //Aktuelles Jahr
define("DATUM", $def_datum_de);     //Datum
define("DATUMDB", $def_datum_db);     //Datum im DB-Format
define("JAHR", $def_jahr);     //Jahr
define("TIME_OUT", 7000);     //Zeitspanne

///// Version /////////////////////////////////
define("VERSION", "1.01");          //Angabe der aktuellen Programmversion

///// Anzahl /////////////////////////////////
define("MAXPAGE", 12);          //Anzahl
define("MAXPAGE2", 24);          //Anzahl
define("MAXPAGE3", 5);          //Anzahl

///// Grafik /////////////////////////////////
define("BILDMAX" ,150);     //Maximale Bildgröße in Pixel
define("BILDQUALI" ,75);     //Bildqualität für jpg
define("BILDMAX2" ,1024);     //Maximale Bildgröße in Pixel
define("BILDQUALI2" ,95);     //Bildqualität für jpg
define("BILDMAX3" ,800);     //Maximale Bildgröße in Pixel
define("BILDMAX4" ,600);     //Maximale Bildgröße in Pixel
define("BILDMAX5" ,200);     //Maximale Bildgröße in Pixel
define("BILDMAX6" ,160);     //Maximale Bildgröße in Pixel
define("BILDQUALI3" ,95);     //Bildqualität für jpg


define("BILDMENGE", 3000);          //maximale Datenmenge in KB

///// Kommunikation /////////////////////////////////
define("EMAIL" ,"s137113@hft-leipzig.de");   //Standard E-Mail Adresse
define("EMAILA" ,"s137113");   //Standard E-Mail Adresse Teil vor dem @
define("EMAILB" ,"hft-leipzig.de");   //Standard E-Mail Adresse Teil nach dem @
define("MOBIL" ,"01805552121");    //Standard-Handy-Nummer
define("WWW" ,"www.hft-leipzig.de");    //Standard Internet-Domain
define("DOMAIN" ,"hft-leipzig.de");    //Standard Internet-Domain
define("TELEFON" ,"");    //Standard Telefonnummer
define("FAX" ,"");    //Standard Faxnummer

///// Tabellen ///////////////////////////////
define("TABLE", "100%");          //Zahl für beliebige Verwendung
define("TABLE2", 800);          //Zahl für beliebige Verwendung
define("TABLE3", 965);          //Zahl für beliebige Verwendung
define("TABLE4", 400);          //Zahl für beliebige Verwendung
define("TABLEPADDING", "0");          //Zahl für beliebige Verwendung
define("TABLESPACING", "0");          //Zahl für beliebige Verwendung
define("TABLEPADDING2", "3");          //Zahl für beliebige Verwendung
define("TABLESPACING2", "3");          //Zahl für beliebige Verwendung

///// Diverses /////////////////////////////////
define("PWSTELLEN", 5);          //Stellenanzahl beim PW
define("VERSAND", "1,01");          //Versandkosten
define("KONTO", "?????????");          //Kontodaten
define("BANK", "???????????");          //Kontodaten
define("BLZ", "???????");          //Kontodaten
define("FINANZAMT", "");          //Steuernummer
define("STEUER", "");          //Steuernummer
define("USTEUER", "?????");          //Ust-Ident Nummer
define("GERICHT", "");          //Gewerbe

define("TRENNER", "&nbsp;|&nbsp;");          //Zahl für eine Höhe
define("LEERZEICHEN", "&nbsp;&nbsp;");          //Zahl für eine Höhe
define("LEERZEICHEN2", "&nbsp;");          //Zahl für eine Höhe



///// Ebene Provider/Lokal /////////////////////////////////
if($_SERVER["SERVER_ADDR"]== "xxxxx"  ){ //das ist die IP des Servers bei STRATO
    $def_ebene= "";  //weil auf dem Server die Tagesordner (eine extra Ebene) fehlen
    $def_admintool= "admin/";    //Pfad für Admintool
}else{
    $def_ebene= "../";
    $def_admintool= "../admin/";
}
define("EBENE", $def_ebene );    //Ebene als Konstante definieren
define("ADMINTOOL", $def_admintool );    //Ebene als Konstante definieren



///// Fremdanbieter /////////////////////////////////
define("DISCLAIMER", "http://www.disclaimer.de/disclaimer.htm");     //Disclaimer


///// Sicherheit /////////////////////////////////
//include_once(EBENE."secret/eingabe.tpl.php5"); //Einbindung verbotenen Zeichen/Wörter zur Systemsicherheit

///// Ende ////////////////////////////////////////

?>
