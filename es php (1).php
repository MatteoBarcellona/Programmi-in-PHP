<?php

$mysqli = new mysqli("localhost", "root", "", "scuola");
if ($mysqli->connect_errno) {
    echo "Non si connette: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

function executeAndDisplayQuery($query){
    global $mysqli;

    if (!$risultato = $mysqli->query($query)) {
        echo "Errore nella query: " . $mysqli->error;
    }

    echo "<table border='1'>";
    echo "<tr>";

    for ($i = 0; $i < $risultato->field_count; $i++) {
        echo "<td><b>" . $risultato->fetch_field_direct($i)->name . "</b></td>";
    }
    echo "</tr>";

    while ($row = $risultato->fetch_row()) {
        echo "<tr>";
        for ($i = 0; $i < $risultato->field_count; $i++) {
            echo "<td>" . $row[$i] . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
    echo "<br><br>";
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Query Form</title>
</head>

<body>

    <h2>Visualizzare i voti di uno specifico studente</h2>
    <form method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
        <label for='student_id'>ID Studente:</label>
        <input type='text' name='student_id'>
        <input type='submit' name='show_student_grades' value='Mostra Voti'>
    </form>

    <?php
    if (isset($_POST['show_student_grades'])) {
        $student_id = $_POST['student_id'];
        $query = "SELECT * FROM voti WHERE id_studente = $student_id";
        executeAndDisplayQuery($query);
    }
    ?>

    <h2>Visualizzare i voti compresi tra un massimo e un minimo</h2>
    <form method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
        <label for='min_grade'>Voto Minimo:</label>
        <input type='text' name='min_grade'>
        <label for='max_grade'>Voto Massimo:</label>
        <input type='text' name='max_grade'>
        <input type='submit' name='show_grades_range' value='Mostra Voti nel Range'>
    </form>

    <?php
    if (isset($_POST['show_grades_range'])) {
        $min_grade = $_POST['min_grade'];
        $max_grade = $_POST['max_grade'];
        $query = "SELECT * FROM voti WHERE voto >= $min_grade AND voto <= $max_grade";
        executeAndDisplayQuery($query);
    }
    ?>

    <h2>Visualizzare il voto minimo e il voto massimo per ciascuno studente</h2>
    <form method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
        <input type='submit' name='show_min_max_grades' value='Mostra Voti Minimi e Massimi'>
    </form>

    <?php
    if (isset($_POST['show_min_max_grades'])) {
        $query = "SELECT id_studente, MIN(voto) AS voto_minimo, MAX(voto) AS voto_massimo FROM voti GROUP BY id_studente";
        executeAndDisplayQuery($query);
    }
    ?>

</body>

</html>
