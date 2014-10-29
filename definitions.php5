<?php
///// Definitionen wichtiger Konstanten im gesamten Projekt ///////////////

define("DEVELOPE",0);          //0---> Keine Anzeigen innerhalb der Seiten, 1---> Ja!
define("BORDER",0);            //setzt den Tabellenrahmen auf 1=sichtbar, 0= ohne Rahmen;
define("DEF_ERROR",0);            //0---> Keine Anzeigen, 1---> Zeigt alle Fehlermeldungen an
define("HELP",0);            //0---> Keine Anzeigen, 1---> Zeigt Nummer des Hilfetextes an
define("OPTI",0);            //0---> Keine Anzeigen, 1---> Zeigt versteckte Bereiche der Optimierungen

///// texte /////////////////////////////////
define("TEXT" ,"Kompetente Hilfe");       //Text f�r beliebige Verwendung
define("TEXT2" ,"Ihr Installateur: ");       //Text f�r beliebige Verwendung
define("KENNUNG", "heizung");     //Kennung entsprechend der Tabellen in der DB
define("CHEF", "Herr Frank Hofmann");     //Ansprechpartner
define("FIRMA", "Heizungs- und Sanit&auml;rinstallation Frank Hofmann");     //Firmenname

define("ORDNER", "heizungs_hofmann/");     //Ordner f�r Bilddateien

///// H�hen /////////////////////////////////
define("HEIGHT", "50");          //Zahl f�r eine H�he
define("HEIGHT2", "150");          //Zahl f�r eine H�he
define("HEIGHT3", "400");          //Zahl f�r eine H�he

///// Sicherheit /////////////////////////////////
define("PWD", 5);          //Mindeststellen beim Passwort
define("SECRET", 9);   //Schl�ssel zum ver/entschl�sseln in der eigenen Verschl�sselungs-Methode

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
define("BILDMAX" ,150);     //Maximale Bildgr��e in Pixel
define("BILDQUALI" ,75);     //Bildqualit�t f�r jpg
define("BILDMAX2" ,1024);     //Maximale Bildgr��e in Pixel
define("BILDQUALI2" ,95);     //Bildqualit�t f�r jpg
define("BILDMAX3" ,800);     //Maximale Bildgr��e in Pixel
define("BILDMAX4" ,600);     //Maximale Bildgr��e in Pixel
define("BILDMAX5" ,200);     //Maximale Bildgr��e in Pixel
define("BILDMAX6" ,160);     //Maximale Bildgr��e in Pixel
define("BILDQUALI3" ,95);     //Bildqualit�t f�r jpg


define("BILDMENGE", 3000);          //maximale Datenmenge in KB

///// Kommunikation /////////////////////////////////
define("EMAIL" ,"info@heizungs-hofmann.de");   //Standard E-Mail Adresse
define("EMAILA" ,"info");   //Standard E-Mail Adresse Teil vor dem @
define("EMAILB" ,"heizungs-hofmann.de");   //Standard E-Mail Adresse Teil nach dem @
define("MOBIL" ,"0176-40029271");    //Standard-Handy-Nummer
define("WWW" ,"www.heizungs-hofmann.de");    //Standard Internet-Domain
define("DOMAIN" ,"heizungs-hofmann.de");    //Standard Internet-Domain
define("TELEFON" ,"034203-43099");    //Standard Telefonnummer
define("FAX" ,"034203-44927");    //Standard Faxnummer

///// Tabellen ///////////////////////////////
define("TABLE", "100%");          //Zahl f�r beliebige Verwendung
define("TABLE2", 800);          //Zahl f�r beliebige Verwendung
define("TABLE3", 965);          //Zahl f�r beliebige Verwendung
define("TABLE4", 400);          //Zahl f�r beliebige Verwendung
define("TABLEPADDING", "0");          //Zahl f�r beliebige Verwendung
define("TABLESPACING", "0");          //Zahl f�r beliebige Verwendung
define("TABLEPADDING2", "3");          //Zahl f�r beliebige Verwendung
define("TABLESPACING2", "3");          //Zahl f�r beliebige Verwendung

///// Diverses /////////////////////////////////
define("PWSTELLEN", 5);          //Stellenanzahl beim PW
define("VERSAND", "1,01");          //Versandkosten
define("KONTO", "?????????");          //Kontodaten
define("BANK", "???????????");          //Kontodaten
define("BLZ", "???????");          //Kontodaten
define("FINANZAMT", "Borna");          //Steuernummer
define("STEUER", "235/232/06397");          //Steuernummer
define("USTEUER", "?????");          //Ust-Ident Nummer
define("GERICHT", "Amtsgericht Borna");          //Gewerbe

define("TRENNER", "&nbsp;|&nbsp;");          //Zahl f�r eine H�he
define("LEERZEICHEN", "&nbsp;&nbsp;");          //Zahl f�r eine H�he
define("LEERZEICHEN2", "&nbsp;");          //Zahl f�r eine H�he



///// Ebene Provider/Lokal /////////////////////////////////
if($_SERVER["SERVER_ADDR"]== "85.214.113.238"  ){ //das ist die IP des Servers bei STRATO
    $def_ebene= "";  //weil auf dem Server die Tagesordner (eine extra Ebene) fehlen
    $def_admintool= "admin/";    //Pfad f�r Admintool
}else{
    $def_ebene= "../";
    $def_admintool= "../admin/";
}
define("EBENE", $def_ebene );    //Ebene als Konstante definieren
define("ADMINTOOL", $def_admintool );    //Ebene als Konstante definieren



///// Fremdanbieter /////////////////////////////////
define("DISCLAIMER", "http://www.disclaimer.de/disclaimer.htm");     //Disclaimer


///// Sicherheit /////////////////////////////////
//include_once(EBENE."secret/eingabe.tpl.php5"); //Einbindung verbotenen Zeichen/W�rter zur Systemsicherheit

///// Ende ////////////////////////////////////////

?>