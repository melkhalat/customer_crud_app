<?php
require '../customer_crud_app/includes/db.php';
require '../customer_crud_app/customer.php';

$databaseConnection = new DatabaseConnection('localhost', 'customer_crud_app', 'root', '');
$conn = $databaseConnection->connect();

$customers = new Customer($conn);

// Test reading all customers
$customer = $customers->read();
foreach ($customer as $cust) {
    echo "ID: " . $cust['id'] . ", First Name: " . $cust['first_name'] . ", Last Name: " . $cust['last_name'] . ", Email: " . $cust['email'] . "\n";
}

// Test reading a single customer
$cust = $customers->read(13);
if ($cust) {
    echo "Read single customer: ID: " . $cust['id'] . ", First Name: " . $cust['first_name'] . ", Last Name: " . $cust['last_name'] . ", Email: " . $cust['email'] . "\n";
} else {
    echo "Failed to read single customer.\n";
}
?>
