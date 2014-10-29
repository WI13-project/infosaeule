<?php

class intern{

      /////Übergabe des Dateinamens, damit dieser angezeigt werden kann
      public function file_name($x, $y, $z){    
               if($x == "1"){              //Wenn Kontrollvariable $develope genau auf 1 gesetzt ist
                     if($z == "a"){
                           echo "<b>file:</b>---><span style='color:red; font-weight:bold '> \"" .$y. "\"</span> Anfang<br>";
                     }elseif($z == "e"){
                           echo "<b>file:</b>---><span style='color:red; font-weight:bold '> \"" .$y. "\"</span> Ende<br>";
                     }
               }
      }/////Ende der Methode





	  ///// Anzeige des Arrays $_POST,
      public function post_show($x, $y){    // $x=develope, $y=Array

               if($x== "1"){
                  echo "<b>POST-Variablen:</b><br/>";
                  while(list($key, $value) = each($y)){
                        if($key!= "PHPSESSID"){
                           echo "<span style='color:green'>" .$key. "= " .strip_tags(trim($value)). "</span><br>";
                           echo "</span>";
                        }
                  }
               }
      }/////Ende der Methode





      ///// Anzeige des Arrays $HTTP_GET_VARS:
      function get_show($x, $y){    ///// $x=develope, $y=$HTTP_GET_VARS
               if($x== "1"){
                  echo "<b>GET-Variablen:</b><br/>";
                  while(list($key, $value) = each($y)){
                        if($key!= "PHPSESSID"){
                           echo "<span style='color:#000000'>" .$key. "= " .strip_tags(trim($value)). "</span><br/>";
                           echo "</span>";
                        }
                  }
               }
      }/////Ende der Methode





	  ///// Anzeige eines Arrays $_SESSION
      function session_show($x, $y, $z){    ///// $x=develope, $y=$_SESSION, $z=PHPSESSID
               if($x== "1"){
                   echo "<b>SESSION-Variablen:</b><br/>".
                        "PHPSESSID:" .$z. "</br>";
                        //"Admin:" .$y["sess_admin"]. "</br>";

                      while(list($key, $value) = each($y)){
                            echo "<span style='color:green'>" .$key. "=" .strip_tags(trim($value)). "</span><br/>";
                      }

               }
      }/////Ende der Methode





      ///// Browser-Erkennung für css- Zuordnung
      final function browser($x) {        //$x=$HTTP_USER_AGENT, Array mit allen Browser-Angaben

         if(preg_match("/MSIE \d/", $x)){  //css-Zuordnung zu Browsern
            $browser_css= "extern_msie.css";
            
         }elseif(preg_match("/Mozilla[\/][34]/", $x)){  //Kennung für Netscape
            $browser_css= "extern_ns.css";
            
         }elseif(preg_match("/^Opera[\/]\d/", $x)){     //Für Opera
            $browser_css= "extern_msie.css";
            
         }elseif(preg_match("/Firefox/", $x)){     //Für Firefox
            $browser_css= "extern_ns.css";            
            
         }else{
           
            $browser_css= "extern_msie.css";    //Für alle anderen Browser
         }
           

         return $browser_css;
      }/////Ende der Methode





      ///// Üergabe des sql Strings, wenn Kontrollvariable
      final function develope_sql($x, $y){    // $x=Variable develope, genau auf 1 gesetzt ist
               if($x== "1"){
                     echo "<b>SQL:</b><span style='color:black'>" .$y. "</span><br>";  //Ausgabe des Inhaltes der sql- Variable
               }
      }/////Ende der Methode





		///// Zeigt die ID der HILFE an
      final function help_show($x, $y){    //Anzeige aller Fehler: $x=def_help, $y=ID aus der DB
           if($x== "1"){
				$ausgabe= "<b>HELP ID:</b>" .$y. "<br>";
				echo $ausgabe;
           }			

      }/////Ende der Methode





}//Ende der Klasse
?>
