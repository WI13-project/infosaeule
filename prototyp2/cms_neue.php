<?php
include("auth-cm.php");
include("header.php");
include("cms_links.php");
$db = new SQLite3('db/infosaeule.sqlite');
if(!$db)die($db->lastErrorMsg());
 else{

if (isset($_POST['nb']))
{
         $results = $db->query("SELECT name, erstzeit,lfdnr from Bilder where status='0' order by 'lfdnr'");
         if($results)
         {
                 while (($row = $results->fetchArray()) )
                 if ((isset($_POST[$row['lfdnr']])) && ($_POST[$row['lfdnr']]=='loeschen'))
                 {

                         unlink("thumbnail/".$row['erstzeit']."-".$row['name']);
                         unlink("upload/".$row['erstzeit']."-".$row['name']);
                         $result = $db->querySingle("Delete From Bilder WHERE lfdnr='".$row['lfdnr']."'");
                         echo "Bild ".$row['name']." wurde gel&ouml;scht!<br>";
                         if($result)
                         {
                         echo "Eintrag konnte nicht gel&ouml;scht werden";
                         }

                   }
            echo "</table> ";
         }

         $results = $db->query("SELECT name, erstzeit,lfdnr from Bilder where status='0' order by 'lfdnr'");
          if($results)
            {
                   while (($row = $results->fetchArray()) )
                   if ((isset($_POST[$row['lfdnr']])) && ($_POST[$row['lfdnr']]=='aktivieren'))
                   {
                            $result = $db->querySingle("UPDATE Bilder SET status = '1' WHERE lfdnr='".$row['lfdnr']."'");
                          echo "<br>Bild ".$row['name']." wurde aktiviert.<br>";
                          if($result){
                                  echo "Eintrag konnte nicht geupdated werden";
                          }

                   }

            echo "</table> ";
            }


}

echo" <form action='check_neue.php' method='post' enctype='multipart/form-data'>";




  $results = $db->query("SELECT name, erstzeit,lfdnr from Bilder where status='0' order by 'lfdnr'");
if($results)
  { echo " <b><h3>Neue Inhalte</h3></b>";
  echo "<table border='1'> ";
  echo "<tr><td><b>Name</b></td>";
  echo "<td><b>Bild</b></td>";
  echo "<td><b>Erstellt am</b></td>";
  echo "<td><b>Aktivieren?</b></td>";
  echo "<td><b>nichts</b></td>";
  echo "<td><b>L&ouml;schen?</b></td></tr>";

         while ($row = $results->fetchArray())
         {
                 echo "<tr><td>Bild: ".$row['name']."</td>";
                 echo "<td><img src='thumbnail/".$row['erstzeit']."-".$row['name']."' alt='".$row['name']."'</td>";
                 echo "<td>".$row['erstzeit']."</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='aktivieren'>A</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='' checked> ---</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='loeschen'>L</td>";
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