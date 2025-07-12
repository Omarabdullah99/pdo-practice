<?php
$host = 'localhost';   // localhost-এর বদলে সরাসরি IP দিলে DNS লুকআপ এড়ানো যায়
$port = 3307;          // docker-compose.yml এ host side পোর্ট
$db   = 'test_database'; //database er name hobe
$user = 'root';
$password = 'root';


$dsn = "mysql:host=$host;port=$port;dbname=$db";

function findPerson($pdo,$pattern){
    $sql= "SELECT name, email FROM testtable WHERE name LIKE :pattern";
    $statement= $pdo->prepare($sql);
    $statement->execute([':pattern'=>$pattern]);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

try {
    $pdo = new PDO($dsn, $user, $password);
    // Error mode set করা
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $result= findPerson($pdo, "_mar");

    foreach($result as $r){
        echo $r['name'] . $r['email'] . "<br>";
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}






