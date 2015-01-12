<?php
     //Check ob Session besteht, sonst starten
	if (!isset($_SESSION)) session_start();
	
     $hostname = $_SERVER['HTTP_HOST'];
     $path = dirname($_SERVER['PHP_SELF']);
	
	//Wenn keine Session besteht leite auf login um
     if (!isset($_SESSION['angemeldet']) || !$_SESSION['angemeldet']) {
      header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/login.php');
      exit;
      }
	 
	 //Schliesse Session nach 30 min
	 if (isset($_SESSION['zeit']) && (time() - $_SESSION['zeit'] > 1800)) {
	 	
		$msg = "Sie wurden nach 30 Minuten automatisch abgemeldet";
			die( '<script language="javascript">
						alert(unescape("'.$msg.'"));
					</script>');
	 	session_unset();
    	session_destroy();
	 }
?>