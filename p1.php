<?php
$host = 'localhost';   // localhost-এর বদলে সরাসরি IP দিলে DNS লুকআপ এড়ানো যায়
$port = 3307;          // docker-compose.yml এ host side পোর্ট
$db   = 'test_database'; //database er name hobe
$user = 'root';
$password = 'root';


$dsn = "mysql:host=$host;port=$port;dbname=$db";

try {
    $pdo = new PDO($dsn, $user, $password);
    // Error mode set করা
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "database connect successfully";

} catch (PDOException $e) {
    echo $e->getMessage();
}






