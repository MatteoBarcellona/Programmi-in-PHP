<?php

function damminome($cod,$t)
{
   $nome="";
   for($i=0;$i<count($t);$i++)
   {
	   if($t[$i]['Codice']==$cod)
	   {
	      $nome=$t[$i]['Denom'];
          $i=count($t);		  
	   }	   
   } 
   return($nome);	
}


$Tipi = array(
           array('Codice'=>"01",'Tipo'=>"A",'Denom'=>'Involtino primavera'),
           array('Codice'=>"02",'Tipo'=>"P",'Denom'=>'Riso al curry'),
           array('Codice'=>"03",'Tipo'=>"S",'Denom'=>'Pollo alle mandorle'),
           array('Codice'=>"04",'Tipo'=>"A",'Denom'=>'Wanton fritti'),
           array('Codice'=>"05",'Tipo'=>"P",'Denom'=>'Riso cantonese'),
           array('Codice'=>"06",'Tipo'=>"S",'Denom'=>'Gamberi con sedano'),
           array('Codice'=>"07",'Tipo'=>"S",'Denom'=>'Maiale in agrodolce'),
           array('Codice'=>"08",'Tipo'=>"A",'Denom'=>'Ravioli brasati'),
           array('Codice'=>"09",'Tipo'=>"P",'Denom'=>'Spaghetti soia verdure')
           );
		   
	  $totale=7.90;	   
      $an="";		   
      $pr="";		   
      $se="";		   
      $chk1="";
      $chk2="";

      if(isset($_POST["B1"]))
      {
          $an=$_POST['AN'];
          $pr=$_POST['PR'];
          $se=$_POST['SE'];
		  
		  if(isset($_POST['C1']))
		  {	  
			  $chk1="checked";
			  $totale = $totale + 0.80;
		  }	  
		  else
		  {	  
			  $chk1="";
		  }	  

		  if(isset($_POST['C2']))
		  {	  
			  $chk2="checked";
			  $totale = $totale + 0.50;
		  }	  
		  else
		  {	  
			  $chk2="";
		  }	  
      }
		   
?>

<HTML>
</BODY>
   
      <?php

	  echo "<h3>menu prezzo fisso 7.90 euro</h3>";
	  
      echo "<FORM NAME='F1' METHOD='post' ACTION='".$_SERVER['PHP_SELF']."'>";

	  echo "<SELECT name='AN'>";
      for($i=0;$i<count($Tipi);$i++)
      {
         if($Tipi[$i]['Tipo']=="A")
	     {		 
            if($an==$Tipi[$i]['Codice'])
               echo "<OPTION value=".$Tipi[$i]['Codice']." SELECTED>".$Tipi[$i]['Denom']."</OPTION>";
	        else		 
               echo "<OPTION value=".$Tipi[$i]['Codice'].">".$Tipi[$i]['Denom']."</OPTION>";
         } 
  	  }
      echo "</SELECT><BR><BR>";

	  echo "<SELECT name='PR'>";
      for($i=0;$i<count($Tipi);$i++)
      {
         if($Tipi[$i]['Tipo']=="P")
	     {		 
            if($pr==$Tipi[$i]['Codice'])
               echo "<OPTION value=".$Tipi[$i]['Codice']." SELECTED>".$Tipi[$i]['Denom']."</OPTION>";
	        else		 
               echo "<OPTION value=".$Tipi[$i]['Codice'].">".$Tipi[$i]['Denom']."</OPTION>";
         } 
  	  }
      echo "</SELECT><BR><BR>";

	  echo "<SELECT name='SE'>";
      for($i=0;$i<count($Tipi);$i++)
      {
         if($Tipi[$i]['Tipo']=="S")
	     {		 
            if($se==$Tipi[$i]['Codice'])
               echo "<OPTION value=".$Tipi[$i]['Codice']." SELECTED>".$Tipi[$i]['Denom']."</OPTION>";
	        else		 
               echo "<OPTION value=".$Tipi[$i]['Codice'].">".$Tipi[$i]['Denom']."</OPTION>";
         } 
  	  }
      echo "</SELECT><BR><BR>";

      echo "<INPUT TYPE='checkbox' NAME='C1' ".$chk1.">Caffè +0.80 euro<br>";
      echo "<INPUT TYPE='checkbox' NAME='C2' ".$chk2.">Acqua mezzo litro +0.50 euro<br>";

      echo "<br><INPUT TYPE='submit' NAME='B1' VALUE='Vedi scelta'>";

      echo "</FORM>";

      if(isset($_POST["B1"]))
      {
          echo "Ho scelto :<br>";
		  echo "antipasto : ".damminome($an,$Tipi)."<br>";
		  echo "primo : ".damminome($pr,$Tipi)."<br>";
		  echo "secondo : ".damminome($se,$Tipi)."<br>";

		  echo "<br><br>totale : ".$totale."<br>";
      }
?>

</BODY>
</HTML>

