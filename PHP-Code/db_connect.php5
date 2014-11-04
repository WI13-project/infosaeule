<?php
    $objObjekt->file_name(DEVELOPE,"DB connecten...." , "a" );

    $_db_host = "server6.webgo24.de";            # Klaus Sein Webhost
    $_db_datenbank = "web424_db9";
    $_db_username = "web424_9";
    $_db_passwort = "graetzeristdoof";

    SESSION_START();

    # Datenbankverbindung herstellen
    $link = mysql_connect($_db_host, $_db_username, $_db_passwort);

    # Hat die Verbindung geklappt ?
    if (!$link)
        {
        die("Keine Datenbankverbindung moeglich: " . mysql_error());
        }

    # Verbindung zur richtigen Datenbank herstellen
    $datenbank = mysql_select_db($_db_datenbank, $link);

    if (!$datenbank)
        {
        echo "Kann die Datenbank nicht benutzen: " . mysql_error();
        mysql_close($link);
        exit;
        }


$objObjekt->file_name(DEVELOPE,"DB verbunden!" , "e" );
?>
