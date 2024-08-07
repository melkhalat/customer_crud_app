<?php

require '../customer_crud_app/includes/db.php';
require '../customer_crud_app/validate.php';
require '../customer_crud_app/bronze_tier_customer.php';
require '../customer_crud_app/silver_tier_customer.php';
require '../customer_crud_app/gold_tier_customer.php';

$databaseConnection = new DatabaseConnection('localhost', 'customer_crud_app', 'root', '');
$conn = $databaseConnection->connect();

// Test creating a bronze tier customer
$bronzeTierCustomer = new BronzeTierCustomer($conn);
if ($bronzeTierCustomer->create('Mona', 'El', 'mona@example.com', '1234567890', '123 Main St', 'Fords', 'NJ', '08863')) {
    echo "Bronze tier customer created successfully.\n";
} else {
    echo "Failed to create bronze tier customer.\n";
}

// Test creating a silver tier customer
$silverTierCustomer = new SilverTierCustomer($conn);
if ($silverTierCustomer->create('Kimberly', 'Brown', 'kim@example.com', '6467896654', '456 Main St', 'Queens', 'NY', '11420')) {
    echo "Silver tier customer created successfully.\n";
} else {
    echo "Failed to create silver tier customer.\n";
}

// Test creating a gold tier customer
$goldTierCustomer = new GoldTierCustomer($conn);
if ($goldTierCustomer->create('John', 'Doe', 'john@example.com', '7327689873', '789 Main St', 'Brooklyn', 'NY', '11220')) {
    echo "Gold tier customer created successfully.\n";
} else {
    echo "Failed to create gold tier customer.\n";
}

?>