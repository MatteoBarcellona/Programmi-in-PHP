<?php

   $mysqli = new mysqli("localhost", "root", "", "tennis");
   if ($mysqli->connect_errno) {
      echo "non si connette: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
   }


   $t1=0;
   $t41=0;
   $t42=0;
   
   $queryt="SELECT ID_Giocatori,nome,cognome FROM Giocatori"; 
   if (!$risultatot = $mysqli->query($queryt)) {
       echo $queryt;
   }
   $queryt2="SELECT ID_Giocatori,nome,cognome FROM Giocatori"; 
   if (!$risultatot2 = $mysqli->query($queryt2)) {
       echo $queryt2;
   }

   
   if(isset($_POST['I1']))
   {
     $t1=$_POST['T1'];

$query="";
      
$query=$query."SELECT TBL.cognome, SUM(TBL.set1+TBL.set2+TBL.set3) AS totsetv,";     $query=$query."SUM(TBL.nset1+TBL.nset2+TBL.nset3) AS totsetp FROM (";
$query=$query."SELECT Incontri.ID_Incontri,";
$query=$query."CASE WHEN Incontri.ID_gioc_1=".$t1." THEN t1.cognome ELSE t2.cognome END AS cognome,";
$query=$query."CASE WHEN Incontri.vinc1=".$t1." THEN 1 ELSE 0 END AS set1,";
$query=$query."CASE WHEN Incontri.vinc2=".$t1." THEN 1 ELSE 0 END AS set2,";
$query=$query."CASE WHEN Incontri.vinc3=".$t1." THEN 1 ELSE 0 END AS set3,"; 
$query=$query."CASE WHEN (Incontri.vinc1!=".$t1." AND Incontri.vinc1!=0) THEN 1 ELSE 0 END AS nset1,";
$query=$query."CASE WHEN (Incontri.vinc1!=".$t1." AND Incontri.vinc1!=0) THEN 1 ELSE 0 END AS nset2,";
$query=$query."CASE WHEN (Incontri.vinc1!=".$t1." AND Incontri.vinc1!=0) THEN 1 ELSE 0 END AS nset3 ";
$query=$query."FROM Incontri ";
$query=$query."INNER JOIN Giocatori t1 ON Incontri.ID_gioc_1=t1.ID_giocatori ";
$query=$query."INNER JOIN Giocatori t2 ON Incontri.ID_gioc_2=t2.ID_giocatori ";
$query=$query."WHERE Incontri.ID_gioc_1=".$t1." OR Incontri.ID_gioc_2=".$t1." ) TBL ";
$query=$query."GROUP BY TBL.cognome ";
      
   }
   
   if(isset($_POST['I2']))
   {
      $query="";
      $query=$query."";
   }
   
   if(isset($_POST['I3']))
   {
      $query="";
      $query=$query."";
   }	   
   
   if(isset($_POST['I4']))
   {
   
      $t41=$_POST['T41'];
      $t42=$_POST['T42'];

$query="";
$query=$query."SELECT t1.cognome AS g1,t2.cognome AS g2,";
$query=$query."Incontri.set1_1,Incontri.set1_2,";
$query=$query."Incontri.set2_1,Incontri.set2_2,"; 
$query=$query."Incontri.set3_1,Incontri.set3_2,";
$query=$query."t3.cognome AS g3 "; 
$query=$query."FROM Incontri ";
$query=$query."INNER JOIN Giocatori t1 ON Incontri.ID_gioc_1=t1.ID_giocatori ";
$query=$query."INNER JOIN Giocatori t2 ON Incontri.ID_gioc_2=t2.ID_giocatori ";
$query=$query."INNER JOIN Giocatori t3 ON Incontri.vincente=t3.ID_giocatori ";
$query=$query."WHERE Incontri.ID_gioc_1=".$t41." AND Incontri.ID_gioc_2=".$t42." ";
$query=$query."OR Incontri.ID_gioc_1=".$t42." AND Incontri.ID_gioc_2=".$t41." ";
      
   }	   
?>

<HTML>

<BODY>

   <FORM name='F1' method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>' >

      totale set vinti e set persi di ciascun giocatore&nbsp;&nbsp;&nbsp;
      Giocatore: <SELECT name='T1'>
      <?php
      foreach($risultatot as $Tendina)
      {
          if($Tendina['ID_Giocatori']==$t1) { 
            echo "<OPTION value='".$Tendina['ID_Giocatori']."' SELECTED>".$Tendina['nome']." ".$Tendina['cognome']."</OPTION>";
         } else {
            echo "<OPTION value='".$Tendina['ID_Giocatori']."'>".$Tendina['nome']." ".$Tendina['cognome']."</OPTION>";
         }
      }
      ?>
      </SELECT>
      <INPUT type='submit' name='I1' value='invia'><BR><BR>

     incontri giocati tra due giocatori&nbsp;&nbsp;&nbsp;
      Giocatore1: <SELECT name='T41'>
      <?php
      foreach($risultatot as $Tendina)
      {
          if($Tendina['ID_Giocatori']==$t41) { 
            echo "<OPTION value='".$Tendina['ID_Giocatori']."' SELECTED>".$Tendina['nome']." ".$Tendina['cognome']."</OPTION>";
         } else {
            echo "<OPTION value='".$Tendina['ID_Giocatori']."'>".$Tendina['nome']." ".$Tendina['cognome']."</OPTION>";
         }
      }
      ?>
      </SELECT>
      &nbsp;&nbsp;Giocatore2: <SELECT name='T42'>
      <?php
      foreach($risultatot2 as $Tendina)
      {
          if($Tendina['ID_Giocatori']==$t42) { 
            echo "<OPTION value='".$Tendina['ID_Giocatori']."' SELECTED>".$Tendina['nome']." ".$Tendina['cognome']."</OPTION>";
         } else {
            echo "<OPTION value='".$Tendina['ID_Giocatori']."'>".$Tendina['nome']." ".$Tendina['cognome']."</OPTION>";
         }
      }
      ?>
      </SELECT>
      <INPUT type='submit' name='I4' value='invia'><BR><BR>

   </FORM>

<?php

if(isset($_POST['I1']) || isset($_POST['I2']) || isset($_POST['I3']) || isset($_POST['I4']))
{

   if (!$risultato = $mysqli->query($query)) {
      echo $query;
   }

   echo "<TABLE border='1'>";
   echo "<TR>";
   
   for($i=0;$i<$risultato->field_count;$i++)
   {
      echo "<TD><B>".$risultato->fetch_field_direct($i)->name."</B></TD>";
   }
   echo "</TR>";

   while ($row=$risultato->fetch_row()) 
   {
      echo "<TR>";
      for($i=0;$i<$risultato->field_count;$i++)
      {

         echo "<TD>".$row[$i]."</TD>";

      }
      echo "</TR>";
   }
   echo "</TABLE>";

}
   
?>
   
</BODY>

</HTML>
