<?php
$eliminati=0;
// inizializzazione delle variabili usate nella pagina
$h=array();
for($i=0;$i<=10;$i++){	   
   for($j=0;$j<=10;$j++){	   
      $h[$i][$j]=1;
   }	  
}



// lettura dei dati provenienti dal form
if(isset($_POST['B'])){
   // leggo tutto l'array text H e lo metto in $h
   for($i=0;$i<=10;$i++)
   {	   
      for($j=0;$j<=10;$j++)
      {	   
         $h[$i][$j]=$_POST['H'][$i][$j];
	  }	 
   }
   // intercetto lo specifico submit B[$i] premuto
   for($i=0;$i<=10;$i++)
{	   
      for($j=0;$j<=10;$j++)
      {	   
         if(isset($_POST['B'][$i][$j]))
         {
		    // cambio lo stato del corrispondente elemento di $t 
	        if($h[$i][$j]==1)
		    {
		  	    $h[$i][$j]=0;
            
		    }	 
         }
      } 		 
   }	

   for($i=0;$i<=10;$i++){	   
      for($j=0;$j<=10;$j++){	   
        if($h[$i][$j]==0){
            $eliminati=$eliminati+1;

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
   // iterazione che crea l'array di submit B
   for($i=0;$i<=10;$i++){	   
      echo "<tr>";
      for($j=0;$j<=10;$j++){	   
         echo "<td style='width:50px;height:50px'>";
	     if($h[$i][$j]==1){		  
            echo "<input type='submit' style='width:50px;height:50px;text-align:center;background-color:red' name='B[".$i."][".$j."]' value=''>";
         } else{
		   echo "&nbsp;"; 

         }		  
         echo "</td>";
	  }	 
      echo "</tr>";
   }

   // iterazione che crea l'array di text H
   for($i=0;$i<=10;$i++)
   {	   
      for($j=0;$j<=10;$j++)
      {	   
         echo "<input type='hidden' name='H[".$i."][".$j."]' value='".$h[$i][$j]."' >";
      }  
   }
   echo "</table>";
    
   echo "<br>";	
   echo "<input type='submit' style='width:60px;text-align:center;' name='R' value='reset'>";

   ?>
      BOTTONI ELIMINATI:<INPUT type='text'  size='3' value='<?php echo $eliminati; ?>' />
</BODY>
</HTML>


