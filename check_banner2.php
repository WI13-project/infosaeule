<?php
include("auth-cm.php");
include("header.php");
include("cms_links.php");
  echo "<link href='css/bootstrap.min.css' rel='stylesheet'>";
  echo "<div id='cms_banner' class='container'>";
echo" <form action='cms_banner.php' method='post' enctype='multipart/form-data'>";

$db = new SQLite3('db/infosaeule.sqlite');


 if(!$db)die($db->lastErrorMsg());
 else{

  $results = $db->query("SELECT name, erstzeit,lfdnr from Bilder where status='3' or status='4' order by 'lfdnr'");
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
                 echo "<td><img src='banner_thumb/".$row['erstzeit']."-".$row['name']."' alt='".$row['name']."'</td>";
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
                 echo "<td><img src='banner_thumb/".$row['erstzeit']."-".$row['name']."' alt='".$row['name']."'</td>";
                 echo "<td>".$row['erstzeit']."</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='aktivieren'>A</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='' > ---</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='loeschen'checked>L</td>";
                 echo "</tr>";
         }

  echo "</table> ";
  } else echo "Keine Bilder zum l&ouml;schen ausgew&auml;hlt!";

    $results = $db->query("SELECT name, erstzeit,lfdnr,status from Bilder where status='3' or status='4' order by 'lfdnr'");
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
  if ((isset($_POST['aktivieren'])) && ($_POST['aktivieren']==$row['lfdnr']) )
         {

                echo "<tr><td>Bild: ".$row['name']."</td>";
                 echo "<td><img src='banner_thumb/".$row['erstzeit']."-".$row['name']."' alt='".$row['name']."'</td>";
                 echo "<td>".$row['erstzeit']."</td>";
                 echo "<td><input type='radio' name='aktivieren' value='".$row['lfdnr']."' checked style='margin-right: 2px;'>A</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='checked'  style='margin-right: 2px;'>-</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='loeschen' style='margin-right: 2px;'>L</td>";
                 echo "</tr>";
         }
         while (($row = $results->fetchArray()) )
         if (isset($_POST['aktivieren']) && ($_POST['aktivieren']==$row['lfdnr'])  )
         {


                echo "<tr><td>Bild: ".$row['name']."</td>";
                 echo "<td><img src='banner_thumb/".$row['erstzeit']."-".$row['name']."' alt='".$row['name']."'</td>";
                 echo "<td>".$row['erstzeit']."</td>";
                 echo "<td><input type='radio' name='aktivieren' value='".$row['lfdnr']."' checked style='margin-right: 2px;'>A</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='checked' style='margin-right: 2px;'>-</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='loeschen' style='margin-right: 2px;'>L</td>";
                 echo "</tr>";
         }

  echo "</table> ";
  }
   else echo "Keine Bilder zum aktivieren ausgew&auml;hlt!";

$db->close();
}
?>

 <br>
   <input type="hidden" value="ub" name="ub" >
 <input class="btn btn-default btn-file" type="submit" value="ok!">
</form>
</div>