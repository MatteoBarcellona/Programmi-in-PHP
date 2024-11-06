<?php
session_start(); 
function aggiungi($a,$c,$partite){
   for($i=0;$i<count($partite);$i++){
	   if(isset($_POST[$a][$i])){
		 $p=$partite[$i]['n_maglia'];  
		 $trovato=false;
       
         for($k=0;$k<count($_SESSION['giocata']);$k++){
			if($_SESSION['giocata'][$k]['n_maglia']==$p)
			    $trovato=true;
	     }		 
        
		 if($trovato==false){  
		    $z=count($_SESSION['giocata']);  
            $_SESSION['giocata'][$z]['n_maglia']=$partite[$i]['n_maglia'];
            $_SESSION['giocata'][$z]['nome']=$partite[$i]['nome'];
            $_SESSION['giocata'][$z]['cognome']=$partite[$i]['cognome'];
            $_SESSION['giocata'][$z]['rr']=$partite[$i][$a];
            $_SESSION['giocata'][$z]['ri']=$c;
         }   
       }      
   }	   
}

$stile=array();
$stile['gr'] = "background:rgb(150,150,150); color:rgb(255,255,255);";
$stile['pa'] = "background:blue; color:rgb(255,255,255);";
$stile['r1'] = "background:rgb(000,150,0); color:rgb(255,255,255);";
$stile['rX'] = "background:orange; color:rgb(255,255,255);";
$stile['rX2'] = "background:gold; color:rgb(255,255,255);";
$stile['r2'] = "background:red; color:rgb(255,255,255);";

$partite = array(
   array("n_maglia"=>"91","nome"=>"Duvan","cognome"=>"Zapata","r1"=>"Torino","rX"=>"attaccante"),
   array("n_maglia"=>"16","nome"=>"Mike","cognome"=>"Maignan","r1"=>"Milan","rX"=>"portiere"),
   array("n_maglia"=>"22","nome"=>"Giovanni","cognome"=>"i Lorenzo","r1"=>"Napoli","rX"=>"difensore"),
   array("n_maglia"=>"9","nome"=>"Vicotr","cognome"=>"Osimhen","r1"=>"Napoli","rX"=>"attaccante"),
   array("n_maglia"=>"5","nome"=>"Giacomo","cognome"=>"Bonaventura","r1"=>"Fiorentina","rX"=>"centrocampista"),
   array("n_maglia"=>"4","nome"=>"Alessandro","cognome"=>"Buongiorno","r1"=>"Torino","rX"=>"difensore"),
   array("n_maglia"=>"14","nome"=>"Tijjiani","cognome"=>"Reijnders","r1"=>"Milan","rX"=>"centrocampista"),
   array("n_maglia"=>"1","nome"=>"Pietro","cognome"=>"Terracciano","r1"=>"Fiorentina","rX"=>"portiere")
);


if(isset($_POST['Reset'])){
   $_SESSION['giocata'] = null;
}

if(!isset($_SESSION['giocata'])){
   $_SESSION['giocata'] = array();
}

if(isset($_POST['C'])){
   for($i=0;$i<count($_SESSION['giocata']);$i++){
	   if(isset($_POST['C'][$i])){
          for($k=$i;$k<count($_SESSION['giocata'])-1;$k++){
             $_SESSION['giocata'][$k]=$_SESSION['giocata'][$k+1];	   
          }
          array_pop($_SESSION['giocata']);
       }      
   }	   
}

if(isset($_POST['r1'])){
   aggiungi('r1','1',$partite);	
}
if(isset($_POST['rX'])){
   aggiungi('rX','X',$partite);	
}

?>

<HTML>
<BODY>
	
<H1>SQUADRA DI CALCIO</H1>
	
<FORM NAME='F1' METHOD='post' action=' <?php echo $_SERVER['PHP_SELF']; ?> '>
<DIV style='background-color:rgb(220,220,220); position:absolute; width:400px; height:400px; top:50px; left:10px;'>
<?php

echo "<TABLE border='1'>";
echo "<TR style='".$stile['gr']."'>";
echo "<TD colspan='3'>Giocatori</TD><TD style='text-align:center;'>squadra</TD><TD style='text-align:center;'>ruolo</TD>";

echo "</TR>";

for($i=0;$i<count($partite);$i++){
   echo "<TR>";
   echo "<TD style='".$stile['pa']."'>".$partite[$i]['n_maglia']."</TD>";
   echo "<TD style='width:100px;".$stile['pa']."'>".$partite[$i]['nome']."</TD>";
   echo "<TD style='width:100px;".$stile['pa']."'>".$partite[$i]['cognome']."</TD>";
   echo "<TD style='width:100px;".$stile['r1']."'>".$partite[$i]['r1']."</TD>";
   echo "<TD style='width:100px;".$stile['rX']."'>".$partite[$i]['rX']."</TD>";
   echo "</TR>";
   
}

echo "</TABLE>";

?>

</DIV>	




</FORM>

</BODY>
</HTML>