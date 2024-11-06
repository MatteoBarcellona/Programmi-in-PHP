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

$mercep = array();
$mercep[0] = 10;
$mercep[1] = 10;
$mercep[2] = 10;
$mercep[3] = 60;
$mercep[4] = 50;
$mercep[5] = 30;
$mercep[6] = 20;
$mercep[7] = 10;
$mercep[8] = 10;
$mercep[9] = 16;


$scelta = array();
for($i=0;$i<count($merce);$i++){
	$scelta[$i]=false;
}
for($i2=0;$i2<count($mercep);$i2++){
	$scelta[$i2]=false;
}

if(isset($_POST['B'])){

for($i=0;$i<count($merce);$i++){
      if(isset($_POST['C'][$i])){
		  $scelta[$i]=true;
	  }	  
}	   

for($i2=0;$i2<count($mercep);$i2++){
      if(isset($_POST['C'][$i])){
		  $scelta[$i2]=true;
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
for($i=0;$i<count($merce);$i++){
   echo "<TR>";
	echo "<TD>".$merce[$i]."</TD>";
   echo "<TD>".$mercep[$i]."</TD>";
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

if(isset($_POST['B'])){
   echo "merce scelta : ";

   for($i=0;$i<count($merce);$i++){
      if($scelta[$i]){
		  echo $merce[$i].", ";
	  }	  
   }	   

   echo "prezzo totale: ";

   for($i2=0;$i2<count($mercep);$i2++){
      $somma=0;
      if($scelta[$i2]){
         $somma+=$mercep[$i2];
	  }	  
   }
   echo $somma;

}

?>

</BODY>
</HTML>