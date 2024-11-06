<?php

function cerca($codice,$vett) {
   $nome="";
   for($i=0;$i<count($vett);$i++)
   {
	   if($vett[$i]['Codice']==$codice)
	   {
	      $nome=$vett[$i]['Denom'];
	   }	   
   } 
   return($nome);	
}	


$Antipasti = array(
           array('Codice'=>1,'Denom'=>'Involtino Primavera'),
           array('Codice'=>2,'Denom'=>'Wanton Fritti'),
           array('Codice'=>3,'Denom'=>'Ravioli Brasati'),
           );

$Primi = array(
           array('Codice'=>1,'Denom'=>'Riso Al Curry'),
           array('Codice'=>2,'Denom'=>'Riso Cantonese'),
           array('Codice'=>3,'Denom'=>'Spaghetti di Soia e Verdure'),
           array('Codice'=>4,'Denom'=>'Spaghetti di Riso con Gamberi'),
           );

$Secondi = array(
           array('Codice'=>1,'Denom'=>'Pollo con Mandorle'),
           array('Codice'=>2,'Denom'=>'Gamberi con Sedano'),
           array('Codice'=>3,'Denom'=>'Maiale in Agrodolce'),
           );
		   
      $a=0;		   
      $p=0;		   
      $s=0;		   
	  $acqua="";
	  $caffe="";
	  $totale=7.90;
	  
      if(isset($_POST['SCELTA']))
      {
          $a=$_POST['A1'];
          $p=$_POST['P1'];
          $s=$_POST['S1'];
		  
 		  if(isset($_POST['AQ']))
		  {	  
			  $acqua="CHECKED";
			  $totale = $totale + 0.50;
		  }	  
		  else
		  {	  
			  $acqua="";
		  }	  

 		  if(isset($_POST['CA']))
		  {	  
			  $caffe="CHECKED";
			  $totale = $totale + 0.80;
		  }	  
		  else
		  {	  
			  $caffe="";
		  }	  

      }
		   
?>

<HTML>
</BODY>

     <H2>Menu da 7.90 euro</H2>
   
      <?php

      echo "<FORM NAME='F1' METHOD='post' ACTION='ristorante2.php'>";

	  echo "<SELECT name='A1'>";
      for($i=0;$i<count($Antipasti);$i++)
      {
         if($a==$Antipasti[$i]['Codice'])
            echo "<OPTION value=".$Antipasti[$i]['Codice']." SELECTED>".$Antipasti[$i]['Denom']."</OPTION>";
	     else		 
            echo "<OPTION value=".$Antipasti[$i]['Codice'].">".$Antipasti[$i]['Denom']."</OPTION>";
      }
      echo "</SELECT><BR><BR>";

	  echo "<SELECT name='P1'>";
      for($i=0;$i<count($Primi);$i++)
      {
         if($p==$Primi[$i]['Codice'])
            echo "<OPTION value=".$Primi[$i]['Codice']." SELECTED>".$Primi[$i]['Denom']."</OPTION>";
	     else		 
            echo "<OPTION value=".$Primi[$i]['Codice'].">".$Primi[$i]['Denom']."</OPTION>";
      }
      echo "</SELECT><BR><BR>";

	  echo "<SELECT name='S1'>";
      for($i=0;$i<count($Secondi);$i++)
      {
         if($s==$Secondi[$i]['Codice'])
            echo "<OPTION value=".$Secondi[$i]['Codice']." SELECTED>".$Secondi[$i]['Denom']."</OPTION>";
	     else		 
            echo "<OPTION value=".$Secondi[$i]['Codice'].">".$Secondi[$i]['Denom']."</OPTION>";
      }
      echo "</SELECT><BR><BR>";

      echo "<INPUT TYPE='checkbox' NAME='AQ' ".$acqua.">Acqua 1/2 litro +0.50 euro<BR><BR>";

      echo "<INPUT TYPE='checkbox' NAME='CA' ".$caffe.">Caffè +0.80 euro<BR><BR>";
	  
      echo "<INPUT TYPE='submit' NAME='SCELTA' VALUE='Vedi scelta'>";

      echo "</FORM>";

      if(isset($_POST['SCELTA']))
      {
		  echo "Ho scelto<BR>";
		  echo "Antipasto:".cerca($a,$Antipasti)."<BR>";
		  echo "Primo:".cerca($p,$Primi)."<BR>";
		  echo "Secondo:".cerca($s,$Secondi)."<BR>";
 		  if(isset($_POST['AQ']))
		  {
			  echo "Acqua<BR>";
          }			  
 		  if(isset($_POST['CA']))
		  {
			  echo "Caffè<BR>";
          }			  
		  echo "<BR>Totale:".$totale." euro<BR>";
      }

?>

</BODY>
</HTML>

