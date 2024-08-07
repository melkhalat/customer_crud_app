<?php

require '../customer_crud_app/includes/db.php';
require '../customer_crud_app/validate.php';
require '../customer_crud_app/customer.php';

$databaseConnection = new DatabaseConnection('localhost', 'customer_crud_app', 'root', '');
$conn = $databaseConnection->connect();

$customers = new Customer($conn);

// Test updating a customer
if ($customers->update(13, 'Mona', 'El', 'mona_updated@example.com', '4567891011', '577 Main St', 'Brooklyn', 'NY', '11220', 'bronze')) {
    echo "Customer updated successfully.\n";
} else {
    echo "Failed to update customer.\n";
}

// Verify the update
$cust = $customers->read(13);
if ($cust) {
    echo "Updated customer: ID: " . $cust['id'] . ", First Name: " . $cust['first_name'] . ", Last Name: " . $cust['last_name'] . ", Email: " . $cust['email'] . "\n";
} else {
    echo "Failed to read updated customer.\n";
}
?>
