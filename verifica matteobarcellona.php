<?php
$r = 1;
$c = 8;
$r2 = 1;
$c2 = 8;
$somma = 0;
$cont=-1;

if (!isset($valori)) {

    $valori = Array();
    $valori2 = Array();
    $casuali = Array();
    $vett = Array(7,6,5,4,3,2,1,0);

    for ($j=0;$j<$r;$j++) {
        for ($i=0;$i<$c;$i++) {
            $valori[$j][$i] = 1;
            $casuali[$j][$i] = mt_rand(0,1);
        }
    }

    for ($j=0;$j<$r2;$j++) {
        for ($i=0;$i<$c2;$i++) {   
            $valori2[$j][$i] = $vett[$i];
        }
    }
}

if (isset($_POST['B'])) {
    for ($j=0;$j<$r;$j++) {
        for ($i=0;$i<$c;$i++) {
            $valori[$j][$i] = $_POST['H'][$j][$i];
            $casuali[$j][$i] = $_POST['Z'][$j][$i];
            if (isset($_POST['B'][$j][$i])) {

                if ($casuali[$j][$i] > 0) {
                    $casuali[$j][$i]--;
                } elseif ($casuali[$j][$i] < 0) {
                    $casuali[$j][$i]++;
                }

                $valori[$j][$i] = $casuali[$j][$i];

                if ($valori[$j][$i] == 0) {
                    $valori[$j][$i] = 1;
                    $casuali[$j][$i] = mt_rand(0,1);
                }

            }
            $somma=$somma+$casuali[$j][$i];	
        }
    }


}

if (isset($_POST['B2'])) {
    for ($j=0;$j<$r2;$j++) {
        for ($i=0;$i<$c2;$i++) {
            $valori2[$j][$i];
        }
    }
}

?>

<HTML>
   <BODY>

   <FORM name='F1' method='POST' action='<?php echo $_SERVER['PHP_SELF']?>'>
      <?php
      echo "<TABLE border='1'>";
      for ($j=0;$j<$r;$j++) {
         echo "<TR>";
         for ($i=0;$i<$c;$i++) {
            echo "<TD style='width:30px;height:30px;'>";
            echo "<INPUT type='hidden' name='H[".$j."][".$i."]' value='".$valori[$j][$i]."' />";
            echo "<INPUT type='hidden' name='Z[".$j."][".$i."]' value='". $casuali[$j][$i]."' />";
            if ($valori[$j][$i]>0) {
               if ($casuali[$j][$i]>0) {
                  echo "<INPUT type='submit' style='width:30px;height:30px;' name='B[".$j."][".$i."]' value='".$valori2[$j][$i]."' />";
                  echo "<INPUT type='text' style='width:30px;height:30px;' name='B2[".$j."][".$i."]' value='".$casuali[$j][$i]."' />";
               } else {
                  echo "<INPUT type='submit' style='width:30px;height:30px;' name='B[".$j."][".$i."]' value='".$valori2[$j][$i]."' />";
                  echo "<INPUT type='text' style='width:30px;height:30px;' name='B2[".$j."][".$i."]' value='".$casuali[$j][$i]."' />";
               }
            } else {
                echo "<INPUT type='submit' style='width:30px;height:30px;' name='B[".$j."][".$i."]' value='".$casuali[$j][$i]. "' />";
            }
            echo "</TD>";
         }
         echo "</TR>";
      }
      echo "</TABLE>";
      ?>
      
      &nbsp;&nbsp;Somma:<INPUT type='text' name='S' size='4' value='<?php echo $somma; ?>' />      
   </FORM>

   <BR><BR>

</BODY>
</HTML>
