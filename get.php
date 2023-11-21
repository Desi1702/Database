<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET Form</title>
</head>
<body>
    <h2>GET Form</h2>
    <form action="get.php" method="GET">
        <label for="name">Naam</label>
        <input type="text" name="name" required><br>   
        <label for="lastname">Achternaam</label>
        <input type="text" name="lastname" required><br> 
        <label for="age">Leeftijd:</label>
        <input type="text" name="age" required><br>
        <label for="address">Adres</label>
        <input type="text" name="address" required><br>
        <label for="email">Email</label>
        <input type="email" name="email" required><br>
        <input type="submit" value="Verzenden">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        echo "<h2>Ingevoerde gegevens:</h2>";
        echo "Naam: " . $_GET["name"] . "<br>";
        echo "Achternaam: " . $_GET["lastname"] . "<br>";
        echo "Leeftijd: " . $_GET["age"] . "<br>";
        echo "Adres: " . $_GET["address"] . "<br>";
        echo "Email: " . $_GET["email"] . "<br>";
    }
    ?>
</body>
</html>
