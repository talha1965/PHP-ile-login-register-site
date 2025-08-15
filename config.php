<?php
$host = "localhost";
$db   = "portfolio_db";   // veritabanı adını değiştir
$user = "root";       // MySQL kullanıcı adın
$pass = "";           // şifre, genelde XAMPP'ta boş
$charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Veritabanı bağlantı hatası: " . $e->getMessage();
    exit;
}
?>
