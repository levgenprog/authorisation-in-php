<?php
$dbHost = '127.0.0.1:3306';
$dbName = 'authorisation';
$dbUser = 'myadmin';
$dbPassword = 'jmvHt333555777';

try {
    $db = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Handle the connection error appropriately
    echo 'Connection failed: ' . $e->getMessage();
    // exit();
}
