<?php
include("auth-cm.php");
include("header.php");
include("cms_links.php");

  echo "<link href='css/bootstrap.min.css' rel='stylesheet'>";
  echo "<div id='cms_aktiv' class='container'>";
echo" <form action='cms_aktiv.php' method='post' enctype='multipart/form-data'>";

$db = new SQLite3('db/infosaeule.sqlite');

 if(!$db)die($db->lastErrorMsg());
 else{



    $results = $db->query("SELECT name, erstzeit,lfdnr from Bilder where status='1' order by 'lfdnr'");
if($row = $results->fetchArray())
  { echo " <b><h3>zu deaktivierende Inhalte</h3></b>";
  echo "<table class='table table-striped table-bordered'> ";
  echo "<thead><th>Name</th>";
  echo "<th>Bild</th>";
  echo "<th>Erstellt am</th>";
  echo "<th>Deaktivieren?</th></thead>";
  echo "<tbody>";
   if ((isset($_POST[$row['lfdnr']])) && ($_POST[$row['lfdnr']]=='deaktivieren'))
         {
                 echo "<tr><td>Bild: ".$row['name']."</td>";
                 echo "<td><img src='thumbnail/".$row['erstzeit']."-".$row['name']."' alt='".$row['name']."'</td>";
                 echo "<td>".$row['erstzeit']."</td>";
                 echo "<td><input type='checkbox' name='".$row['lfdnr']."' value='deaktivieren'checked>D</td>";
                 echo "</tr>";
         }

         while (($row = $results->fetchArray()) )
         if ((isset($_POST[$row['lfdnr']])) && ($_POST[$row['lfdnr']]=='deaktivieren'))
         {
                 echo "<tr><td>Bild: ".$row['name']."</td>";
                 echo "<td><img src='thumbnail/".$row['erstzeit']."-".$row['name']."' alt='".$row['name']."'</td>";
                 echo "<td>".$row['erstzeit']."</td>";
                 echo "<td><input type='checkbox' name='".$row['lfdnr']."' value='deaktivieren'checked>D</td>";
                 echo "</tr>";
         }

   echo "</table> <br>";
  echo "<input class='btn btn-default btn-file' type='submit' value='speichern!'>" ;
  }
  else echo "Keine Bilder zum deaktivieren ausgew&auml;hlt!";

$db->close();
}
?>

   <input type="hidden" value="ab" name="ab" >

</form>
</div>