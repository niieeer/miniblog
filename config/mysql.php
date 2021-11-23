<?php
$username = "root";
$password = "";
$host = "localhost"; //localhost 
$db = "test";
$port = "3306";

$option = [
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
];

$bdd = "mysql:host=$host;dbname=$db;charset=utf8;port=$port";

try {
    $connexion = new \PDO($bdd, $username, $password, $option);
} catch (\PDOException $error) {
    $message = $error->getMessage();
    var_dump($message);
    die("Erreur lors de ma connexion PDO");
}
