<?php
include("header.php");
include("cms_links.php");
$db = new SQLite3('db/infosaeule.sqlite');
if(!$db)die($db->lastErrorMsg());
 else{

if (isset($_POST['ab']))
{


         $results = $db->query("SELECT name, erstzeit,lfdnr from Bilder where status='1' order by 'lfdnr'");
          if($results)
            {
                   while (($row = $results->fetchArray()) )
                   if ($_POST[$row['lfdnr']]=='deaktivieren')
                   {
                            $result = $db->querySingle("UPDATE Bilder SET status = '2' WHERE lfdnr='".$row['lfdnr']."'");
                          if($result){
                                  echo "Eintrag konnte nicht geupdated werden";
                          }

                   }

            echo "</table> ";
            }


}

echo" <form action='check_aktiv.php' method='post' enctype='multipart/form-data'>";




  $results = $db->query("SELECT name, erstzeit,lfdnr from Bilder where status='1' order by 'lfdnr'");
if($results)
  { echo " <b><h3>Inaktive Inhalte</h3></b>";
  echo "<table border='1'> ";
  echo "<tr><td><b>Name</b></td>";
  echo "<td><b>Bild</b></td>";
  echo "<td><b>Erstellt am</b></td>";
  echo "<td><b>Deaktivieren?</b></td>";
  echo "<td><b>nichts</b></td></tr>";


         while ($row = $results->fetchArray())
         {
                 echo "<tr><td>Bild: ".$row['name']."</td>";
                 echo "<td><img src='thumbnail/".$row['erstzeit']."-".$row['name']."' alt='".$row['name']."'</td>";
                 echo "<td>".$row['erstzeit']."</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='deaktivieren'>D</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='' checked> ---</td>";

                 echo "</tr><br>";
         }

  echo "</table> ";
  }
$db->close();
}
?>
 <br>

 <input type="submit" value="speichern!">
</form>