<?php
session_start();

// righe e colonne della matrice di text
$r=7;
$c=2;

if(isset($_POST['R']))
{
   $_SESSION['valori']=null;
}

if(isset($_POST['C']) || isset($_POST['A']))
{
   if(isset($_POST['C']))
   {	   
        $_SESSION['valori'][$_SESSION['posx']][$_SESSION['posy']]=1;
        $_SESSION['passeggeri'][$_SESSION['posx']][$_SESSION['posy']]=$_POST['I'];
   }	   
   if(isset($_POST['A']))
   {	   
        $_SESSION['valori'][$_SESSION['posx']][$_SESSION['posy']]=0;
        $_SESSION['passeggeri'][$_SESSION['posx']][$_SESSION['posy']]="";
   }
   $_SESSION['posx']=-1;
   $_SESSION['posy']=-1;
}

if(!isset($_SESSION['valori']))
{	
   // viene creata e azzerata 
   // la matrice di appoggio per i valori
   $_SESSION['valori'] = Array();
   $_SESSION['passeggeri'] = Array();
   $_SESSION['posx']=-1;
   $_SESSION['posy']=-1;

   
   for($j=0;$j<$r;$j++)
   {
      for($i=0;$i<$c;$i++)
      {
        $_SESSION['valori'][$j][$i]=0;
        $_SESSION['passeggeri'][$j][$i]="";
      } 
   }
}

// intercetta se ho premuto uno dei submit
// della matrice B
if(isset($_POST['B']))
{
   for($j=0;$j<$r;$j++)
   {
     for($i=0;$i<$c;$i++)
     {
		 // li percorro tutti per vedere 
		 // quale l'unico che esiste
		 if(isset($_POST['B'][$j][$i]))
         {
			 if($_SESSION['valori'][$j][$i]==0)
			 { 	 
			    $_SESSION['valori'][$j][$i]=1;
				$_SESSION['posx']=$j;
                $_SESSION['posy']=$i;
		     }	 
		     else
             {
			    $_SESSION['valori'][$j][$i]=0;
				$_SESSION['passeggeri'][$j][$i]="";
				$_SESSION['posx']=-1;
                $_SESSION['posy']=-1;
		     }		
		 }	 
     } 
   }
}
	
?>

<HTML>

   <HEAD> 
   <STYLE type='text/css'>
   .button_green {
      background-color:rgb(0,200,0);
      color:rgb(255,255,255);
      width:160px;	  
      height:30px;	  
   }
   .button_red {
      background-color:rgb(200,0,0);
      color:rgb(255,255,255);
      width:160px;	  
      height:30px;	  
   }
   #inserisci {
      background-color:rgb(200,200,255);
      color:rgb(0,0,0);
	  width:200px;	  
      height:200px;
	  position:absolute;
	  top:10px;
	  left:400px;
	  padding: 5px 5px 5px 5px;
   }	   
   </STYLE>
   </HEAD> 

   <BODY>

   <!-- viene creato il FORM per gestire la matrice di text -->
   <FORM name='F1' method='POST' action='aereo.php'>

      <?php
	  // tabella HTML contenente la matrice di submit
	  $importo=0;
	  echo "<TABLE border='1'>";
      for($j=0;$j<$r;$j++)
	  {
		 echo "<TR>"; 
         for($i=0;$i<$c;$i++)
	     {
		    echo "<TD>";
            if($_SESSION['valori'][$j][$i]==0)
		    {		
			   echo "<INPUT type='submit' class='button_green' name='B[".$j."][".$i."]' value='' />";
            } 
            else
		    {		
			   echo "<INPUT type='submit' class='button_red' name='B[".$j."][".$i."]' value='".$_SESSION['passeggeri'][$j][$i]."' />";
               $importo=$importo+50;
			   if($j<2) $importo=$importo+20;
            }
		    echo "</TD>"; 
         }		  
		 echo "</TR>"; 
      }		  
	  echo "</TABLE>";
	  // fine tabella HTML
      ?>
	  
      <BR><INPUT type='submit' name='R' value='reset' />
      &nbsp;&nbsp;Occupati:<B><?php echo $importo; ?></B> 	  

   <!-- viene creato il FORM per gestire l'input -->
   <?php
   if($_SESSION['posx']!=-1 && $_SESSION['posy']!=-1)
   {	   
      echo "<DIV id='inserisci'";
	  echo "Passeggero:<BR><INPUT type='text' name='I' value='' size='6'/><BR><BR>";
	  echo "<INPUT type='submit' name='C' value='Conferma' />&nbsp;";
	  echo "<INPUT type='submit' name='A' value='Annulla' />";
      echo "</DIV>";
   }
   ?>

   </FORM>

   <BR><BR>
   
</BODY>
</HTML>
