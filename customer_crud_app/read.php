<?php
require 'includes/db.php';
require 'customer.php';

$databaseConnection = new DatabaseConnection('localhost', 'customer_crud_app', 'root', '');
$conn = $databaseConnection->connect();

$customers = new Customer($conn);
$customer = $customers->read();

foreach ($customer as $customers) {
    echo "ID: " . $customers['id'] . "<br>";
    echo "First Name: " . $customers['first_name'] . "<br>";
    echo "Last Name: " . $customers['last_name'] . "<br>";
    echo "Email: " . $customers['email'] . "<br>";
    echo "Phone Number: " . $customers['phone_number'] . "<br>";
    echo "Street: " . $customers['street'] . "<br>";
    echo "City: " . $customers['city'] . "<br>";
    echo "State: " . $customers['state'] . "<br>";
    echo "Zip Code: " . $customers['zip_code'] . "<br>";
    echo "Loyalty Program Tier Type: " . $customers['loyalty_program_tier_type'] . "<br><br>";
}
?>
