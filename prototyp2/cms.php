<?php
include("auth-cm.php");
include("header.php");
include("cms_links.php");
?>
<html>
<head>
	<title></title>
	
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

	<div id="cms" class="container">
	<?php
		$db = new SQLite3('db/infosaeule.sqlite');
		if(!$db){
	 		die($db->lastErrorMsg());
	 	}else{
			$results = $db->query("SELECT name, erstzeit,lfdnr from Bilder where status='0' order by 'lfdnr'");
			if($results){
				echo " <b><h3>Neu und ungepr&uuml;ft</h3></b>";
				echo "<table class='table table-striped table-bordered'> ";
				echo "<thead><th>Name</th>";
				echo "<th>Bild</th>";
				echo "<th>Erstellt am</th></thead>";
				echo "<tbody>";
	         	while ($row = $results->fetchArray()){
	                 echo "<tr><td>Bild: ".$row['name']."</td>";
	                 echo "<td><img src='thumbnail/".$row['erstzeit']."-".$row['name']."' alt='".$row['name']."'</td>";
	                 echo "<td>".$row['erstzeit']."</td>";
	                 echo "</tr><br>";
	         	}
	  			echo "</tbody>";
				echo "</table> ";
	  		}
	
		$results = $db->query("SELECT name, erstzeit,lfdnr from Bilder where status='1' order by 'lfdnr'");
		if($results){
			echo " <b><h3>Aktive Inhalte</h3></b>";
	  		echo "<table class='table table-striped table-bordered'> ";
		   	echo "<thead><th>Name</th>";
		 	echo "<th>Bild</th>";
		  	echo "<th>Erstellt am</th></thead>";
		  	echo "<tbody>";
	        while ($row = $results->fetchArray()){
	        	echo "<tr><td>Bild: ".$row['name']."</td>";
	            echo "<td><img src='thumbnail/".$row['erstzeit']."-".$row['name']."' alt='".$row['name']."'</td>";
	            echo "<td>".$row['erstzeit']."</td>";
	            echo "</tr>";
			}
			echo"</tbody>";
	  		echo "</table> ";
	  	}
		$results = $db->query("SELECT name, erstzeit,lfdnr from Bilder where status='2' order by 'lfdnr'");
		if($results){
			echo " <b><h3>Inaktive Inhalte</h3></b>";
	    	echo "<table class='table table-striped table-bordered'> ";
	   		echo "<thead><th>Name</th>";
	  		echo "<th>Bild</th>";
	  		echo "<th>Erstellt am</th></thead>";
	  		echo "<tbody>";
	        while ($row = $results->fetchArray()){
	        	echo "<tr><td>Bild: ".$row['name']."</td>";
	            echo "<td><img src='thumbnail/".$row['erstzeit']."-".$row['name']."' alt='".$row['name']."'</td>";
	            echo "<td>".$row['erstzeit']."</td>";
	            echo "</tr><br>";
			}
			echo"</tbody";
	  		echo "</table> ";
	  	}
		$db->close();
	}
	?>

	</div>
	
</body>
</html>

