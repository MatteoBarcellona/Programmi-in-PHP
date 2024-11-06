<?php
session_start();

// se la rubrica non esiste la crea
if(!isset($_SESSION['rubrica']))
{    
   $_SESSION['rubrica']=array();
}   

$nome="";
$cognome="";
$telefono="";
$e_mail="";

// gestisco l'inserimento di un nuovo elemento
if(isset($_POST['NUOVO']))
{
   $i=count($_SESSION['rubrica']);
   echo "Aggiunto nominativo in rubrica<br>";
   $_SESSION['rubrica'][$i]['nome']=$_POST['NOME'];
   $_SESSION['rubrica'][$i]['cognome']=$_POST['COGNOME'];
   $_SESSION['rubrica'][$i]['telefono']=$_POST['TELEFONO'];
   $_SESSION['rubrica'][$i]['e-mail']=$_POST['E_MAIL'];
}

// gestisco la cancellazione di un elemento in una certa 
// posizione, compattando in seguito la rubrica
if(isset($_POST['CANCELLA']))
{
   for($i=0;$i<count($_SESSION['rubrica']);$i++)
   {
     if(isset($_POST['C'][$i]))
	 {
        $_SESSION['rubrica'][$i]=null;	   
     }		   
   }	   
}

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php

		// form di inserimento dati
        echo "<form name='F1' method='post' action='".$_SERVER['PHP_SELF']."'>";
        echo "<TABLE border='1'>";
        echo "<TR><TD>Nome:</TD><TD><input type='text' name='NOME' size='5' value='".$nome."'></TD></TR>";   
        echo "<TR><TD>Cognome:</TD><TD><input type='text' name='COGNOME' size='5' value='".$cognome."'></TD></TR>";   
        echo "<TR><TD>Telefono:</TD><TD><input type='text' name='TELEFONO' size='5' value='".$telefono."'></TD></TR>";   
        echo "<TR><TD>E-mail:</TD><TD><input type='text' name='E_MAIL' size='5' value='".$e_mail."'></TD></TR>";   
        echo "</TABLE><BR>";
        echo "<input type='submit' name='NUOVO' value='nuovo'><BR><BR>";

        //visualizzazione di tutta la rubrica
	    echo "<TABLE border='1'>";
        for($i=0;$i<count($_SESSION['rubrica']);$i++)
        {
           if(isset($_SESSION['rubrica'][$i]))
	       {
              echo "<TR>";
              echo "<TD>".$i."</TD>";
              echo "<TD>".$_SESSION['rubrica'][$i]['nome']."</TD>";
              echo "<TD>".$_SESSION['rubrica'][$i]['cognome']."</TD>";
              echo "<TD>".$_SESSION['rubrica'][$i]['telefono']."</TD>";
              echo "<TD>".$_SESSION['rubrica'][$i]['e-mail']."</TD>";
              echo "<TD><INPUT type='checkbox' name='C[".$i."]'</TD>";
              echo "</TR>";
		   }	  
        }
        echo "</TABLE><BR>";
        echo "<input type='submit' name='CANCELLA' value='cancella'>";
        echo "</form>";

        ?>

    </body>
</html>
