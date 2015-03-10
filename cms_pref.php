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
$Eintraege=8; //Anzahl der Anträge in der DB unter Preferences


$Eintraege=13; //Anzahl der Anträge in der DB unter Preferences


 if(!$db)die($db->lastErrorMsg());
 else{
        if (isset($_POST['standard']))
       {       $results = $db->query("SELECT lfdnr,value_s from preferences");
                 if($results)
                  {
                  while ($row = $results->fetchArray() )
                          {
                          $flag_a[$row['lfdnr']]=0;
                          $result = $db->querySingle("UPDATE preferences SET 'value' = '".$row['value_s']."' WHERE lfdnr='".$row['lfdnr']."'");
                                          if($result) echo "Eintrag konnte nicht geupdated werden";
                          }
                  }

       }
 $j=0;
 while ($j<$Eintraege+1)
 {
 $flag_a[$j]=0;
 $j++;
 }
 $flag="FF0000";
         if (isset($_POST['speichern']))
       {
       $i='1';

            while($i<$Eintraege+1)
            {
            $flag_a[$i]=0;
            $eintrag=$_POST[$i];
                 if ($i==4)
                 {      $reg='"^[a-fA-F0-9]{6}$"';                //hexadezimale Farbwahl sichern (0-9a-F)
                        if (preg_match($reg,$_POST[$i])==0)
                        {    $flag_a[$i]=1;
                             $eintrag="000000";
                             }  }
                   if ($i==7)
                 {      $reg='"^(([1-9][0-9]{2})|(1000))$"';          //zwischen 100 und 1000
                        if (preg_match($reg,$_POST[$i])==0)
                        {    $flag_a[$i]=1;
                             $eintrag="300";
                             }  }
                   if ($i==8)
                 {      $reg='"^(([3-9][0-9]{2,3})|([1-3][0-9]{3}))$"';              //zwischen 300 und 3999
                        if (preg_match($reg,$_POST[$i])==0)
                        {    $flag_a[$i]=1;
                             $eintrag="1920";
                             }  }

                $result = $db->querySingle("UPDATE preferences SET 'value' = '".$eintrag."' WHERE lfdnr='".$i."'");
                                          if($result)echo "Eintrag konnte nicht geupdated werden";
                                          $i++;
             }
       }

    $results = $db->query("SELECT lfdnr,con,value,value_s from preferences");
if($results)
  {
  echo "<b><h3>Allgemeine Einstellungen</h3></b>";
  echo "<table class='table  table-striped table-bordered'>";
  echo "<thead><th>Eig-Nr</th>";
  echo "<th>Eigenschaft</th>";
  echo "<th>Wert (standard)</th>";
  echo "<th><b>Wert (alt) </th>";
  echo "<th>Wert (neu?) </th></thead>";
  echo "<tbody>";
        while ($row = $results->fetchArray() )
         {
                 if ($row['lfdnr']=='4')     $bgc=$row['value'];

                 if ($flag_a[$row['lfdnr']]==1){
<<<<<<< HEAD


                 echo "<tr><td bgcolor='".$flag."'>".$row['lfdnr']."</td>";
                 echo "<td bgcolor='".$flag."'><b>".$row['con']."</b></td>";
                 echo "<td>".$row['value_s']."</td>";
                 echo "<td >".$row['value']."</td>";
                 echo "<td bgcolor='".$flag."'><input class='form-control placeholder='.col-xs-3' type='input' value='".$row['value']."' name='".$row['lfdnr']."' ></td>";
                 echo "</tr>";
                 }
                 else
                 {
                 echo "<tr><td >".$row['lfdnr']."</td>";
                 echo "<td><b>".$row['con']."</b></td>";
                 echo "<td>".$row['value_s']."</td>";
                 echo "<td >".$row['value']."</td>";
=======
                 echo "<tr>'><td bgcolor='".$flag."'><b>".$row['con']."</b></td>";
                 echo "<td>".$row['value_s']."</td>";
                 echo "<td >".$row['value']."</td>";
                 echo "<td bgcolor='".$flag."'><input class='form-control placeholder='.col-xs-3' type='input' value='".$row['value']."' name='".$row['lfdnr']."' ></td>";
                 echo "</tr>";
                 }
                 else
                 {
                 echo "<tr><td><b>".$row['con']."</b></td>";
                 echo "<td>".$row['value_s']."</td>";
                 echo "<td >".$row['value']."</td>";
>>>>>>> origin/release
                 echo "<td><input class='form-control placeholder='.col-xs-3' type='input' value='".$row['value']."' name='".$row['lfdnr']."' ></td>";
                 echo "</tr>";
                 }
         }
         echo "<tr><td>Testwert</td>";
         echo "<td><b>Farbwerte Hintergrund:</b></td>";
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
 <input class="btn btn-default btn-file" type="submit" value="Standard wiederherstellen" name='standard' >
 <input class="btn btn-default btn-file" type="submit" value="speichern!" name='speichern'>
</form>
</div>

</body>
</html>