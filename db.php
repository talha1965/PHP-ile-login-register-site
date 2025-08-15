<?php
$host = "localhost";
$dbname = "portfolio_db";
$user = "root";
$pass = ""; // XAMPP veya WAMP için boş bırakılabilir

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
    exit();
}
?>
