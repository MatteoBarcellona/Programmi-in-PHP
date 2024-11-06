
<?php

$mysqli = new mysqli("localhost", "root", "", "tennis");

if ($mysqli->connect_errno) {
    echo "non si connette: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$queryT = "SELECT Giocatori.ID_Giocatore, Giocatori.nome, Giocatori.cognome FROM Giocatori ";
if (!$risultatoT = $mysqli->query($queryT)) {
    echo $queryT;
}

$query = "";
$t0 = 0;
$t1 = 0;
$t2 = 0;

if (isset($_POST['I1'])) {
    $t0 = $_POST['T0'] * 1;

    $query = "SELECT Giocatori.nome, Giocatori.cognome, Incontri.Risultato_Giocatore1, Incontri.Risultato_Giocatore2 ";
    $query .= "FROM Incontri ";
    $query .= "INNER JOIN Giocatori ON Incontri.Giocatore1_ID = Giocatori.ID_Giocatore ";
    $query .= "WHERE Giocatori.ID_Giocatore=" . $t0 . " ";
}

if (isset($_POST['I2'])) {
    $query = "SELECT Giocatori.nome, Giocatori.cognome, COUNT(Incontri.ID_Incontro) AS NumeroIncontri, ";
    $query .= "SUM(Incontri.Set1_Giocatore1 + Incontri.Set2_Giocatore1 + Incontri.Set3_Giocatore1) AS TotaleSetVinti, ";
    $query .= "SUM(Incontri.Set1_Giocatore2 + Incontri.Set2_Giocatore2 + Incontri.Set3_Giocatore2) AS TotaleSetPersi, ";
    $query .= "SUM(Incontri.Set1_Giocatore1 + Incontri.Set1_Giocatore2 + Incontri.Set2_Giocatore1 + Incontri.Set2_Giocatore2 + Incontri.Set3_Giocatore1 + Incontri.Set3_Giocatore2) AS TotaleGiochiVinti, ";
    $query .= "SUM(Incontri.Set1_Giocatore2 + Incontri.Set1_Giocatore1 + Incontri.Set2_Giocatore2 + Incontri.Set2_Giocatore1 + Incontri.Set3_Giocatore2 + Incontri.Set3_Giocatore1) AS TotaleGiochiPersi ";
    $query .= "FROM Incontri ";
    $query .= "INNER JOIN Giocatori ON Incontri.Giocatore1_ID = Giocatori.ID_Giocatore ";
    $query .= "GROUP BY Giocatori.ID_Giocatore, Giocatori.nome, Giocatori.cognome ";
}

if (isset($_POST['I3'])) {
    $query = "SELECT G1.nome AS NomeGiocatore1, G1.cognome AS CognomeGiocatore1, G2.nome AS NomeGiocatore2, G2.cognome AS CognomeGiocatore2, COUNT(*) AS IncontriGiocati ";
    $query .= "FROM Incontri I ";
    $query .= "JOIN Giocatori G1 ON I.Giocatore1_ID = G1.ID_Giocatore ";
    $query .= "JOIN Giocatori G2 ON I.Giocatore2_ID = G2.ID_Giocatore ";
    $query .= "GROUP BY G1.nome, G1.cognome, G2.nome, G2.cognome ";
}

?>

<HTML>

<BODY>

<FORM name='F1' method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>' >
    Vedi gli incontri del giocatore

    <SELECT name='T0'>
        <?php
        foreach ($risultatoT as $Tendina) {
            if ($Tendina['ID_Giocatore'] == $t0) {
                echo "<OPTION value='" . $Tendina['ID_Giocatore'] . "' SELECTED>" . $Tendina['nome'] . " " . $Tendina['cognome'] . "</OPTION>";
            } else {
                echo "<OPTION value='" . $Tendina['ID_Giocatore'] . "'>" . $Tendina['nome'] . " " . $Tendina['cognome'] . "</OPTION>";
            }
        }
        ?>
    </SELECT>

    <INPUT type='submit' name='I1' value='invia'>
    <BR><BR>
    Statistiche degli incontri di ciascun giocatore
    <INPUT type='submit' name='I2' value='invia'>
    <BR><BR>
    Incontri giocati tra due giocatori
    <INPUT type='submit' name='I3' value='invia'>
    <BR><BR>
</FORM>

<?php

if (substr($query, 0, 6) == "SELECT") {

    if (!$risultato = $mysqli->query($query)) {
        echo "Errore nell'esecuzione della query: " . $mysqli->error;
    }

    echo "<TABLE border='1'>";
    echo "<TR>";

    for ($i = 0; $i < $risultato->field_count; $i++) {
        echo "<TD><B>" . $risultato->fetch_field_direct($i)->name . "</B></TD>";
    }
    echo "</TR>";

    while ($row = $risultato->fetch_row()) {
        echo "<TR>";
        for ($i = 0; $i < $risultato->field_count; $i++) {

            echo "<TD>" . $row[$i] . "</TD>";

        }
        echo "</TR>";
    }
    echo "</TABLE>";

}

$mysqli->close();

?>

</BODY>

</HTML>


