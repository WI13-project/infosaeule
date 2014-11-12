<?php
    $objObjekt->file_name(DEVELOPE,"DB connecten...." , "a" );

    $_db_host = "geheim";            # Klaus Sein Webhost
    $_db_datenbank = "geheim";
    $_db_username = "geheim";
    $_db_passwort = "asdf1234";

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
