<?php
require_once 'config.php';

try {


    $obj_pdo = new PDO("mysql:host=localhost;dbname=vente", DB_USERNAME, DB_PASS);
    echo 'Connecté...';
} catch (PDOException $e) {
    die($e->getMessage());
}

?>