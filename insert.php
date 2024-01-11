<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Toevoegen</title>
</head>
<body>
    <h2>Voeg een nieuw product toe</h2>
    <form action="insert_process.php" method="POST">
        <label for="product_naam">Product Naam:</label>
        <input type="text" name="product_naam" required><br>

        <label for="prijs_per_stuk">Prijs per Stuk:</label>
        <input type="number" name="prijs_per_stuk" step="0.01" required><br>

        <label for="omschrijving">Omschrijving:</label>
        <textarea name="omschrijving" required></textarea><br>

        <button type="submit">Voeg Product Toe</button>
    </form>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "zeekomkommer2711!";
$database = "winkel";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Verwerk het formulier en voeg het product toe aan de database
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $product_naam = $_POST["product_naam"];
        $prijs_per_stuk = $_POST["prijs_per_stuk"];
        $omschrijving = $_POST["omschrijving"];

        $stmt = $conn->prepare("INSERT INTO producten (product_naam, prijs_per_stuk, omschrijving) VALUES (:product_naam, :prijs_per_stuk, :omschrijving)");
        $stmt->bindParam(':product_naam', $product_naam);
        $stmt->bindParam(':prijs_per_stuk', $prijs_per_stuk);
        $stmt->bindParam(':omschrijving', $omschrijving);

        $stmt->execute();

        echo "Product succesvol toegevoegd.";
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
