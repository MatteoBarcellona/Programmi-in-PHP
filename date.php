<?php

echo "<html>";
echo "<body>";

echo "<h2>ESEMPI SU DATE IN PHP</h2>";

echo "<b>Timestamp delle ore 0:00:00 del primo gennaio 2001</b><br>";
echo mktime(0, 0, 0, 1, 1, 2001);
echo "<br><br>";

echo "<b>Questa istruzione stampa la data corrente nel formato gg/mm/aaaa</b><br>";
echo "Data di oggi " . date("d/m/Y");
echo "<br><br>";

echo "<b>Come sopra ma senza lo zero prima di giorni e/o mesi di una sola cifra</b><br>";
echo "Data di oggi " . date("j/n/Y");
echo "<br><br>";

echo "<b>Giorni trascorsi</b><br>";
echo "Sono trascorsi ".date("z")." giorni dall'inizio dell'anno.";
echo "<br><br>";

echo "<b>Nomi dei giorni della settimana</b><br>";
$giorni = array( "Dom", "Lun", "Mar", "Mer", "Gio", "Ven", "Sab" );
echo "Oggi e': " . $giorni[date("w")];
echo "<br><br>";

echo "<b>Verifichiamo una data (31 aprile 2001!?)</b><br>";
$giorno = 31;
$mese = 4;
$anno = 2001;
echo "Data $giorno/$mese/$anno ";
if (checkdate($mese,$giorno,$anno)) echo "corretta.";
else echo "non valida!";
echo "<br><br>";

echo "<b>Data n. 1: ancora il primo gennaio 2001 - Data n. 2: il 29 luglio 2001</b><br>";
$data1 = mktime(0, 0, 0, 1, 1, 2001);
$data2 = mktime(0, 0, 0, 7, 29, 2001);
echo "data 1: ".$data1."<BR>";
echo "data 2: ".$data2."<BR>";
echo "Prima data ";
if ($data1 < $data2) echo "precedente";
else echo "successiva";
echo " alla seconda.";
echo "<br><br>";

echo "<b>Bis -Tra le due date ci sono :";
echo ( date("z",mktime(0, 0, 0, 1, 1, 2001))-date("z",mktime(0, 0, 0, 7, 29, 2001) ));
echo " giorni<b>";
echo "<br><br>";

echo "<b>La data 1 gennaio 2001 va memorizzata in Mysql come :";
echo ( date("Ymd",mktime(0, 0, 0, 1, 1, 2001)) );
echo " <b>";
echo "<br><br>";

echo "</body>";
echo "</html>";

?>

