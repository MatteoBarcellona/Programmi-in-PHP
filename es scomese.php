<?php

$eventi = array(
    array("n" => "1", "s1" => "Spal", "s2" => "Pisa", "r1" => "2.60", "X" => "3.10", "2" => "2.80"),
    array("n" => "2", "s1" => "Alessandria", "s2" => "Benevento", "r1" => "3.75", "X" => "3.35", "2" => "2.00"),
    array("n" => "3", "s1" => "Monza", "s2" => "Reggina", "r1" => "1.70", "X" => "3.60", "2" => "4.85"),
    array("n" => "4", "s1" => "Cosenza", "s2" => "Ascoli", "r1" => "2.95", "X" => "3.10", "2" => "2.50"),
    array("n" => "5", "s1" => "Como", "s2" => "Crotone", "r1" => "1.95", "X" => "3.45", "2" => "3.90"),
    array("n" => "6", "s1" => "Brescia", "s2" => "Ternana", "r1" => "2.05", "X" => "3.35", "2" => "3.65"),
    array("n" => "7", "s1" => "Perugia", "s2" => "Pordenone", "r1" => "1.65", "X" => "3.55", "2" => "5.50")
);

$selezionati = array();
$scommessa = 0;

echo "<h1>Scommessa</h1>";
echo "<table>";
foreach ($eventi as $evento) {
    echo "<tr>";
    echo "<td>" . $evento["n"] . "</td>";
    echo "<td>" . $evento["s1"] . "</td>";
    echo "<td>" . $evento["s2"] . "</td>";
    echo "<td>";
    echo "<select name='r" . $evento["n"] . "'>";
    echo "<option value='1'>1</option>";
    echo "<option value='X'>X</option>";
    echo "<option value='2'>2</option>";
    echo "</select>";
    echo "</td>";
    echo "</tr>";
}
echo "</table>";

if ($_POST) {
    if (count($selezionati) == 0) {
        echo "<p>Devi selezionare evento.</p>";
        return;
    }

    foreach ($selezionati as $evento) {
        $scommessa *= $eventi[$evento]["r" . $_POST["r" . $evento]];
    }

    echo "<h2>Risultato</h2>";
    echo "<p>Scommessa: " . $scommessa . "</p>";
}

if (isset($_GET["rimuovi"])) {
    unset($selezionati[$_GET["rimuovi"]]);
}

if (isset($_GET["cancella"])) {
    $selezionati = array();
}

if (count($selezionati) > 0) {
    echo "<h2>Eventi selezionati</h2>";
    foreach ($selezionati as $evento) {
        echo "<p>" . $eventi[$evento]["n"] . " - " . $eventi[$evento]["r" . $_POST["r" . $evento]] . "</p>";
    }
}

?>
