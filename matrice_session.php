<?php
session_start();

// righe e colonne della matrice di text
$r=4;
$c=5;

if(isset($_POST['R']))
{
   $_SESSION['valori'] = null;
}
	
// viene creata e azzerata 
// la matrice di appoggio per i valori
if(!isset($_SESSION['valori']))
{
   $_SESSION['valori'] = Array();
   for($j=0;$j<$r;$j++)
   {
      for($i=0;$i<$c;$i++)
      {
         $_SESSION['valori'][$j][$i]=0;
      } 
   }
}

if(isset($_POST['B']))
{	
   for($j=0;$j<$r;$j++)
   {
      for($i=0;$i<$c;$i++)
      {
         if(isset($_POST['B'][$j][$i]))
         { 	
            $_SESSION['valori'][$j][$i]=1;
		 }
      } 
   }
}

?>

<HTML>
   <BODY>

   <!-- viene creato il FORM per gestire la matrice di text -->
   <FORM name='F1' method='POST' action='matrice_session.php'>

      <?php
	  // tabella HTML contenente la matrice di text
	  echo "<TABLE border='1'>";
      for($j=0;$j<$r;$j++)
	  {
		 echo "<TR>"; 
         for($i=0;$i<$c;$i++)
	     {
		    echo "<TD>";
			if($_SESSION['valori'][$j][$i]==0)
               echo "<INPUT type='submit' style='background-color:red;' name='B[".$j."][".$i."]' value='' />";
            else
			   echo "&nbsp;&nbsp;";	
		    echo "</TD>"; 
         }		  
		 echo "</TR>"; 
      }		  
	  echo "</TABLE>";
	  // fine tabella HTML
      ?>
	  
	  <BR>
      <INPUT type='submit' name='R'  value='reset'/>
   </FORM>


</BODY>
</HTML>
