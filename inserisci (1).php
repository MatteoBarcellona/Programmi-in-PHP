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
   
   $punteggio = [0,1,2,3,4,5,6,7];
      
   $query1="SELECT ID_Giocatori,nome,cognome FROM Giocatori"; 
   if (!$risultato1 = $mysqli->query($query1)) {
       echo $query1;
   }
   $query2="SELECT ID_Giocatori,nome,cognome FROM Giocatori";
   if (!$risultato2 = $mysqli->query($query2)) {
       echo $query2;
   }
   
   if(isset($_POST['I1']))
   {
      $r1=$_POST['R1'];
      $r2=$_POST['R2'];
      $g1=$_POST['G1'];
      $g2=$_POST['G2'];
      $s11=$_POST['S11'];
      $s12=$_POST['S12'];
      $s21=$_POST['S21'];
      $s22=$_POST['S22'];
      $s31=$_POST['S31'];
      $s32=$_POST['S32'];
      
      $v1=0;
      $v2=0;
      $v3=0;
      $v=0;
      
            // punteggio set 1
      if(($s11==6 && $s12<=4)||($s11==7 && $s12==5)||($s11==7 && $s12==6))
      {
        $v1=$g1;
      }
      else 
      {
         if(($s12==6 && $s11<=4)||($s12==7 && $s11==5)||($s12==7 && $s11==6))
         {
            $v1=$g2;
         }
      } 
      
      // punteggio set 2
      if(($s21==6 && $s22<=4)||($s21==7 && $s22==5)||($s21==7 && $s22==6))
      {
        $v2=$g1;
      }
      else 
      {
         if(($s22==6 && $s21<=4)||($s22==7 && $s21==5)||($s22==7 && $s21==6))
         {
            $v2=$g2;
         }
      } 

      // punteggio set 3
      if($v1!=$v2)
      {
         if(($s31==6 && $s32<=4)||($s31==7 && $s32==5)||($s31==7 && $s32==6))
         {
           $v3=$g1;
         }
         else 
         {
            if(($s32==6 && $s31<=4)||($s32==7 && $s31==5)||($s32==7 && $s31==6))
            {
               $v3=$g2;
            }
         } 
      }
      
      // vincitore incontro 
      if($v1==$v2 && $v1==$g1) $v=$g1;
      if($v1==$v2 && $v1==$g2) $v=$g2;
      if($v1!=$v2 && $v1==$v3 && $v1==$g1) $v=$g1;
      if($v1!=$v2 && $v2==$v3 && $v2==$g1) $v=$g1;
      if($v1!=$v2 && $v1==$v3 && $v1==$g2) $v=$g2;
      if($v1!=$v2 && $v2==$v3 && $v2==$g2) $v=$g2;
      
      // eventuale ritiro
      if($r1==true)
      { 
         $v=$g2;
      }
      if($r2==true)
      { 
         $v=$g1;
      }
      
      $queryq="";
      $queryq=$queryq."INSERT INTO Incontri ";
      $queryq=$queryq."(ID_gioc_1,ID_gioc_2,set1_1,set1_2,set2_1,set2_2,set3_1,set3_2,vinc1,vinc2,vinc3,vincente) VALUES ";  
      $queryq=$queryq."(".$g1.",".$g2.",".$s11.",".$s12.",".$s21.",".$s22.",".$s31.",".$s32.",".$v1.",".$v2.",".$v3.",".$v.")";

      if (!$risultatoq = $mysqli->query($queryq)) {
         echo $queryq;
      }   
      
   }
   
   if(isset($_POST['I2']))
   {
      $query="";
      $query=$query."SELECT ID_Incontri,t1.cognome AS g1,t2.cognome AS g2, ";
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
   if(isset($_POST['R']))
   {
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
   }
?>

<HTML>

<BODY>

   <FORM name='F1' method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>' onSubmit='return Test();' >
     
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
      foreach($risultato1 as $Tendina)
      {
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
      <TD><SELECT name='S11'>
      <?php
      for($k=0;$k<count($punteggio);$k++)
      {
         if($k==$s11) { 
            echo "<OPTION value='".$punteggio[$k]."' SELECTED>".$punteggio[$k]."</OPTION>";
         }  else {
            echo "<OPTION value='".$punteggio[$k]."'>".$punteggio[$k]."</OPTION>";
         }
      }
      ?>
      </SELECT></TD>
      <TD><SELECT name='S12'>
      <?php
      for($k=0;$k<count($punteggio);$k++)
      {
         if($k==$s12) { 
            echo "<OPTION value='".$punteggio[$k]."' SELECTED>".$punteggio[$k]."</OPTION>";
         }  else {
            echo "<OPTION value='".$punteggio[$k]."'>".$punteggio[$k]."</OPTION>";
         }
      }
      ?>
      </SELECT></TD>
      </TR>
      <TR>
      <TD>Set 2</TD>
      <TD><SELECT name='S21'>
      <?php
      for($k=0;$k<count($punteggio);$k++)
      {
         if($k==$s21) { 
            echo "<OPTION value='".$punteggio[$k]."' SELECTED>".$punteggio[$k]."</OPTION>";
         }  else {
            echo "<OPTION value='".$punteggio[$k]."'>".$punteggio[$k]."</OPTION>";
         }
      }
      ?>
      </SELECT></TD>
      <TD><SELECT name='S22'>
      <?php
      for($k=0;$k<count($punteggio);$k++)
      {
         if($k==$s22) { 
            echo "<OPTION value='".$punteggio[$k]."' SELECTED>".$punteggio[$k]."</OPTION>";
         }  else {
            echo "<OPTION value='".$punteggio[$k]."'>".$punteggio[$k]."</OPTION>";
         }
      }
      ?>
      </SELECT></TD>
      </TR>
      <TR>
      <TD>Set 3</TD>
      <TD><SELECT name='S31'>
      <?php
      for($k=0;$k<count($punteggio);$k++)
      {
         if($k==$s31) { 
            echo "<OPTION value='".$punteggio[$k]."' SELECTED>".$punteggio[$k]."</OPTION>";
         }  else {
            echo "<OPTION value='".$punteggio[$k]."'>".$punteggio[$k]."</OPTION>";
         }
      }
      ?>
      </SELECT></TD>
      <TD><SELECT name='S32'>
      <?php
      for($k=0;$k<count($punteggio);$k++)
      {
         if($k==$s32) { 
            echo "<OPTION value='".$punteggio[$k]."' SELECTED>".$punteggio[$k]."</OPTION>";
         }  else {
            echo "<OPTION value='".$punteggio[$k]."'>".$punteggio[$k]."</OPTION>";
         }
      }
      ?>
      </SELECT></TD>
      </TR>

      <TR>
      <TD>Ritirato</TD>
      <TD><INPUT type='checkbox' name='R1'></TD>
      <TD><INPUT type='checkbox' name='R2'></TD>
      </TR>

      </TABLE>
      <BR>

      <INPUT type='submit' name='I1' value='invia'>
   </FORM>

   <FORM name='F2' method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>' >
      <INPUT type='submit' name='R' value='reset'><BR><BR>
      <INPUT type='submit' name='I2' value='partite'><BR><BR>
   </FORM>

<?php

if(isset($_POST['I2']))
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


<SCRIPT language='javascript'>
function Test()
{
   
   r1=document.F1.R1.checked;
   r2=document.F1.R2.checked;
   g1=parseInt(document.F1.G1.value);
   g2=parseInt(document.F1.G2.value);
   s11=parseInt(document.F1.S11.value);
   s12=parseInt(document.F1.S12.value);
   s21=parseInt(document.F1.S21.value);
   s22=parseInt(document.F1.S22.value);
   s31=parseInt(document.F1.S31.value);
   s32=parseInt(document.F1.S32.value);
   v1=0;
   v2=0;
   v3=0;
   v=0;

   esito=false;

   // giocatori diversi 
   if(g1!=g2)
   {
      esito=true;
      
      // punteggio set 1
      if((s11==6 && s12<=4)||(s11==7 && s12==5)||(s11==7 && s12==6))
      {
        v1=g1;
      }
      else 
      {
         if((s12==6 && s11<=4)||(s12==7 && s11==5)||(s12==7 && s11==6))
         {
            v1=g2;
         }
         else
         {
            esito=false;
         }
      } 
      
      // punteggio set 2
      if((s21==6 && s22<=4)||(s21==7 && s22==5)||(s21==7 && s22==6))
      {
        v2=g1;
      }
      else 
      {
         if((s22==6 && s21<=4)||(s22==7 && s21==5)||(s22==7 && s21==6))
         {
            v2=g2;
         }
         else
         {
            esito=false;
         }
      } 

      // punteggio set 3
      if(v1!=v2)
      {
         if((s31==6 && s32<=4)||(s31==7 && s32==5)||(s31==7 && s32==6))
         {
           v3=g1;
         }
         else 
         {
            if((s32==6 && s31<=4)||(s32==7 && s31==5)||(s32==7 && s31==6))
            {
               v3=g2;
            }
            else
            {
               esito=false;
            }
         } 
      }
         
      // vincitore incontro 
      if(v1==v2 && v1==g1) v=g1;
      if(v1==v2 && v1==g2) v=g2;
      if(v1!=v2 && v1==v3 && v1==g1) v=g1;
      if(v1!=v2 && v2==v3 && v2==g1) v=g1;
      if(v1!=v2 && v1==v3 && v1==g2) v=g2;
      if(v1!=v2 && v2==v3 && v2==g2) v=g2;
      
      // eventuale ritiro
      if(r1==true)
      { 
         v=g2;
         esito=true;
      }
      if(r2==true)
      { 
         v=g1;
         esito=true;
      }
      if(r1==true && r2==true)
      { 
         v1=0;
         v2=0;
         v3=0;
         v=0;
         esito=false;
      }   
         
   }

   retu = esito;
   
   esito = esito+"\n"+g1+" "+g2+"\n";
   esito = esito+s11+"-"+s12+" "+v1+"\n";
   esito = esito+s21+"-"+s22+" "+v2+"\n";
   esito = esito+s31+"-"+s32+" "+v3+"\n";
   esito = esito+v+"\n";
   alert(esito);

return(retu);
}
</SCRIPT>

