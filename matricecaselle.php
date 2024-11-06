<?php
$r=4;
$c=5;

$vett=array();
if(isset($_POST['R'])) {
   for($j=0;$j<$r;$j++)
   {
      for($i=0;$i<$c;$i++)
      {
		 $vett[$j][$i]=0; 
      }          
   }
}

if(isset($_POST['G'])) {
   for($j=0;$j<$r;$j++)
   {
      for($i=0;$i<$c;$i++)
      {
		 $vett[$j][$i]=mt_rand(1,99); 
      }          
   }
}

$sommatutto=0;
if(isset($_POST['S'])) 
{
   for($j=0;$j<$r;$j++)
   {
      for($i=0;$i<$c;$i++)
      {
         $z=(int)$_POST['C'][$j][$i];
		 $vett[$j][$i]=$z; 
		 $sommatutto=$sommatutto+$z;
      }          
   }
}   
?>

<HTML>
   <BODY>

   <FORM name='F1' method='POST' action='matricecaselle.php'>
   <TABLE border='1'>
   <?php
      for($j=0;$j<$r;$j++)
      {
         echo "<TR>";
         for($i=0;$i<$c;$i++)
         {
            echo "<TD width='50px' align='center'>";
			echo "<INPUT type='text' name='C[".$j."][".$i."]' value='".$vett[$j][$i]."' size='4'>";
			echo "</TD>";
         }
         echo "</TR>";
      }
   ?>
   </TABLE>

   <BR><BR>
   <INPUT type='submit' name='R' value='reset'>
   <INPUT type='submit' name='G' value='genera'>
   <INPUT type='submit' name='S' value='somma'>
   <INPUT type='text' name='T' value='<?php echo $sommatutto; ?>' size='4'>
   </FORM>

</BODY>
</HTML>
