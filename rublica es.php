<html>
<body>
<?php

if (!isset($_Rublica['rubrica'])) {
$_Rublica['rubrica'] = array();
}

if (isset($_POST['aggiungi'])) {
    $nominativo = $_POST['nominativo'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    echo "Contatto aggiunto con successo";
}

if (isset($_POST['cancella_multipla'])) {
    $cancellati = $_POST['cancellati'];
    echo "Cancellazione multipla completata con successo";
}

?>

<h1>La Rubrica</h1>
    <form action="" method="post">
        <label for="nominativo">Nominativo:</label>
        <input type="text" name="nominativo" required><br>

        <label for="telefono">Telefono:</label>
        <input type="text" name="telefono"><br>

        <label for="email">E-mail:</label>
        <input type="email" name="email"><br>

        <button type="submit" name="aggiungi">Aggiungi contatto</button>
    </form>

    <form action="" method="post">
        <h2>Cancellazione multipla</h2>
        <label for="cancellati">Seleziona i contatti da cancellare :</label><br>
        <select name="cancellati[]" multiple>

            <?php
            foreach ($_SESSION['rubrica'] as $id => $contatto) {
                echo "<option value='$id'>{$contatto['nominativo']}</option>";
            }
            ?>

        </select><br>

        <button type="submit" name="cancella_multipla">Cancella selezionati</button>
    </form>
    </body>
</html>