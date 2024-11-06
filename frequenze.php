<?php

$r=0;
$c=0;

$colore=array();	  
$colore[2]="rgb(100,0,0)";
$colore[3]="rgb(0,100,0)";
$colore[4]="rgb(0,0,100)";
$colore[5]="rgb(100,100,0)";
$colore[6]="rgb(0,100,100)";
$colore[7]="rgb(100,0,100)";
$colore[8]="rgb(0,0,0)";
$colore[9]="rgb(100,100,100)";
$colore[10]="rgb(200,0,100)";
$colore[11]="rgb(100,0,200)";
$colore[12]="rgb(0,100,200)";

if(isset($_POST['B']))
{
   $r=$_POST['R'];
   $c=$_POST['C'];

   $frequenze=array();
   for($k=2;$k<=12;$k++)
   {
      $frequenze[$k]=0;	   
   }

   $vett=array();
   for($j=0;$j<$r;$j++)
   {
      for($i=0;$i<$c;$i++)
      {
        $t=mt_rand(1,6)+mt_rand(1,6);
        $vett[$j][$i]=$t;
        $frequenze[$t]++;		
      }	   
   }

}

?>

<HTML>
   <BODY>

   <FORM name='F1' method='POST' action='frequenze.php'>
      <INPUT type='text' name='R' size='3' value='<?php echo $r; ?>' />
      <INPUT type='text' name='C'  size='3' value='<?php echo $c; ?>' />
      <INPUT type='submit' name='B'  value='matrice'/>
   </FORM>

   <BR><BR><BR>
   <TABLE border='1'>
   <?php
      for($j=0;$j<$r;$j++)
      {
         echo "<TR>";
         for($i=0;$i<$c;$i++)
         {
			$z=$vett[$j][$i];
            echo "<TD width='50px' align='center' style='background-color:".$colore[$z].";color:white;'>&nbsp;".$z."&nbsp;</TD>";
         }
         echo "</TR>";
      }
   ?>
   </TABLE>

   <BR><BR>
   <TABLE border='1'>
   <?php
   echo "<TR>";
   for($k=2;$k<=12;$k++)
   {
      echo "<TD width='50px' align='center' style='background-color:".$colore[$k].";color:white;'>&nbsp;".$k."&nbsp;</TD>";
   }
   echo "</TR>";
   echo "<TR>";
   for($k=2;$k<=12;$k++)
   {
      echo "<TD width='50px' align='center'>&nbsp;".$frequenze[$k]."&nbsp;</TD>";
   }
   echo "</TR>";
   ?>
   </TABLE>

</BODY>
</HTML>
