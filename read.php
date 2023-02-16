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

// prepare SQL statement to select all records from the achtbaan table, sorted by Topsnelheid in descending order
// Construct the SQL query to select all records from the "achtbaan" table
$sql = "SELECT * FROM achtbaan ORDER BY Topsnelheid DESC";

// Prepare the SQL query for execution
$statement = $pdo->prepare($sql);

// Execute the prepared SQL query
$statement->execute();

// Fetch all the records from the "achtbaan" table and store them in an array of objects
$result = $statement->fetchAll(PDO::FETCH_OBJ);

// Loop through each record and construct the HTML table rows
$rows = "";
foreach ($result as $info) {
    $rows .= "<tr>
                <td>$info->Id</td>
                <td>$info->NaamAchtbaan</td>
                <td>$info->NaamPretpark</td>
                <td>$info->Land</td>
                <td>$info->Topsnelheid</td>
                <td>$info->Hoogte</td>
                <td>$info->Datum</td>
                <td>$info->Cijfer</td>
                <td>
                    <a href='delete.php?Id=$info->Id'>
                        <img src='img/b_drop.png' alt='kruis'>
                    </a>
                </td>
                <td>
                <a href='update.php?Id=$info->Id'>
                    <img src='img/b_edit.png' alt='potlood'>
                </td>
              </tr>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achtbanen</title>
</head>

<body>
    <h3>Achtbanen</h3>
    <table border='1'>
        <thead>
            <th>Id</th>
            <th>Naam achtbaan</th>
            <th>Naam pretpark</th>
            <th>Land</th>
            <th>Topsnelheid</th>
            <th>Hoogte</th>
            <th>Datum</th>
            <th>Cijfer</th>
        </thead>
        <tbody>
            <?= $rows; ?>
        </tbody>
    </table>
</body>

</html>

