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
        <div id="cms_inaktiv" class="container">
<?php
$db = new SQLite3('db/infosaeule.sqlite');
if(!$db)die($db->lastErrorMsg());
 else{

if (isset($_POST['lb']))
{
         $results = $db->query("SELECT name, erstzeit,lfdnr from Bilder where status='2' order by 'lfdnr'");
         if($results)
         {
                 while (($row = $results->fetchArray()) )
                 if ((isset($_POST[$row['lfdnr']])) && ($_POST[$row['lfdnr']]=='loeschen'))
                 {
                        // UNLINK auskommentiert
                        // unlink("thumbnail/".$row['erstzeit']."-".$row['name']);
                        // unlink("upload/".$row['erstzeit']."-".$row['name']);
                         $result = $db->querySingle("Delete From Bilder WHERE lfdnr='".$row['lfdnr']."'");
                         if($result)
                         {
                         echo "Eintrag konnte nicht gel&ouml;scht werden";
                         }
                         else {  echo "Bild wurde gel&ouml;scht!<br>";  }

                   }
            echo "</table> ";
         }

         $results = $db->query("SELECT name, erstzeit,lfdnr from Bilder where status='2' order by 'lfdnr'");
          if($results)
            {
                   while (($row = $results->fetchArray()) )
                   if ((isset($_POST[$row['lfdnr']])) && ($_POST[$row['lfdnr']]=='aktivieren'))
                   {
                            $result = $db->querySingle("UPDATE Bilder SET status = '1' WHERE lfdnr='".$row['lfdnr']."'");
                          if($result){
                                  echo "Eintrag konnte nicht geupdated werden";
                          }

                   }

            echo "</table> ";
            }


}

echo" <form action='check_inaktiv.php' method='post' enctype='multipart/form-data'>";




  $results = $db->query("SELECT name, erstzeit,lfdnr from Bilder where status='2' order by 'lfdnr'");
if($row = $results->fetchArray())
  { echo " <b><h3>Inaktive Inhalte</h3></b>";
  echo "<table class='table table-striped table-bordered'> ";
  echo "<thead><th>Name</th>";
  echo "<th>Bild</th>";
  echo "<th>Erstellt am</th>";
  echo "<th> Aktivieren? </th>";
  echo "<th> nichts </th>";
  echo "<th> L&ouml;schen? </th></thead>";
  echo "<tbody>";
  echo "<tr><td>Bild: ".$row['name']."</td>";
                 echo "<td><img src='thumbnail/".$row['erstzeit']."-".$row['name']."' alt='".$row['name']."'</td>";
                 echo "<td>".$row['erstzeit']."</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='aktivieren' style='margin-right: 2px;'>A</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='checked' checked style='margin-right: 2px;'>-</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='loeschen' style='margin-right: 2px;'>L</td>";
                 echo "</tr>";
         while ($row = $results->fetchArray())
         {
                 echo "<tr><td>Bild: ".$row['name']."</td>";
                 echo "<td><img src='thumbnail/".$row['erstzeit']."-".$row['name']."' alt='".$row['name']."'</td>";
                 echo "<td>".$row['erstzeit']."</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='aktivieren' style='margin-right: 2px;'>A</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='checked' checked style='margin-right: 2px;'>-</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='loeschen' style='margin-right: 2px;'>L</td>";
                 echo "</tr>";
         }
  echo "</tbody>";
  echo "</table> <br>";
   echo "<input class='btn btn-default btn-file' type='submit' value='speichern!'>" ;
  }
  else echo "Keine inaktiven Bilder vorhanden!";
$db->close();
}
?>
 <br>
</form>

</div>

</body>
</html>