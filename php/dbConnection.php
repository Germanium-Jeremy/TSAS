<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'tsas';

try {
    $connection = new mysqli($server, $username, $password, $database);
    if ($connection->connect_error) {
        throw new Exception("Connection failed: " . $connection->connect_error);
    }
    echo '<script>console.log("Database Connected Successfully")</script>';
} catch (Exception $e) {
    exit("Error: " . $e->getMessage());
}

?>
