<?php

$merce = array();
$merce[0] = "zucchine";
$merce[1] = "carote";
$merce[2] = "pomodori";
$merce[3] = "patate";
$merce[4] = "melanzane";
$merce[5] = "cime di rapa";
$merce[6] = "spinaci";
$merce[7] = "sedano";
$merce[8] = "porri";
$merce[9] = "cipolle";

$scelta = array();
for($i=0;$i<count($merce);$i++)
{
	$scelta[$i]=false;
}

if(isset($_POST['B']))
{
   for($i=0;$i<count($merce);$i++)
   {
      if(isset($_POST['C'][$i]))
      {
		  $scelta[$i]=true;
	  }	  
   }	   
}

?>

<HTML>
</BODY>
   
<?php

echo "<h3>lista della spesa</h3>";
	  
echo "<FORM name='F1' method='post' action='".$_SERVER['PHP_SELF']."'>";

echo "<TABLE border='1'>";
for($i=0;$i<count($merce);$i++)
{
    echo "<TR>";
	echo "<TD>".$merce[$i]."</TD>";
	if($scelta[$i]) 
	   $c=" CHECKED";
    else   
	   $c=" ";
	echo "<TD><INPUT type='checkbox' name='C[".$i."]' ".$c." ></TD>";
    echo "</TR>";
}
echo "</TABLE>";

echo "<BR><INPUT type='submit' name='B' value='invia lista'>";
echo "</FORM>";

if(isset($_POST['B']))
{
   echo "merce scelta : ";
   for($i=0;$i<count($merce);$i++)
   {
      if($scelta[$i])
      {
		  echo $merce[$i].", ";
	  }	  
   }	   
   echo "<BR><BR>";
}

?>

</BODY>
</HTML>

