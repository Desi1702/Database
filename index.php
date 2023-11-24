<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "winkel";
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Connected to database winkel<br>";

    
    $query = "SELECT * FROM new_tabel";
    $statement = $pdo->query($query);

   
    foreach ($statement as $row) {
        echo "Product ID: " . $row['product_code'] . ", Name: " . $row['product_naam'] . "<br>";
        
    }
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>











