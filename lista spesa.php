<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h2>Lista della spesa</h2>

    <form method="post" action="">
        <label for="articolo">Articolo:</label>
        <input type="text" id="articolo" name="articolo" required><br>

        <label for="quantita">Quantità:</label>
        <input type="number" id="quantita" name="quantita" required><br>

        <label for="prezzo">Prezzo unitario:</label>
        <input type="number" step="0.01" id="prezzo" name="prezzo" required><br>

        <input type="submit" name="aggiungi" value="Aggiungi all'elenco">
    </form>
   <?php

   if (isset($_POST['aggiungi'])) {
       $articolo = $_POST['articolo'];
       $quantita = $_POST['quantita'];
       $prezzo = $_POST['prezzo'];

       $prodotto = array(
           'articolo' => $articolo,
           'quantita' => $quantita,
           'prezzo' => $prezzo
       );

       $_SESSION['listas'][] = $prodotto;
   }

   if (isset($_SESSION['listas']) && count($_SESSION['listas']) > 0) {
       echo "<h3>dati della spesa:</h3>";
       echo "<ul>";
       $totale = 0;

       foreach ($_SESSION['listas'] as $prodotto) {
           echo "<li> {$prodotto['quantita']} x {$prodotto['articolo']} - Prezzo unitario: {$prodotto['prezzo']} euro</li>";
           $totale += $prodotto['quantita'] * $prodotto['prezzo'];
       }

       echo "</ul>";
       echo "<strong>Totale: $totale euro</strong>";
   } else {
       echo "<p>Nessuna spesa nella lista.</p>";
   }
   ?>

</body>

</html>
