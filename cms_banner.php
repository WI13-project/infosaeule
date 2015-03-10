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
<div id="cms_banner" class="container">

<h1>Banner-Upload-Skript</h1>

<form class="form-horizontal" action="check_banner.php" method="post" enctype="multipart/form-data">
               <div class="control-group">
                                        <label class="control-label" for="bildname"></label>
                                                <div class="controls">
                                                        <input name="bildname" type="text" id="bildname" placeholder="Bildbeschreibung" required autofocus>
                                        <span class="btn btn-default btn-file">
                                                Bild ausw&auml;hlen <input name="datei" type="file" id="datei">
                                        </span>
                                                </div>
                                   </div>

<!--
                 <h3>Optional:</h3>

                <div class="control-group">
                        <td>aktiv ab Datum(tt.mm.jjjj):</td>
                        <td><input type="text" name="aktab"></td>
                        <td>Uhrzeit(hh:mm):</td>
                        <td><input type="text" name="aktab"></td>
                </div>
                <div class="control-group">
                        <td>aktiv bis Datum(tt.mm.jjjj):</td>
                        <td><input type="text" name="aktab"></td>
                        <td>Uhrzeit(hh:mm):</td>
                        <td><input type="text" name="aktab"></td>
                </div>
 <br>
-->
<input class="btn btn-default btn-file" type="submit" value="Hochladen">
</form>
<h4>Nur Bilder bis 1 MB im jpg,gif oder png-Format!</h4>
<h5>Bilder werden automatisch auf die vorgegebenen Banner-Gr&ouml;&szlig;en scaliert und in PNG gewandelt.</h5>


<?php
$db = new SQLite3('db/infosaeule.sqlite');
if(!$db)die($db->lastErrorMsg());
 else{

if (isset($_POST['ub']))
{
         $results = $db->query("SELECT name, erstzeit,lfdnr from Bilder where status='3' or status='4' order by 'lfdnr'");
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

         }

         $results2 = $db->query("SELECT name, erstzeit,lfdnr ,status from Bilder where status='3' or status='4' order by 'lfdnr'");
          if($results2)
            {
                   while ($row = $results2->fetchArray() )
              {


                   if ((isset($_POST['aktivieren'])) && ($_POST['aktivieren']==$row['lfdnr']))
                   {

                            $result = $db->querySingle("UPDATE Bilder SET status = '3' WHERE status='4'");
                          if($result){
                                  echo "Eintrag konnte nicht geupdated werden";
                          }

                          $result = $db->querySingle("UPDATE Bilder SET status = '4' WHERE lfdnr='".$row['lfdnr']."'");

                          if($result){
                                  echo "Eintrag konnte nicht geupdated werden";
                          }

                   }
               }
            }


}

echo" <form action='check_banner2.php' method='post' enctype='multipart/form-data'>";




  $results = $db->query("SELECT name, erstzeit,lfdnr, status from Bilder where status='3' Or status='4' order by 'lfdnr'");
if($row = $results->fetchArray())
  { echo " <b><h3>Banner</h3></b>";
  echo "<table class='table table-striped table-bordered'> ";
  echo "<thead><th>Name</th>";
  echo "<th>Bild</th>";
  echo "<th>Erstellt am</th>";
  echo "<th> Aktivieren? </th>";
  echo "<th> nichts </th>";
  echo "<th> L&ouml;schen? </th></thead>";
  echo "<tbody>";
  echo "<tr><td>Bild: ".$row['name']."</td>";
                 echo "<td><img src='banner_thumb/".$row['erstzeit']."-".$row['name']."' alt='".$row['name']."'</td>";
                 echo "<td>".$row['erstzeit']."</td>";
                  echo "<td><input type='radio' name='aktivieren' value='".$row['lfdnr']."' ";
                 if($row['status']=='4') echo " checked ";
                 echo " style='margin-right: 2px;'>A</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='checked' checked style='margin-right: 2px;'>-</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='loeschen' style='margin-right: 2px;'>L</td>";
                 echo "</tr>";
         while ($row = $results->fetchArray())
         {
                 echo "<tr><td>Bild: ".$row['name']."</td>";
                 echo "<td><img src='banner_thumb/".$row['erstzeit']."-".$row['name']."' alt='".$row['name']."'</td>";
                 echo "<td>".$row['erstzeit']."</td>";
                 echo "<td><input type='radio' name='aktivieren' value='".$row['lfdnr']."' ";
                 if($row['status']=='4') echo " checked ";
                 echo " style='margin-right: 2px;'>A</td>"; echo "<td><input type='radio' name='".$row['lfdnr']."' value='checked' checked style='margin-right: 2px;'>-</td>";
                 echo "<td><input type='radio' name='".$row['lfdnr']."' value='loeschen' style='margin-right: 2px;'>L</td>";
                 echo "</tr>";
         }
  echo "</tbody>";
  echo "</table> <br>";
   echo "<input class='btn btn-default btn-file' type='submit' value='speichern!'>" ;
  }
  else echo "Keine Banner-Bilder vorhanden!";
$db->close();
}
?>
 <br>
</form>

</div>

</body>
</html>