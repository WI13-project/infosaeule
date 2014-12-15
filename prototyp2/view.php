<?php
$db = new SQLite3('db/infosaeule.sqlite');

 if(!$db)die($db->lastErrorMsg());
 else{



    $results = $db->query("SELECT name, erstzeit,lfdnr FROM bilder WHERE status='1' ORDER BY lfdnr DESC");
if($results)
  {
         $i='0';
         while (($row = $results->fetchArray()) )
         {
                 $i++;
                 echo "<input type='hidden' value='".$row['erstzeit']."-".$row['name']."' name='".$i."' id='pfad".$i."' >";

         }
            echo "<input type='hidden' value='".$i."' name='0' id='pfad0'>";

  }
   $results = $db->query("SELECT lfdnr,value FROM preferences ");
if($results)
  {
         $i='0';
         while (($row2 = $results->fetchArray()) )
         {
                 $i++;
                 echo "<input type='hidden' value='".$row2['value']."' name='p".$row2['lfdnr']."' id='p".$row2['lfdnr']."' >";
                 if ($i=='3') $rahmen=$row2['value'];
                 if ($i=='1') $maxA=$row2['value'];
                 if ($i=='4') $bgc=$row2['value'];
         }

  }

$db->close();
}


?>
<head>
<meta http-equiv='refresh' content='1 URL='./view.php?zeile=1'>

<script language="javascript" type="text/javascript">

var max=document.getElementById("p1").value;
var slidetime=((document.getElementById("p2").value)*1000);
var rahmen=document.getElementById("p3").value;
var bgc=document.getElementById("p4").value;
var thumb=document.getElementById("p5").value;
var pic=document.getElementById("p6").value;
var typ = 0;
var bildrota = 0;
var anzahl=document.getElementById("pfad0").value;
var bilder=[];
for (var i = 1; i<=anzahl; i++){
       bilder[(i-1)]=document.getElementById(("pfad"+(i))).value;
        }
window.setTimeout("start()", 1);

function start() {
    change = window.setInterval("bildwechsel()", slidetime);
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
                 document.getElementById("bild"+(b+1)).src = pic+'/'+ bilder[bneu];

            }
            else{
                 document.getElementById("bild"+(b+1)).src = thumb+'/'+ bilder[bneu];

            }
            b++;
      }
      j++;
      b=0;
      if (j>maxA){
      j=j-maxA;
      }


         window.clearInterval(change);
         window.setTimeout("start()", slidetime);


}
</script>




</head>
<body height="100%" bgcolor="<?=$bgc;?>">

 <center><table border="<?=$rahmen?>" height="100%" width="100%">
        <tr>
                <td width="10%">
                         <center>
                              <?php

                                For($j=2;($j<=$i) && ($j<=$maxA);$j++){
                                  echo "<img src='thumbnail/muster.jpg' width='100%'  style='border: 0px;' id='bild".$j."' align='middle'><br>";
                                  }
                              ?>
                        </center></td>
                <td width="90%" height="90%">
                        <center>
                        <img src='upload/muster.jpg'   style='border: 0px;' id='bild1' width="99%"  align="middle">
                        </center>
                </td>
        </tr>
</table></center>




</body>