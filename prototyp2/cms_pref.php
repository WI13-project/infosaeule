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
	<div id="cms_pref" class="container">
<?php
echo" <form action='cms_pref.php' method='post' enctype='multipart/form-data'>";

$db = new SQLite3('db/infosaeule.sqlite');

 if(!$db)die($db->lastErrorMsg());
 else{
        if (isset($_POST['standard']))
       {       $results = $db->query("SELECT lfdnr,value_s from preferences");
                 if($results)
                  {
                  while ($row = $results->fetchArray() )
                          {

                          $result = $db->querySingle("UPDATE preferences SET 'value' = '".$row['value_s']."' WHERE lfdnr='".$row['lfdnr']."'");
                                          if($result) echo "Eintrag konnte nicht geupdated werden";
                          }
                  }

       }
        if (isset($_POST['speichern']))
       {
       $i='1';
            while($i<'7')
            {
                $result = $db->querySingle("UPDATE preferences SET 'value' = '".$_POST[$i]."' WHERE lfdnr='".$i."'");
                                          if($result)echo "Eintrag konnte nicht geupdated werden";
                                          $i++;
             }
       }

    $results = $db->query("SELECT lfdnr,con,value,value_s from preferences");
if($results)
  {
  echo "<b><h3>Allgemeine Einstellungen</h3></b>";
  echo "<table class='table  table-striped table-bordered'>";
  echo "<thead><th>Eigenschaft</th>";
  echo "<th>Wert (standard)</th>";
  echo "<th><b>Wert (alt) </th>";
  echo "<th>Wert (neu?) </th></thead>";
  echo "<tbody>";
        while ($row = $results->fetchArray() )
         {
                 if ($row['lfdnr']=='4') $bgc=$row['value'];
                 echo "<tr><td><b>".$row['con']."</b></td>";
                 echo "<td>".$row['value_s']."</td>";
                 echo "<td>".$row['value']."</td>";
                 echo "<td><input class='form-control placeholder='.col-xs-3' type='input' value='".$row['value']."' name='".$row['lfdnr']."' ></td>";
                 echo "</tr>";
         }
         echo "<tr><td><b>Farbwerte Hintergrund:</b></td>";
         echo "<td bgcolor='000000'>Farbtest</td>";
         echo "<td bgcolor='".$bgc."'>Farbtest</td>";
         echo "<td bgcolor='ffffff'>Farbtest</td></tr>";
  echo "</tbody>";
  echo "</table>";
  }

$db->close();
}
?>
 <br>
   <input type="hidden" value="pb" name="pb" >
 <input class="btn btn-default btn-file" type="submit" value="Standart wiederherstellen" name='standard' >
 <input class="btn btn-default btn-file" type="submit" value="speichern!" name='speichern'>
</form>
</div>
	
</body>
</html>