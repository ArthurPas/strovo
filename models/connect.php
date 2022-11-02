<?php

$host = 'localhost';
$db = 'stryd';
$user = 'postgres';
$password = '1457';

try {
    $dsn = "pgsql:host=localhost;port=5432;dbname=stryd;";
    // make a database connection
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    die($e->getMessage());
}