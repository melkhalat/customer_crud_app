<?php
require '../customer_crud_app/includes/db.php';
require '../customer_crud_app/customer.php';

$databaseConnection = new DatabaseConnection('localhost', 'customer_crud_app', 'root', '');
$conn = $databaseConnection->connect();

$customers = new Customer($conn);

// Test deleting a customer
if ($customers->delete(1)) {
    echo "Customer deleted successfully.\n";
} else {
    echo "Failed to delete customer.\n";
}

// Verify the deletion
$cust = $customers->read(1);
if (!$cust) {
    echo "Customer deletion confirmed.\n";
} else {
    echo "Customer still exists after deletion.\n";
}
?>
