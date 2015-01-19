<?php
//Check ob Session besteht, sonst starten
if (!isset($_SESSION)) session_start();

 $hostname = $_SERVER['HTTP_HOST'];
 $path = dirname($_SERVER['PHP_SELF']);

 if (!isset($_SESSION['angemeldet']) || !$_SESSION['angemeldet']) {
  header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/login.php');
  exit;
  }
if (!isset($_SESSION['rolle']) || ($_SESSION['rolle'] == 'user') || ($_SESSION['rolle'] == 'cm')){
        die ('<script language="javascript">
                alert(unescape("Sie haben nicht die n%F6tigen Zugriffsrechte f%FCr diesen Bereich%21"));
        </script>');
}

//Schliesse Session nach 30 min
         if (isset($_SESSION['zeit']) && (time() - $_SESSION['zeit'] > 20)) {

                header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/login.php');
         }
?>