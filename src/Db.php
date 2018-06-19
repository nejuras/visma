<?php

$server = "127.0.0.1";
$user = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$server;dbname=visma", $user, $password);
    $conn->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
