
    <div id="content" >



     <?php

 if ($datenbank)
        {
        $result = mysql_query("SELECT Text_ID,Titel,Kurzinfo FROM Inhalt where deaktiviert =0", $link);
        echo " <table border ='1'>";
      $i=0;
      while ($row = mysql_fetch_assoc($result)) {
       $inhalt[$i++]=$row["Titel"];
       $inhalt[$i++]=$row["Kurzinfo"];

         echo '<tr>';
         echo '<th>'.$row['Titel'].'</th>';
         echo '<th><a href="?go=edit&text='.$row['Text_ID'].'">'.$row['Kurzinfo'].'</a></th>';

         echo '</tr>';
         }
           echo "</table>";
        }
?>

          </div>