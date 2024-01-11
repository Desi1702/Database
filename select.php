<?php
$servername = "localhost";
$username = "root";
$password = " ";
$database = "winkel";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Deel 1: Hoe je alles selecteert in een query zonder variabele
    echo "<h2>Deel 1: Alle producten</h2>";
    $stmt = $conn->query("SELECT * FROM producten");
    $result = $stmt->fetchAll();
    printData($result);

    // Deel 2: Hoe je een single row selecteert met placeholders
    echo "<h2>Deel 2: Product met product_code 1</h2>";
    $stmt = $conn->prepare("SELECT * FROM producten WHERE product_code = ?");
    $stmt->execute([1]);
    $result = $stmt->fetch();
    printData([$result]);

    // Deel 3: Hoe je een single row selecteert met named parameters
    echo "<h2>Deel 3: Product met product_code 2</h2>";
    $stmt = $conn->prepare("SELECT * FROM producten WHERE product_code = :product_code");
    $stmt->bindParam(':product_code', $product_code);
    $product_code = 2;
    $stmt->execute();
    $result = $stmt->fetch();
    printData([$result]);

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Functie om data te printen
function printData($data) {
    echo "<table border='1'>";
    foreach ($data as $row) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            echo "<td>$key</td><td>$value</td>";
        }
        echo "</tr>";
    }
    echo "</table><br>";
}
?>
