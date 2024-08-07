<?php
require 'includes/db.php';
require 'validate.php';
require 'bronze_tier_customer.php';
require 'silver_tier_customer.php';
require 'gold_tier_customer.php';

$databaseConnection = new DatabaseConnection('localhost', 'customer_crud_app', 'root', '');
$conn = $databaseConnection->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = validate_input($_POST['first_name']);
    $last_name = validate_input($_POST['last_name']);
    $email = validate_email(validate_input($_POST['email'])) ? validate_input($_POST['email']) : null;
    $phone_number = validate_input($_POST['phone_number']);
    $street = validate_input($_POST['street']);
    $city = validate_input($_POST['city']);
    $state = validate_input($_POST['state']);
    $zip_code = validate_input($_POST['zip_code']);
    $loyalty_program_tier_type = validate_input($_POST['loyalty_program_tier_type']);


if ($email) {
    if ($loyalty_program_tier_type == 'bronze') {
        $customer = new BronzeTierCustomer($conn);
    } 
    else if ($loyalty_program_tier_type == 'silver') {
        $customer = new SilverTierCustomer($conn);
    }
    else {
        $customer = new GoldTierCustomer($conn);
    }
    if ($customer->create($name, $email, $phone_number, $street, $city, $state, $zip_code)) {
        echo "Customer created successfully.";
    } else {
        echo "Error creating customer.";
    }
} else {
    echo "Invalid email.";
}
}

?>

<form method="POST" action="create.php">
    <input type="text" name="first_name" placeholder="First Name" required>
    <input type="text" name="last_name" placeholder="Last Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="phone_number" placeholder="Phone Number">
    <textarea name="street" placeholder="Street"></textarea>
    <textarea name="city" placeholder="City"></textarea>
    <textarea name="state" placeholder="State"></textarea>
    <textarea name="zip_code" placeholder="Zip Code"></textarea>
    <select name="loyalty_program_tier_type">
        <option value="bronze">Bronze</option>
        <option value="silver">Silver</option>
        <option value="gold">Gold</option>
    </select>
    <button type="submit">Create</button>
</form>
