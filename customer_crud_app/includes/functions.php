<?php
require_once 'db.php';

$server_name = 'localhost';
$db_name = 'customer_crud_app';
$username = 'root';
$password = '';

$databaseConnection = new DatabaseConnection($server_name, $db_name, $username, $password);
$conn = $databaseConnection->connect();

if ($conn) {
    echo "Connected successfully";
}
?>
