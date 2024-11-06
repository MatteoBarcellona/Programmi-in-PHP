<?php

// righe e colonne della matrice di text
$r=10;
$c=10;

if(isset($_POST['R']))
{
   $valori=null;
   $casuali=null;
   $conta=0;
   $somma=0;
}

if(!isset($valori))
{	
   // viene creata e azzerata 
   // la matrice di appoggio per i valori
   $valori = Array();
   $casuali = Array();
   for($j=0;$j<$r;$j++)
   {
      for($i=0;$i<$c;$i++)
      {
         $valori[$j][$i]=1;
         $casuali[$j][$i]=mt_rand(1,99);
      } 
   }
}


// intercetta se ho premuto uno dei submit
// della matrice B
if(isset($_POST['B']))
{
   
   for($j=0;$j<$r;$j++)
   {
     for($i=0;$i<$c;$i++)
     {
         $valori[$j][$i]=$_POST['H'][$j][$i];
         $casuali[$j][$i]=$_POST['Z'][$j][$i];
              
		 // li percorro tutti per vedere 
		 // qualè l'unico che esiste
		 if(isset($_POST['B'][$j][$i]))
         {
			 
			$conta=$_POST['C']*1;
            $conta++;			
			$somma=$_POST['S']*1;
            $somma=$somma+$casuali[$j][$i];			

		    $valori[$j][$i]=0;
		 }	 
     } 
   }
}
	
	
?>

<HTML>
   <BODY>

   <!-- viene creato il FORM per gestire la matrice di text -->
   <FORM name='F1' method='POST' action='<?php $_SERVER['PHP_SELF']?>'>

      <?php
	  // tabella HTML contenente la matrice di submit
	  echo "<TABLE border='1'>";
      for($j=0;$j<$r;$j++)
	  {
		 echo "<TR>"; 
         for($i=0;$i<$c;$i++)
	     {
		    echo "<TD style='width:30px;height:30px;'>";
  	        echo "<INPUT type='hidden' name='H[".$j."][".$i."]' value='".$valori[$j][$i]."' />";
  	        echo "<INPUT type='hidden' name='Z[".$j."][".$i."]' value='".$casuali[$j][$i]."' />";
            if($valori[$j][$i]==1)
			   echo "<INPUT type='submit' style='width:30px;height:30px;background-color:red;' name='B[".$j."][".$i."]' value='' />";
            else
			   echo $casuali[$j][$i];	
		    echo "</TD>"; 
         }		  
		 echo "</TR>"; 
      }		  
	  echo "</TABLE>";
	  // fine tabella HTML
      ?>
	  
      <BR><INPUT type='submit' name='R' value='reset' />  	  
      &nbsp;&nbsp;Quanti:<INPUT type='text' name='C' size='4' value='<?php echo $conta; ?>' />  	  
      &nbsp;&nbsp;Somma:<INPUT type='text' name='S' size='4' value='<?php echo $somma; ?>' />  	  
   </FORM>

   <BR><BR>

</BODY>
</HTML>
