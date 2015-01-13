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
	echo "Sie haben nicht die n&ouml;tigen Zugriffsrechte f&uuml;r diesen Bereich!";
exit;
}
?>