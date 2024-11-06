<?php

$Tipi = array(
           array('Codice'=>1,'Denom'=>'Socio'),
           array('Codice'=>2,'Denom'=>'Junior'),
           array('Codice'=>5,'Denom'=>'Amministratore'),
           array('Codice'=>8,'Denom'=>'Maestro'),
           array('Codice'=>11,'Denom'=>'Altro tipo'),
           array('Codice'=>13,'Denom'=>'Altro ancora')
           );
		   
      $bb=0;		   
      if(isset($_POST["B1"]))
      {
          $bb=$_POST['BB'];
      }
		   
?>

<HTML>
</BODY>
   
      <?php

      echo "<FORM NAME='F1' METHOD='post' ACTION='prova_select.php'>";

	  echo "<SELECT name='BB'>";
	  
      for($i=0;$i<count($Tipi);$i++)
      {
         if($bb==$Tipi[$i]['Codice'])
            echo "<OPTION value=".$Tipi[$i]['Codice']." SELECTED>".$Tipi[$i]['Denom']."</OPTION>";
	     else		 
            echo "<OPTION value=".$Tipi[$i]['Codice'].">".$Tipi[$i]['Denom']."</OPTION>";
      }
	  
      echo "</SELECT><BR><BR>";
	  
      echo "<INPUT TYPE='submit' NAME='B1' VALUE='Vedi scelta'>";

      echo "</FORM>";

      if(isset($_POST["B1"]))
      {
          echo "Ho scelto il valore ".$bb;
      }
?>

</BODY>
</HTML>

