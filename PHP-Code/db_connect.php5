<?php
    $objObjekt->file_name(DEVELOPE,"DB connecten...." , "a" );

    $_db_host = "localhost";            # meist localhost
    $_db_datenbank = "SwE";
    $_db_username = "root";
    $_db_passwort = "";

    SESSION_START();

    # Datenbankverbindung herstellen
    $link = mysql_connect($_db_host, $_db_username, $_db_passwort);

    # Hat die Verbindung geklappt ?
    if (!$link)
        {
        die("Keine Datenbankverbindung möglich: " . mysql_error());
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