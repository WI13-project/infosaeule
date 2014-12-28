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
        $dbpw = $pwdArray[0];                                                        //Passwörter müssen bereits gehasht sein!

        // Nutzerpasswort wird überprüft
                if (password_verify($_POST['passwort'], $dbpw)) {
                        //echo "<br>Passw&ouml;rter stimmen &uuml;berein!";
                        $_SESSION['angemeldet'] = true;

                        //Rolle und ID des Nutzers in Session speichern
                        $results = $db->query("SELECT Gruppe FROM user WHERE Benutzername='$username'");
                        $res=$results->fetchArray();
                         $_SESSION['rolle'] =$res['Gruppe'];

                        $results=$db->query("SELECT ID FROM user WHERE Benutzername='$username'");
                        $res=$results->fetchArray();
                        $_SESSION['user_id'] =$res['ID'];

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
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet">
</head>

<body>
	
	<div class="container">
	<form class="form-signin" action="login.php" method="post">
		<h2 class="form-signin-heading">Bitte loggen Sie sich ein</h2>
   		<label for="inputUsername" class="sr-only">Username:</label> 
   		<input type="text" id="inputUsername" class="form-control" placeholder="Benutzername" name="username" required autofocus>
   		<lable for="inputPassword" class="sr-only">Passwort:</lable> 
   		<input type="password" id="inputPassword" class="form-control" placeholder="Passwort" name="passwort" required>
   		<button class="btn btn-lg btn-primary btn-block" type="submit">Anmelden</button>
  	</form>
  	</div>
	* root : root <br>
	* CManager : contentmanager <br>
	* user : user123 <br>
	<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>