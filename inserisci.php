<?php

   $mysqli = new mysqli("localhost", "root", "", "tennis");
   if ($mysqli->connect_errno) {
      echo "non si connette: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
   }

   $g1=0;
   $g2=0;
   $s11=0;
   $s12=0;
   $s21=0;
   $s22=0;
   $s31=0;
   $s32=0;
   $v1=0;
   $v2=0;
   $v3=0;
   $v=0;
   
   $query1="SELECT ID_Giocatori,nome,cognome FROM Giocatori"; 
   if (!$risultato1 = $mysqli->query($query1)) {
       echo $query1;
   }
   $query2="SELECT ID_Giocatori,nome,cognome FROM Giocatori";
   if (!$risultato2 = $mysqli->query($query2)) {
       echo $query2;
   }
   
   if(isset($_POST['I1'])){
      $g1=$_POST['G1'];
      $g2=$_POST['G2'];
      $s11=$_POST['S11'];
      $s12=$_POST['S12'];
      $s21=$_POST['S21'];
      $s32=$_POST['S22'];
      $s31=$_POST['S31'];
      $s32=$_POST['S32'];
      
      $v1=0;
      $v2=0;
      $v3=0;
      $v=0;

      $query="";
      $query=$query."INSERT INTO Giocatori ";
      $query=$query."(ID_gioc1,ID_gioc2,set1_1,set1_2,set2_1,set2_2,set3_1,set3_2,vinc1,vinc2,vinc3,vincente) VALUES ";  
      $query=$query."(".$g1.",".$g2.",".$s11.",".$s12.",".$s21.",".$s22.",".$s31.",".$s32.",".$v1.",".$v2.",".$v3.",".$v.")";
      
   }
   
   if(isset($_POST['I2']))
   {
      $query="";
      $query=$query."SELECT t1.cognome AS g1,t2.cognome AS g2, ";
      $query=$query."Incontri.set1_1,Incontri.set1_2, ";
      $query=$query."Incontri.set2_1,Incontri.set2_2, ";
      $query=$query."Incontri.set3_1,Incontri.set3_2, ";
      $query=$query."t3.cognome AS g3 "; 
      $query=$query."FROM Incontri ";
      $query=$query."INNER JOIN Giocatori t1 ON Incontri.ID_gioc_1=t1.ID_giocatori ";
      $query=$query."INNER JOIN Giocatori t2 ON Incontri.ID_gioc_2=t2.ID_giocatori ";
      $query=$query."INNER JOIN Giocatori t3 ON Incontri.vincente=t3.ID_giocatori ";

      $query=$query."";
 
      if (!$risultato = $mysqli->query($query)) {
         echo $query;
      }
   
   }
?>

<HTML>
<h1>Eserzizio 4 </h1>
<BODY>


   <FORM name='F1' method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>' onSubmit='test();' >
     
      <TABLE border='1'>
      <TR>
      <TD>Nuova Partita</TD>
      <TD>
      <SELECT name='G1'>
      <?php
      foreach($risultato1 as $Tendina)
      {
         if($Tendina['ID_Giocatori']==$g1) { 
            echo "<OPTION value='".$Tendina['ID_Giocatori']."' SELECTED>".$Tendina['nome']." ".$Tendina['cognome']."</OPTION>";
         }  else {
            echo "<OPTION value='".$Tendina['ID_Giocatori']."'>".$Tendina['nome']." ".$Tendina['cognome']."</OPTION>";
         }
      }
      ?>
      </SELECT>
      </TD><TD>
      <SELECT name='G2'>
      <?php
      foreach($risultato1 as $Tendina){
         if($Tendina['ID_Giocatori']==$g2) { 
            echo "<OPTION value='".$Tendina['ID_Giocatori']."' SELECTED>".$Tendina['nome']." ".$Tendina['cognome']."</OPTION>";
         }  else {
            echo "<OPTION value='".$Tendina['ID_Giocatori']."'>".$Tendina['nome']." ".$Tendina['cognome']."</OPTION>";
         }
      }

      ?>
      </SELECT>
      </TD>
      </TR>

      <TR>
      <TD>Set 1</TD>
      <TD><INPUT type='text' name='S11' value='0' size='3'></TD>
      <TD><INPUT type='text' name='S12' value='0' size='3'></TD>
      </TR>
      <TR>
      <TD>Set 2</TD>
      <TD><INPUT type='text' name='S21' value='0' size='3'></TD>
      <TD><INPUT type='text' name='S22' value='0' size='3'></TD>
      </TR>
      <TR>
      <TD>Set 3</TD>
      <TD><INPUT type='text' name='S31' value='0' size='3'></TD>
      <TD><INPUT type='text' name='S32' value='0' size='3'></TD>
      </TR>

      </TABLE>
      <BR>

      <INPUT type='submit' name='I1' value='invia'><BR><BR>

      <INPUT type='submit' name='I2' value='partite'><BR><BR>
   </FORM>

<?php

if(isset($_POST['I2'])){

   if (!$risultato = $mysqli->query($query)) {
      echo $query;
   }

   echo "<TABLE border='1'>";
   echo "<TR>";
   
   for($i=0;$i<$risultato->field_count;$i++){
      echo "<TD><B>".$risultato->fetch_field_direct($i)->name."</B></TD>";
   }
   echo "</TR>";
   while ($row=$risultato->fetch_row()) {
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


<SCRIPT language='JavaScript'>

function test(){
esito=true;
alert(esito);
return(esito);
}

</SCRIPT>

