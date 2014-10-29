<?php
        include("intern_class.php5");    //Einbindung der Verbindungsdaten
        $objObjekt= new intern;          //Neues Objekt der Klasse wird erzeugt

        include("definitions.php5");     //Datei mit der Definition von vielen Variablen einlesen
        include ("db_connect.php5");     //Zur Datenbank verbinden
        include("content.php5");
        if ($datenbank)
        {
        $re = mysql_query("SELECT text FROM Inhalt WHERE text_id=1", $link);

        $daten = mysql_fetch_array($re, MYSQL_ASSOC);
        }





       include("index.tpl.php5");

      # Datenbank wieder schliessen
    mysql_close($link);
?>
