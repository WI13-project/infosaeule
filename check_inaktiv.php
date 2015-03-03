<?php
include("auth-cm.php");
include("header.php");
include("cms_links.php");
  echo "<link href='css/bootstrap.min.css' rel='stylesheet'>";
  echo "<div id='cms_inaktiv' class='container'>";
echo" <form action='cms_inaktiv.php' method='post' enctype='multipart/form-data'>";

$db = new SQLite3('db/infosaeule.sqlite');

 if(!$db)die($db->lastErrorMsg());
 else{

  $results = $db->query("SELECT name, erstzeit,lfdnr from Bilder where status='2' order by 'lfdnr'");
if($row = $results->fetchArray())
  { echo " <b><h3>zu l&ouml;schende Inhalte</h3></b>";
  echo "<table class='table table-striped table-bordered'> ";
  echo "<thead><th>Name</th>";
  echo "<th>Bild</th>";
  echo "<th>Erstellt am</th>";
  echo "<th> Aktivieren? </th>";
  echo "<th> nichts </th>";
  echo "<th> L&ouml;schen? </th></thead>";
  echo "<tbody>";
  if ((isset($_POST[$row['lfdnr']])) && ($_POST[$row['lfdnr']]=='loeschen'))
                {
                 echo "<tr><td>Bild: ".$row['name']."</td>";
                 echo "<td><img src='thumbnail/".$row['erstzeit']."-".$row['name']."' alt='".$row['name']."'</td>";
                 echo "<td>".$row['erstzeit']."</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='aktivieren'>A</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='' > ---</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='loeschen'checked>L</td>";
                 echo "</tr>";
         }
         while (($row = $results->fetchArray()) )
         if ((isset($_POST[$row['lfdnr']])) && ($_POST[$row['lfdnr']]=='loeschen'))
                {
                 echo "<tr><td>Bild: ".$row['name']."</td>";
                 echo "<td><img src='thumbnail/".$row['erstzeit']."-".$row['name']."' alt='".$row['name']."'</td>";
                 echo "<td>".$row['erstzeit']."</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='aktivieren'>A</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='' > ---</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='loeschen'checked>L</td>";
                 echo "</tr>";
         }

  echo "</table> ";
  } else echo "Keine Bilder zum l&ouml;schen ausgew&auml;hlt!";

    $results = $db->query("SELECT name, erstzeit,lfdnr from Bilder where status='2' order by 'lfdnr'");
if($row = $results->fetchArray())
  { echo " <b><h3>zu aktivierende Inhalte</h3></b>";
  echo "<table class='table table-striped table-bordered'> ";
  echo "<thead><th>Name</th>";
  echo "<th>Bild</th>";
  echo "<th>Erstellt am</th>";
  echo "<th> Aktivieren? </th>";
  echo "<th> nichts </th>";
  echo "<th> L&ouml;schen? </th></thead>";
  echo "<tbody>";
  if ((isset($_POST[$row['lfdnr']])) && ($_POST[$row['lfdnr']]=='aktivieren'))
         {
                 echo "<tr><td>Bild: ".$row['name']."</td>";
                 echo "<td><img src='thumbnail/".$row['erstzeit']."-".$row['name']."' alt='".$row['name']."'</td>";
                 echo "<td>".$row['erstzeit']."</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='aktivieren'checked>A</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='' >-</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='loeschen'>L</td>";
                 echo "</tr>";
         }
         while (($row = $results->fetchArray()) )
         if ((isset($_POST[$row['lfdnr']])) && ($_POST[$row['lfdnr']]=='aktivieren'))
         {
                 echo "<tr><td>Bild: ".$row['name']."</td>";
                 echo "<td><img src='thumbnail/".$row['erstzeit']."-".$row['name']."' alt='".$row['name']."'</td>";
                 echo "<td>".$row['erstzeit']."</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='aktivieren'checked>A</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='' >-</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='loeschen'>L</td>";
                 echo "</tr>";
         }

  echo "</table> ";
  }
   else echo "Keine Bilder zum aktivieren ausgew&auml;hlt!";

$db->close();
}
?>

 <br>
   <input type="hidden" value="lb" name="lb" >
 <input class="btn btn-default btn-file" type="submit" value="ok!">
</form>
</div>