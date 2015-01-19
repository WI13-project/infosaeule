<?php
     //Check ob Session besteht, sonst starten
   	if (!isset($_SESSION)) session_start();

  	//Wenn keine Session besteht leite auf login um
 	if (!isset($_SESSION['angemeldet']) || !$_SESSION['angemeldet']) {
 		echo ('Nicht angemeldet, leite um...<meta http-equiv="refresh" content="3;url=login.php">');
  	exit;
  		}

     //Schliesse Session nach 30 min
     if (isset($_SESSION['zeit']) && (time() - $_SESSION['zeit'] > 1800)) {
    	echo('<meta http-equiv="refresh" content="0;url=logout.php?timeout=true">');
     }
	 else {
		 //Anmeldezeit zurücksetzen
 		$_SESSION['zeit']=time();
	 }
	 //Berechtigung prüfen
	 if (!isset($_SESSION['rolle']) || ($_SESSION['rolle'] == 'user') || ($_SESSION['rolle'] == 'cm')){
        die ('<script language="javascript">
                alert(unescape("Sie haben nicht die n%F6tigen Zugriffsrechte f%FCr diesen Bereich%21"));
        </script>');
}
	  
?>