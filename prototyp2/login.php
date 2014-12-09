<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	session_start();

	$username = $_POST['username'];
	$passwort = $_POST['passwort'];

	$hostname = $_SERVER['HTTP_HOST'];
	$path = dirname($_SERVER['PHP_SELF']);
	
	//Datenbank öffnen	
	$file = "db/infosaeule.sqlite";
	$db = new SQLite3($file);
	$hash = $db->query("SELECT Passwort FROM user WHERE Benutzername='$username'");
	$pwdArray = $hash->fetchArray (SQLITE3_NUM);
	$dbpw = $pwdArray[0];							//Passwörter müssen bereits gehasht sein!
				
	// Nutzerpasswort wird überprüft
		if (password_verify($_POST['passwort'], $dbpw)) {
			echo "<br>Passw&ouml;rter stimmen &uuml;berein!";
			$_SESSION['angemeldet'] = true;
			
			//Rolle und Namen des Nutzers in Session speichern
			$_SESSION['rolle'] = $db->query("SELECT Gruppe FROM user WHERE Benutzername='$username'");
			$_SESSION['nutzername'] = $username;

			// Weiterleitung zur geschützten Startseite
			if ($_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.1') {
				if (php_sapi_name() == 'cgi') {
					header('Status: 303 See Other');
				 }
				else {
					header('HTTP/1.1 303 See Other');
				 }
			}

		   header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/index.php');
		   exit;
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
 <head>
  <title>Gesch&uuml;tzter Bereich</title>
 </head>
 <body>
  <form action="login.php" method="post">
   Username: <input type="text" name="username" /><br />
   Passwort: <input type="password" name="passwort" /><br />
   <input type="submit" value="Anmelden" />
  </form>
 </body>
</html>