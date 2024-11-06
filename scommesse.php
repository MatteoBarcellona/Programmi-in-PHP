<?php
session_start();

function aggiungi($a,$c,$partite)
{
   for($i=0;$i<count($partite);$i++)
   {
	   if(isset($_POST[$a][$i]))
	   {
		 $p=$partite[$i]['n'];  
		 $trovato=false;
         for($k=0;$k<count($_SESSION['giocata']);$k++)
         {
			if($_SESSION['giocata'][$k]['n']==$p)
			    $trovato=true;
	     }		 
		 if($trovato==false)
		 {  
		    $z=count($_SESSION['giocata']);  
            $_SESSION['giocata'][$z]['n']=$partite[$i]['n'];
            $_SESSION['giocata'][$z]['s1']=$partite[$i]['s1'];
            $_SESSION['giocata'][$z]['s2']=$partite[$i]['s2'];
            $_SESSION['giocata'][$z]['rr']=$partite[$i][$a];
            $_SESSION['giocata'][$z]['ri']=$c;
         }   
       }      
   }	   

}

$stile=array();
$stile['gr'] = "background:rgb(150,150,150); color:rgb(255,255,255);";
$stile['pa'] = "background:rgb(0,0,150); color:rgb(255,255,255);";
$stile['r1'] = "background:rgb(000,150,0); color:rgb(255,255,255);";
$stile['rX'] = "background:rgb(150,150,0); color:rgb(255,255,255);";
$stile['r2'] = "background:rgb(150,0,0); color:rgb(255,255,255);";

$partite = array(
   array("n"=>"1","s1"=>"Spal","s2"=>"Pisa","r1"=>"2.60","rX"=>"3.10","r2"=>"2.80"),
   array("n"=>"2","s1"=>"Alessandria","s2"=>"Benevento","r1"=>"3.75","rX"=>"3.35","r2"=>"2.00"),
   array("n"=>"3","s1"=>"Monza","s2"=>"Reggina","r1"=>"1.70","rX"=>"3.60","r2"=>"4.85"),
   array("n"=>"4","s1"=>"Cosenza","s2"=>"Ascoli","r1"=>"2.95","rX"=>"3.10","r2"=>"2.50"),
   array("n"=>"5","s1"=>"Como","s2"=>"Crotone","r1"=>"1.95","rX"=>"3.45","r2"=>"3.90"),
   array("n"=>"6","s1"=>"Brescia","s2"=>"Ternana","r1"=>"2.05","rX"=>"3.35","r2"=>"3.65"),
   array("n"=>"7","s1"=>"Perugia","s2"=>"Pordenone","r1"=>"1.65","rX"=>"3.55","r2"=>"5.50")
);


if(isset($_POST['Reset']))
{
   $_SESSION['giocata'] = null;
}

if(!isset($_SESSION['giocata']))
{
   $_SESSION['giocata'] = array();
}

if(isset($_POST['C']))
{
   for($i=0;$i<count($_SESSION['giocata']);$i++)
   {
	   if(isset($_POST['C'][$i]))
	   {
          for($k=$i;$k<count($_SESSION['giocata'])-1;$k++)
          {
             $_SESSION['giocata'][$k]=$_SESSION['giocata'][$k+1];	   
          }
          array_pop($_SESSION['giocata']);
       }      
   }	   
}

if(isset($_POST['r1']))
{
   aggiungi('r1','1',$partite);	
}
if(isset($_POST['rX']))
{
   aggiungi('rX','X',$partite);	
}
if(isset($_POST['r2']))
{
   aggiungi('r2','2',$partite);	   
}

?>

<HTML>
<BODY>
	
<H1>SCOMMESSE SERIE B</H1>
	
<FORM NAME='F1' METHOD='post' action=' <?php echo $_SERVER['PHP_SELF']; ?> '>

<DIV style='background-color:rgb(220,220,220); position:absolute; width:400px; height:400px; top:50px; left:10px;'>

<?php

echo "<TABLE border='1'>";
echo "<TR style='".$stile['gr']."'>";
echo "<TD colspan='3'>partite</TD><TD style='text-align:center;'>1</TD><TD style='text-align:center;'>X</TD><TD style='text-align:center;'>2</TD>";
echo "</TR>";
for($i=0;$i<count($partite);$i++)
{
   echo "<TR>";

   echo "<TD style='".$stile['pa']."'>".$partite[$i]['n']."</TD>";
   echo "<TD style='width:100px;".$stile['pa']."'>".$partite[$i]['s1']."</TD>";
   echo "<TD style='width:100px;".$stile['pa']."'>".$partite[$i]['s2']."</TD>";
      
   echo "<TD><INPUT type='submit' style='".$stile['r1']."' name='r1[".$i."]' value='".$partite[$i]['r1']."'></TD>";
   echo "<TD><INPUT type='submit' style='".$stile['rX']."' name='rX[".$i."]' value='".$partite[$i]['rX']."'></TD>";
   echo "<TD><INPUT type='submit' style='".$stile['r2']."' name='r2[".$i."]' value='".$partite[$i]['r2']."'></TD>";
  
   echo "</TR>";
}
echo "</TABLE>";

?>

</DIV>	

<DIV style='background-color:rgb(220,220,220); position:absolute; width:400px; height:400px; top:50px; left:440px;'>	

<?php

echo "<TABLE border='1'>";
for($i=0;$i<count($_SESSION['giocata']);$i++)
{
   echo "<TR>";
   echo "<TD style='".$stile['pa']."'>".$_SESSION['giocata'][$i]['n']."</TD>";
   echo "<TD style='width:100px;".$stile['pa']."'>".$_SESSION['giocata'][$i]['s1']."</TD>";
   echo "<TD style='width:100px;".$stile['pa']."'>".$_SESSION['giocata'][$i]['s2']."</TD>";

   $colore=$stile['r'.$_SESSION['giocata'][$i]['ri']];
   echo "<TD style='".$colore."'>".$_SESSION['giocata'][$i]['ri']."</TD>";
   echo "<TD style='".$colore."'>".$_SESSION['giocata'][$i]['rr']."</TD>";

   echo "<TD><INPUT type='submit' style='".$stile['gr']."' name='C[".$i."]' value='Cancella'></TD>";
   echo "</TR>";
}
echo "</TABLE>";

echo "<BR><BR>";
echo "<INPUT type='submit'  style='".$stile['gr']."' name='Reset' value='Reset'>";

?>

</DIV>

</FORM>

</BODY>
</HTML>

