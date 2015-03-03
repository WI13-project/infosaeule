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
        <div id="cms_aktiv" class="container">
<?php

$db = new SQLite3('db/infosaeule.sqlite');
if(!$db)die($db->lastErrorMsg());
 else{

if (isset($_POST['ab']))
{


         $results = $db->query("SELECT name, erstzeit,lfdnr from Bilder where status='1' order by 'lfdnr'");
          if($results)
            {
                   while (($row = $results->fetchArray()) )
                   if ((isset($_POST[$row['lfdnr']])) && ($_POST[$row['lfdnr']]=='deaktivieren'))
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
if($row = $results->fetchArray())
  { echo " <b><h3>Aktive Inhalte</h3></b>";
  echo "<table class='table table-striped table-bordered'> ";
  echo "<thead><th>Name</th>";
  echo "<th>Bild</th>";
  echo "<th>Erstellt am</th>";
  echo "<th>Deaktivieren?</th></thead>";
  echo "<tbody>";
  echo "<tr><td>Bild: ".$row['name']."</td>";
                 echo "<td><img src='thumbnail/".$row['erstzeit']."-".$row['name']."' alt='".$row['name']."'</td>";
                 echo "<td>".$row['erstzeit']."</td>";
                 echo "<td><input type='checkbox' name='".$row['lfdnr']."' value='deaktivieren' style='margin-right: 2px;'>D</td>";
                 echo "</tr>";

         while ($row = $results->fetchArray())
         {
                 echo "<tr><td>Bild: ".$row['name']."</td>";
                 echo "<td><img src='thumbnail/".$row['erstzeit']."-".$row['name']."' alt='".$row['name']."'</td>";
                 echo "<td>".$row['erstzeit']."</td>";
                 echo "<td><input type='checkbox' name='".$row['lfdnr']."' value='deaktivieren' style='margin-right: 2px;'>D</td>";
                 echo "</tr>";
         }
        echo "</tbody>";
  echo "</table> <br>";
  echo "<input class='btn btn-default btn-file' type='submit' value='speichern!'>" ;
  }
  else echo "Keine aktiven Bilder vorhanden!";
$db->close();
}
?>
 <br>


</form>
</div>

</body>
</html>