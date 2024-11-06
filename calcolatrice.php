
<?php

// assegnazione dei valori di default
$a=0;
$b=0;
$c=0;

// intercettazione dei pulsanti premuti

// somma
if(isset($_POST['SOMMA']))
{
   $a = $_POST['A']; 
   $b = $_POST['B']; 
   $c = $a + $b; 
}

// differenza
if(isset($_POST['DIFF']))
{
   $a = $_POST['A']; 
   $b = $_POST['B']; 
   $c = $a - $b; 
}

// prodotto
if(isset($_POST['MOLT']))
{
   $a = $_POST['A']; 
   $b = $_POST['B']; 
   $c = $a * $b; 
}

// quoziente
if(isset($_POST['QUOZ']))
{
   $a = $_POST['A']; 
   $b = $_POST['B']; 
   if($b==0)
   {
	  $c="impossibile";  
   }
   else    
   {	   
      $c = $a / $b; 
   }	  
}
?>

<HTML>
   <HEAD>
   
   <STYLE type='text/css'>
   body {
	   background-color:rgb(255,255,200);
   }
   
   .casella {
	   width:100px;
	   height:30px;
	   background-color:rgb(255,255,255);
	   color:rgb(0,0,200);
       font-size:15px;	   
   }	   

   .bottone {
	   width:100px;
	   height:30px;
	   background-color:rgb(0,0,200);
	   color:rgb(255,255,255);
       font-size:15px;	   
   }	   

   label {
	   width:50px;
	   height:30px;
	   color:rgb(0,0,200);
       font-size:15px;	   
   }	   
   </STYLE>
   
   </HEAD>
   <BODY>
      <FORM name='F1' method='post' >
         <LABEL>A:</LABEL><INPUT type='text' class='casella' name='A' size='5' value='<?php echo $a; ?>' />&nbsp;&nbsp;
         <LABEL>B:</LABEL><INPUT type='text' class='casella' name='B' size='5' value='<?php echo $b; ?>' />&nbsp;&nbsp;
         <LABEL>Risultato:</LABEL><INPUT type='text' class='casella' name='C' size='5' value='<?php echo $c; ?>' READONLY />
		 <BR><BR>
         <INPUT type='submit' class='bottone' name='SOMMA' value='somma' />
         <INPUT type='submit' class='bottone' name='DIFF' value='differenza' />
         <INPUT type='submit' class='bottone' name='MOLT' value='prodotto' />
         <INPUT type='submit' class='bottone' name='QUOZ' value='quoziente' />
      </FORM>
   </BODY>
</HTML>

