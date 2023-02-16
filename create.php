<?php

// set database credentials
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

// prepare SQL statement with placeholders for the form data
$sql = "INSERT INTO achtbaan (NaamAchtbaan, NaamPretpark, Land, Topsnelheid, Hoogte, Datum, Cijfer)
        VALUES (:naamAchtbaan, :naamPretpark, :land, :topsnelheid, :hoogte, :datum, :cijfer)";
$stmt = $pdo->prepare($sql);

// bind form data to the placeholders in the SQL statement using bindValue
$stmt->bindValue(':naamAchtbaan', $_POST['naamAchtbaan']);
$stmt->bindValue(':naamPretpark', $_POST['naamPretpark']);
$stmt->bindValue(':land', $_POST['land']);
$stmt->bindValue(':topsnelheid', $_POST['topsnelheid']);
$stmt->bindValue(':hoogte', $_POST['hoogte']);
$stmt->bindValue(':datum', $_POST['datum']);
$stmt->bindValue(':cijfer', $_POST['cijfer']);

// execute the prepared statement to insert the form data into the database
if ($stmt->execute()) {
    echo "Record created successfully";
    header('Refresh:2; url=read.php');
} else {
    echo "Error creating record: " . $stmt->errorInfo()[2];
    header('Refresh:2; url=read.php');
}