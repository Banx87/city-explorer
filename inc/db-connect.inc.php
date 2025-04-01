<?php
$config = require __DIR__ . '/../config.php';

try {
    $pdo = new PDO('mysql:host=' . $config['db_host'] . ';dbname=' . $config['db_name'] . ';charset=utf8mb4', $config['db_user'], $config['db_pass'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    echo 'A problem occurred with the database connection...';
    die();
}

// TEST CONNECTION
// $stmt = $pdo->prepare('SELECT * FROM `names`');
// $stmt->execute();
// var_dump($stmt->fetch(PDO::FETCH_ASSOC));