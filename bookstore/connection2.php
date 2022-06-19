<?php
require_once 'config2.php';

try {


    $pdo = new PDO("mysql:host=localhost;dbname=bookstore", DB_USERNAME, DB_PASS, $option);
    // echo 'Connecté...';
} catch (PDOException $e) {
    die($e->getMessage());
}

?>