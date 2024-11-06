<?php

$giocatori = array(
array("nome"=>"Marco","vincita"=>10,"importo"=>0),
array("nome"=>"Franco","vincita"=>20,"importo"=>0),
array("nome"=>"Giorgio","vincita"=>34,"importo"=>0),
array("nome"=>"Piero","vincita"=>4,"importo"=>0,"altro"=>"ecco"),
array("nome"=>"Gianni","vincita"=>13,"importo"=>0)
);

$giocatori[6]['nome']="Arturo";
$giocatori[6]['vincita']=18;
$giocatori[6]['importo']=0;
?>

<HTML>
<BODY>

<?php
echo "<table border='1'>";
//for($i=0;$i<count($giocatori);$i++)
for($i=0;$i<=6;$i++)
{
   if(isset($giocatori[$i]))
   {	   
      echo "<tr>";	
      echo "<td>".$giocatori[$i]['nome']."</td>";
      echo "<td>".$giocatori[$i]['vincita']."</td>";
      echo "<td>".$giocatori[$i]['importo']."</td>";
	  
      if(isset($giocatori[$i]['altro']))
      {	   
          echo "<td>".$giocatori[$i]['altro']."</td>";
      }
	  else 
      {	   
          echo "<td bgcolor='yellow'>&nbsp;</td>";
      }
	  
      echo "</tr>";
   }
   else
   {
      echo "<tr>";	
      echo "<td bgcolor='yellow'>mancante</td>";
      echo "<td bgcolor='yellow'>&nbsp;</td>";
      echo "<td bgcolor='yellow'>&nbsp;</td>";
      echo "<td bgcolor='yellow'>&nbsp;</td>";
      echo "</tr>";
   }	   
}	
echo "</table>";
?>

</BODY>
</HTML>

