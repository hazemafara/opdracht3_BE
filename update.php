<?php

$host = 'localhost';
$dbname = 'attractiepark';
$username = 'root';
$password = '';

// connect to database using PDO
$dsn = "mysql:host=$host;dbname=$dbname";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $sql = "UPDATE achtbaan
            SET naamAchtbaan = :naamAchtbaan,
                naamPretpark = :naamPretpark,
                land = :land,
                topsnelheid = :topsnelheid,
                hoogte = :hoogte,
                datum = :datum,
                cijfer = :cijfer
            WHERE Id = :id";

    $statement = $pdo->prepare($sql);

    $statement->bindValue(':naamAchtbaan', $_POST['naamAchtbaan'], PDO::PARAM_STR);
    $statement->bindValue(':naamPretpark', $_POST['naamPretpark'], PDO::PARAM_STR);
    $statement->bindValue(':land', $_POST['land'], PDO::PARAM_STR);
    $statement->bindValue(':topsnelheid', $_POST['topsnelheid'], PDO::PARAM_STR);
    $statement->bindValue(':hoogte', $_POST['hoogte'], PDO::PARAM_STR);
    $statement->bindValue(':datum', $_POST['datum'], PDO::PARAM_STR);
    $statement->bindValue(':cijfer', $_POST['cijfer'], PDO::PARAM_STR);
    $statement->bindValue(':id', $_POST['Id'], PDO::PARAM_STR);

    $statement->execute();

    echo "Het updaten is gelukt";
    header('Refresh:3; url=read.php');

    exit();
}

$sql = "SELECT * FROM achtbaan WHERE Id = :Id";

// Maak de sql-query klaar om de $_GET['Id'] waade te kopplen aan de placeholder :Id
$statement = $pdo->prepare($sql);
// Koppel de waarde $_GET['Id'] aan de placeholder :Id
$statement->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);



//Voer de query uit

$statement->execute();
//Haal het resultaat op met fetch en stop het object in de variabal $result
$result = $statement->fetch(PDO::FETCH_OBJ);
//var_dump($result);  

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>PHP PDO CRUD</title>
</head>

<body>
    <H1>PHP PDO CRUD</H1>

    <form action="update.php" method="post">
        <input type = "hidden" name = "Id" value="<?= $result->Id; ?>"
        <label for="naam-achtbaan">Naam achtbaan*</label>
        <input type="text" id="naamAchtbaan" name="naamAchtbaan" value="<?= $result->NaamAchtbaan; ?>" required>

        <label for="naam-pretpark">Naam Pretpark*</label>
        <input type="text" id="naamPretpark" name="naamPretpark" value="<?= $result->NaamPretpark; ?>" required>

        <label for="naam-land">Naam Land*</label>
        <input type="text" id="land" name="land" value="<?= $result->Land; ?>" required>

        <label for="topsnelheid">Topsnelheid (km/h)*</label>
        <input type="number" id="topsnelheid" name="topsnelheid" min="1" max="200" value="<?= $result->Topsnelheid; ?>" required>

        <label for="hoogte">Hoogte (m)*</label>
        <input type="number" id="hoogte" name="hoogte" min="1" max="200" value="<?= $result->Hoogte; ?>" required>

        <label for="datum-eerste-opening">Datum eerste opening*</label>
        <input type="date" id="datum" name="datum" value="<?= $result->Datum; ?>" required>

        <label for="cijfer-achtbaan">Cijfer voor achtbaan (1 t/m 10)*</label>
        <input type="range" id="cijfer" name="cijfer" min="1" max="10" step="0.1" onchange="updateOutput(this.value)" value="<?= $result->Cijfer; ?>" required>
        <output for="cijfer" id="cijfer-output">1</output>

        <input type="submit" value="Verzenden">
    </form>
    </form>
</body>

</html>