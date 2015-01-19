<?php
	
	session_start();
	session_unset();
	session_destroy();
		
	if ($HTTP_GET_VARS["timeout"]='true') {
		echo ('Sie wurden nach 30 min ausgeloggt. Weiterleitung zum Login..<meta http-equiv="refresh" content="3;url=login.php">');
	}
	else {
		echo ('<meta http-equiv="refresh" content="0;url=login.php">');
	}
?>