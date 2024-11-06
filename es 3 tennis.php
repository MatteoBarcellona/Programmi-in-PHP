<?php
$mysqli = new mysqli("localhost", "root", "", "tennis");
if ($mysqli->connect_errno) {
    echo "Errore di connessione al database: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $giocatore1 = $_POST['giocatore1'];
    $giocatore2 = $_POST['giocatore2'];
    $set1_giocatore1 = $_POST['set1_giocatore1'];
    $set1_giocatore2 = $_POST['set1_giocatore2'];
    $query = "INSERT INTO Incontri (ID_gioc_1, ID_gioc_2, set1_1, set1_2) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("iiii", $giocatore1, $giocatore2, $set1_giocatore1, $set1_giocatore2);
    if ($stmt->execute()) {
        echo "Dati degli incontri salvati con successo.";
    } else {
        echo "Errore nel salvataggio dei dati degli incontri: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caricamento dati incontri di tennis</title>
</head>
<body>
    <h2>Caricamento dati incontri di tennis</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="giocatore1">Giocatore 1:</label>
        <input type="text" name="giocatore1" required><br>

        <label for="giocatore2">Giocatore 2:</label>
        <input type="text" name="giocatore2" required><br>

        <label for="set1_giocatore1">set 1 - Giocatore 1:</label>
        <input type="number" name="set1_giocatore1" required><br>

        <label for="set1_giocatore2">set 1 - Giocatore 2:</label>
        <input type="number" name="set1_giocatore2" required><br>

        <input type="submit" value="Invia">
    </form>
</body>
</html>
