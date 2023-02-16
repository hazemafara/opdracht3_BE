<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <form action="create.php" method="post">
        <label for="naam-achtbaan">Naam achtbaan*</label>
        <input type="text" id="naamAchtbaan" name="naamAchtbaan" required>

        <label for="naam-pretpark">Naam Pretpark*</label>
        <input type="text" id="naamPretpark" name="naamPretpark" required>

        <label for="naam-land">Naam Land*</label>
        <input type="text" id="land" name="land" required>

        <label for="topsnelheid">Topsnelheid (km/h)*</label>
        <input type="number" id="topsnelheid" name="topsnelheid" min="1" max="200" required>

        <label for="hoogte">Hoogte (m)*</label>
        <input type="number" id="hoogte" name="hoogte" min="1" max="200" required>

        <label for="datum-eerste-opening">Datum eerste opening*</label>
        <input type="date" id="datum" name="datum" required>

        <label for="cijfer-achtbaan">Cijfer voor achtbaan (1 t/m 10)*</label>
        <input type="range" id="cijfer" name="cijfer" min="1" max="10" step="0.1" onchange="updateOutput(this.value)" required>
        <output for="cijfer" id="cijfer-output">5</output>

        <input type="submit" value="Verzenden">
    </form>


    <script>
        function updateOutput(value) {
            document.getElementById("cijfer-output").value = value;
        }
    </script>

</body>

</html>