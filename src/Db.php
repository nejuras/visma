<?php

$server = "127.0.0.1";
$user = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$server;dbname=visma", $user, $password);
    $conn->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS visma";
    $conn->exec($sql);
    $sql = "use visma";
    $conn->exec($sql);
    $sql = "CREATE TABLE IF NOT EXISTS registration (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone_number1 VARCHAR(30) NOT NULL,
    phone_number2 VARCHAR(30) NOT NULL,
    comment TEXT NOT NULL,
    UNIQUE (email))ENGINE=InnoDB CHARACTER SET=utf8";

    $conn->exec($sql);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
