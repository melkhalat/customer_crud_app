<?php
require 'includes/db.php';
require 'customer.php';

$database = new DatabaseConnection('localhost', 'customer_crud_app', 'root', '');
$conn = $databaseConnection->connect();

$customers = new Customer($conn);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($customers->delete($id)) {
        echo "Customer deleted successfully.";
    } else {
        echo "Error deleting customer.";
    }
}
?>
