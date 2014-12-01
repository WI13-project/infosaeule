<?php

                /*$stringposition = strpos($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], "?");
                if(isset($stringposition))   echo $new_string = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                else   echo $new_string = substr($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], 0, $stringposition);

                echo $new_string;
                      */
                include 'config.php';
                //echo $zeile;
                $arr[]=array();
                //Bilder mit getimagesize (siehe check.php) pruefen!
                $files = scandir($ordner);  //Pfad zum View-Ordner ggf. bei änderungen anpassen!
                $files_count = count($files)-2; // Minus zwei wegen "." und ".."
                // echo $files_count;
                if($files_count>$max)  $files_count=$max;                                // setzt filescount auf Anzahl max herab, wenn es mehr Bilder sind als erlaubt;

                if(isset($_GET["zeile"]))
                    if($_GET["zeile"] <$files_count)
                        $zeile=$_GET["zeile"]+1;
                    else
                        $zeile=1;
                else
                        $zeile=1;
                $alledateien = $files;
                foreach ($alledateien as $datei) {
                        $dateiinfo = pathinfo($ordner."/".$datei);
                        $size = ceil(filesize($ordner."/".$datei)/1024);
                        if ($datei != "." && $datei != ".."  && $datei != "_notes" && $dateiinfo['basename'] != "Thumbs.db") {
                            $arr[]=$dateiinfo['dirname']."/".$dateiinfo['basename'];
                    };
                 };
        ?>
<head>
<meta http-equiv="refresh" content="<?php echo $slidetime; ?>;URL=<?php echo './view.php?zeile=',$zeile; ?>">
</head>
<body height="100%">

<table border="1" height="100%" width="100%">
        <tr>
                <td>
                        <center>
                                Nächste News
                        </center>
                </td>
                <td>
                        <center>
                                Newsfenster
                        </center>
                </td>
        </tr>
        <tr  max-height="10%">
                <td height="10%">
                        <?php
                        if($zeile>$max) $zeile=1;
                        $hilfzeile=$zeile;
                        $hilfzeile++;
                        if($hilfzeile>$files_count) $hilfzeile=1;
                        ?><center><img alt="<?php echo $arr;?>" src="<?php echo $arr[$hilfzeile]; ?>" width="100" align="middle"></center>
                </td>
                <td width="90%" rowspan="9" height="90%">
                        <center><img alt="<?php echo $arr;?>" src="<?php echo $arr[$zeile]; ?>" width="90%" align="middle"></center>
                </td>
        </tr>
        <?php
                for($i=1; $i<$files_count-1; $i++) {?>
                        <tr height="10%">
                <td >
                        <?php
                                //Possition für nächste Bilder
                        $hilfzeile++;
                        if($hilfzeile>$files_count) $hilfzeile=1;
                        ?><center><img alt="<?php echo $arr;?>" src="<?php echo $arr[$hilfzeile]; ?>" width="100" align="middle"></center>
                </td>
        </tr>
                <?php }

                        for($i++;$i<$max;$i++){
                ?>
                        <tr max-height="10%">
                                <td ><?php
                                                echo "keine Weiteren Informationen vorhanden!";
                                                //Platzhalter
                                        ?></td>
                        </tr>
                <?php
                        }
                ?>
</table>
</body>
