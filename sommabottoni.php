<?php

$r=10;
$c=10;
$ri=-1;
$ci=-1;
$rs=0;
$cs=0;

$vett=array();
for($j=0;$j<$r;$j++)
{
   for($i=0;$i<$c;$i++)
   {
     $t=0;
     $vett[$j][$i]=$t;
   }	   
}

if(isset($_POST['B']))
{
   for($j=0;$j<$r;$j++)
   {
      for($i=0;$i<$c;$i++)
      {
         $t=mt_rand(1,99);
         $vett[$j][$i]=$t;
      }	   
   }
}

if(isset($_POST['V']))
{
   for($j=0;$j<$r;$j++)
   {
      for($i=0;$i<$c;$i++)
      {
		 $vett[$j][$i]=$_POST['H'][$j][$i]; 
         if(isset($_POST['V'][$j][$i]))
         {
			 $ri=$j;
             $ci=$i;
		 }	 
      }	   
   }
   
   for($i=0;$i<$c;$i++)
   {
	  $rs=$rs+$vett[$ri][$i];
   }   
   for($j=0;$j<$r;$j++)
   {
	  $cs=$cs+$vett[$j][$ci];
   }   
}

?>

<HTML>
   <BODY>

   <FORM name='F1' method='POST' action='sommabottoni.php'>
      <INPUT type='submit' name='B' value='rigenera'/>&nbsp;&nbsp;&nbsp;
      somma r:<INPUT type='text' name='RS' size='3' value='<?php echo $rs; ?>' />
      somma c:<INPUT type='text' name='CS' size='3' value='<?php echo $cs; ?>' />

   <BR><BR>
   <TABLE border='1'>
   <?php
      for($j=0;$j<$r;$j++)
      {
         echo "<TR>";
         for($i=0;$i<$c;$i++)
         {
  		    echo "<INPUT type='hidden' name='H[".$j."][".$i."]' value='".$vett[$j][$i]."'>";

			//echo $vett[$j][$i];
			if($j==$ri && $i==$ci)
		    {		
               echo "<TD width='50px' align='center' style='background-color:red;color:white;'>";
			   echo "<INPUT type='submit' style='width:50px;background-color:red;color:white;' name='V[".$j."][".$i."]' value='".$vett[$j][$i]."' readonly size='3'>";
			   echo "</TD>";
			}
            else
            {
			   if($j==$ri) {		
                  echo "<TD width='50px' style='background-color:pink;color:black;' align='center'>";
  	              echo "<INPUT type='submit' style='width:50px;background-color:pink;color:black;' name='V[".$j."][".$i."]' value='".$vett[$j][$i]."' readonly size='3'>";
			      echo "</TD>";
			   }
			   else {
				   if ($i==$ci) {
                      echo "<TD width='50px' style='background-color:yellow;color:black;' align='center'>";
  	                  echo "<INPUT type='submit' style='width:50px;background-color:yellow;color:black;' name='V[".$j."][".$i."]' value='".$vett[$j][$i]."' readonly size='3'>";
			          echo "</TD>";
				   }
                   else {
                      echo "<TD width='50px' align='center'>";
			          echo "<INPUT type='submit' style='width:50px;' name='V[".$j."][".$i."]' value='".$vett[$j][$i]."' readonly size='3'>";
			          echo "</TD>";
                   }					   
			   }	   
			}				
         }
         echo "</TR>";
      }
   ?>
   </TABLE>
   </FORM>

</BODY>
</HTML>
