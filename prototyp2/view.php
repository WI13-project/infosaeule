<?php
$db = new SQLite3('db/infosaeule.sqlite');

 if(!$db)die($db->lastErrorMsg());
 else{



    $results = $db->query("SELECT name, erstzeit,lfdnr FROM bilder WHERE status='1' ORDER BY 'lfdnr'");
if($results)
  {
         $i='0';
         while (($row = $results->fetchArray()) )
         {
                 $i++;
                 echo "<input type='hidden' value='".$row['erstzeit']."-".$row['name']."' name='".$i."' id='pfad".$i."' > ";

         }
            echo "<input type='hidden' value='".$i."' name='0' id='pfad0'> ";

  }

$db->close();
}


?>
<head>
<meta http-equiv='refresh' content='1 URL='./view.php?zeile=1'>

<script language="javascript" type="text/javascript">

var max=10;
var typ = 0;
var bildrota = 0;
var anzahl=document.getElementById("pfad0").value;
var bilder=[];
for (var i = 1; i<=anzahl; i++){
       bilder[(i-1)]=document.getElementById(("pfad"+(i))).value;
        }
window.setTimeout("start()", 10);

function start() {
    change = window.setInterval("bildwechsel()", 1000);
}
var j=0;
function bildwechsel () {
 var bneu=0;
 var b=0;
 var maxA=0;
 if (max <= anzahl) {
 maxA=max;
 }
 else {
 maxA=anzahl;}

      while (b<maxA)
      {
            bneu=j+b;
            if (bneu>=maxA){
                 bneu=bneu-maxA;
                 }
            if (b==0){
                 document.getElementById("bild"+(b+1)).src = 'upload/'+ bilder[bneu];

            }
            else{
                 document.getElementById("bild"+(b+1)).src = 'thumbnail/'+ bilder[bneu];

            }
            b++;
      }
      j++;
      b=0;
      if (j>maxA){
      j=j-maxA;
      }


         window.clearInterval(change);
         window.setTimeout("start()", 1000);


}
</script>




</head>
<body height="100%">

 <center><table border="0" height="100%" width="100%">
        <tr>
                <td width="10%">
                         <center>
                              <?php
                                For($j=2;$j<=$i;$j++){
                                  echo "<img src='thumbnail/20141207_181257-schlange.jpg' width='100%'  style='border: 0px;' id='bild".$j."' align='middle'><br>";
                                  }
                              ?>
                        </center></td>
                <td width="90%" height="90%">
                        <center>
                        <img src='upload/20141207_181257-schlange.jpg'   style='border: 0px;' id='bild1' width="99%"  align="middle">
                        </center>
                </td>
        </tr>
</table></center>




</body>