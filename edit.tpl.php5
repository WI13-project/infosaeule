<div id="start">

     <?php
      if (!isset($_POST["tNR"]))
      {
           echo "<input type='hidden' name='tNr' value='".$_GET['text']."'>";
           $id=$_GET['text'];
      }
      else{
           echo "<input type='hidden' name='tNr' value='".$_POST['tNr']."'>";
           $id= $_POST['tNr'];
      }



     if ((isset($_POST["tArea"])) AND ($datenbank) )
         {

          $txt="Update inhalt Set Text='".$_POST["tArea"]."' Where Text_ID =".$id.";";
          echo $txt;
          $ab=mysql_query($txt) or die(mysql_error());

          echo "gespeichert!";
          echo $_POST["tArea"];
         }
        if (!isset($_GET['text']))
        {
        echo "Bitte Eintrag auswählen";
         $row["Text"]= "Neuer Text!?";
        }
        else{
 if ($datenbank)
        {
        $result = mysql_query("SELECT Text FROM Inhalt where Text_ID =".$id.";", $link);
        echo ($_GET["text"]);
        $row = mysql_fetch_assoc($result);
             }   }
?>

      <form action="edit.php" method="post">
    <textarea name="tArea" ><?= $row["Text"] ?></textarea>
    <input type="submit" value="Speichern" name"submit">
</form>

</div>