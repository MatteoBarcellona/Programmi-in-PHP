<?php

// inizializzazione delle variabili usate nella pagina
$h=array();
for($i=0;$i<=7;$i++)
{	   
   $h[$i]=1;
}

// lettura dei dati provenienti dal form
if(isset($_POST['B']))
{
   // leggo tutto l'array text H e lo metto in $h
   for($i=0;$i<=7;$i++)
   {	   
      $h[$i]=$_POST['H'][$i];
   }
   // intercetto lo specifico submit B[$i] premuto
   for($i=0;$i<=7;$i++)
   {	   
      if(isset($_POST['B'][$i]))
      {
		 // cambio lo stato del corrispondente elemento di $t 
	     if($h[$i]==1)
		 {
			 $h[$i]=0;
		 }	 
      }		  
   }	
}	

?>

<HTML>
<BODY>
   
   <?php
   // disegno del form di interfaccia con l'utente 
   echo "<form name='F1' method='post' action='".$_SERVER['PHP_SELF']."'>";    
   echo "<table border='1'>";
   echo "<tr>";
   // iterazione che crea l'array di submit B
   for($i=0;$i<=7;$i++)
   {	   
      echo "<td style='width:30px;'>";
	  if($h[$i]==1)
      {		  
         echo "<input type='submit' style='width:30px;text-align:center;' name='B[".$i."]' value='".$i."'>";
      } 
	  else
      {
		 echo "&nbsp;"; 
      }		  
      echo "</td>";
   }
   echo "</tr>";

   // iterazione che crea l'array di text H
   for($i=0;$i<=7;$i++)
   {	   
      echo "<input type='hidden' name='H[".$i."]' value='".$h[$i]."' >";
   }
   echo "</table>";
    
   echo "<br>";	
   echo "<input type='submit' style='width:60px;text-align:center;' name='R' value='reset'>";
   
   ?>

</BODY>
</HTML>



