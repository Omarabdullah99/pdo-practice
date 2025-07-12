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

    //multiple data insert with placeholder prepare
    $persons=[
        ["name"=>"per1", "email"=>"per1@gmail.com"],
        ["name"=>"per2", "email"=>"per2@gmail.com"],
        ["name"=>"per3", "email"=>"per3@gmail.com"],
        ["name"=>"per4", "email"=>"per4@gmail.com"],

    ];

    $sql= "INSERT INTO testtable(name,email) VALUES(:name, :email)";
    $statement= $pdo->prepare($sql);
    foreach($persons as $person){
        $statement->execute($person);
    }
    
    echo "data added successfully";

} catch (PDOException $e) {
    echo $e->getMessage();
}






