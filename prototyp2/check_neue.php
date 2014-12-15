<?php
include("auth-cm.php");
include("header.php");
include("cms_links.php");
echo" <form action='cms_neue.php' method='post' enctype='multipart/form-data'>";

$db = new SQLite3('db/infosaeule.sqlite');

 if(!$db)die($db->lastErrorMsg());
 else{

  $results = $db->query("SELECT name, erstzeit,lfdnr from Bilder where status='0' order by 'lfdnr'");
if($results)
  { echo " <b><h3>zu Löschende Inhalte</h3></b>";
  echo "<table border='1'> ";
  echo "<tr><td><b>Name</b></td>";
  echo "<td><b>Bild</b></td>";
  echo "<td><b>Erstellt am</b></td>";
  echo "<td><b>Aktivieren?</b></td>";
  echo "<td><b>nichts</b></td>";
  echo "<td><b>L&ouml;schen?</b></td></tr>";

         while (($row = $results->fetchArray()) )
         if ($_POST[$row['lfdnr']]=="loeschen"){

                 echo "<tr><td>Bild: ".$row['name']."</td>";
                 echo "<td><img src='thumbnail/".$row['erstzeit']."-".$row['name']."' alt='".$row['name']."'</td>";
                 echo "<td>".$row['erstzeit']."</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='aktivieren'>A</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='' > ---</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='loeschen'checked>L</td>";
                 echo "</tr><br>";
         }

  echo "</table> ";
  }

    $results = $db->query("SELECT name, erstzeit,lfdnr from Bilder where status='0' order by 'lfdnr'");
if($results)
  { echo " <b><h3>zu aktivierende Inhalte</h3></b>";
  echo "<table border='1'> ";
  echo "<tr><td><b>Name</b></td>";
  echo "<td><b>Bild</b></td>";
  echo "<td><b>Erstellt am</b></td>";
  echo "<td><b>Aktivieren?</b></td>";
  echo "<td><b>nichts</b></td>";
  echo "<td><b>L&ouml;schen?</b></td></tr>";

         while (($row = $results->fetchArray()) )
         if ($_POST[$row['lfdnr']]=='aktivieren')
         {
                 echo "<tr><td>Bild: ".$row['name']."</td>";
                 echo "<td><img src='thumbnail/".$row['erstzeit']."-".$row['name']."' alt='".$row['name']."'</td>";
                 echo "<td>".$row['erstzeit']."</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='aktivieren'checked>A</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='' > ---</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='loeschen'>L</td>";
                 echo "</tr><br>";
         }

  echo "</table> ";
  }

$db->close();
}
?>
 <br>
   <input type="hidden" value="nb" name="nb" >
 <input type="submit" value="speichern!">
</form>