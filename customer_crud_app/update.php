<?php

require 'includes/db.php';
require 'validate.php';
require 'customer.php';

$databaseConnection = new DatabaseConnection('localhost', 'customer_crud_app', 'root', '');
$conn = $databaseConnection->connect();

$customers = new Customer($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = validate_input($_POST['id']);
    $first_name = validate_input($_POST['first_name']);
    $last_name = validate_input($_POST['last_name']);
    $email = validate_email(validate_input($_POST['email'])) ? validate_input($_POST['email']) : null;
    $phone_number = validate_input($_POST['phone_number']);
    $street = validate_input($_POST['street']);
    $city = validate_input($_POST['city']);
    $state = validate_input($_POST['state']);
    $zip_code = validate_input($_POST['zip_code']);
    $loyalty_program_tier_type = 'bronze'; 
        if ($email && $customers->update($id, $first_name, $last_name, $email, $phone_number, $street, $city, $state, $zip_code, $loyalty_program_tier_type)) {
            echo "Customer updated successfully.";
        } else {
            echo "Error updating customer or invalid email.";
        }
    } else {
    $id = $_GET['id'];
    $customerData = $customers->read($id);
}
?>

<form method="POST" action="update.php">
    <input type="hidden" name="id" value="<?php echo $customerData['id']; ?>">
    <input type="text" name="first_name" placeholder="First Name" value="<?php echo $customerData['first_name']; ?>" required>
    <input type="text" name="last_name" placeholder="Last Name" value="<?php echo $customerData['last_name']; ?>" required>
    <input type="email" name="email" placeholder="Email" value="<?php echo $customerData['email']; ?>" required>
    <input type="text" name="phone_number" placeholder="Phone Number" value="<?php echo $customerData['phone_number']; ?>">
    <textarea name="street" placeholder="Street"><?php echo $customerData['street']; ?></textarea>
    <textarea name="city" placeholder="City"><?php echo $customerData['city']; ?></textarea>
    <textarea name="state" placeholder="State"><?php echo $customerData['state']; ?></textarea>
    <textarea name="zip_code" placeholder="Zip Code"><?php echo $customerData['zip_code']; ?></textarea>
    <button type="submit">Update</button>
</form>
