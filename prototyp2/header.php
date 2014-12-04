<head>
	<title></title>
</head>
<html>
	<body>
    <div class="header">
     	<a href=index.php>Home</a> <a href=upload.php>Bilder hochladen</a> <a href=view.php>Bilder ansehen</a> <a href=form.php>Nutzer anlegen</a> 
     	

<form action="" method="post">
Dein Name: 
<input type="Text" name="lname">
Passwort: 
<input type="Text" name="pwd">
<input type="Submit" value="Einloggen">
</form>

<?php
//Session starten
session_start();
if(!isset($_POST['lname']))
   {
   $name = "Gast";
   }
   else 
   {
	$name=$_POST['lname'];
	}
if(!isset($_POST['pwd']))
   {
   die("passwort fehlt");
   }
   else
   {
   //Funktioniert nur ab PHP 5.5!
   $pawo=password_hash("".$_POST['pwd']."",PASSWORT_DEFAULT);
   }
   
$file = "db/infosaeule.sqlite";
$db = new SQLite3($file);
$hash = $db->query("SELECT Passwort FROM user WHERE Benutzername='$name'");
$pwdArray= $hash->fetchArray (SQLITE3_NUM);

		if(!$db)
			die($db->lastErrorMsg());	
		if($pawo == $pwdArray[0])
		{
			//Session registrieren
			$_SESSION['username'] = $name;

			//Text ausgeben
			echo "Hallo $name <br>";
		}
		else {
			die("Nutzer  / Passwort falsch");
			}
		$db->close();
?>

    	
    </div>
	</body>
</html>