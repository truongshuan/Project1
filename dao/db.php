<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $con = new PDO("mysql:host=$servername;dbname=duanmau", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conected successfully";
} catch (PDOException $e) {
    echo "Connection fail" . $e->getMessage();
}