<?php
include("header.php");
include("cms_links.php");
echo" <form action='cms_aktiv.php' method='post' enctype='multipart/form-data'>";

$db = new SQLite3('db/infosaeule.sqlite');

 if(!$db)die($db->lastErrorMsg());
 else{



    $results = $db->query("SELECT name, erstzeit,lfdnr from Bilder where status='1' order by 'lfdnr'");
if($results)
  { echo " <b><h3>zu deaktivierende Inhalte</h3></b>";
  echo "<table border='1'> ";
  echo "<tr><td><b>Name</b></td>";
  echo "<td><b>Bild</b></td>";
  echo "<td><b>Erstellt am</b></td>";
  echo "<td><b>dektivieren?</b></td></tr>";


         while (($row = $results->fetchArray()) )
         if ((isset($_POST[$row['lfdnr']])) && ($_POST[$row['lfdnr']]=='deaktivieren'))
         {
                 echo "<tr><td>Bild: ".$row['name']."</td>";
                 echo "<td><img src='thumbnail/".$row['erstzeit']."-".$row['name']."' alt='".$row['name']."'</td>";
                 echo "<td>".$row['erstzeit']."</td>";
                 echo "<td><input type='checkbox' name='".$row['lfdnr']."' value='deaktivieren'checked>D</td>";


                 echo "</tr><br>";
         }

  echo "</table> ";
  }

$db->close();
}
?>
 <br>
   <input type="hidden" value="ab" name="ab" >
 <input type="submit" value="speichern!">
</form>