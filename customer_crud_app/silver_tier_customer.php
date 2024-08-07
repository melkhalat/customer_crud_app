<?php
require_once 'customer.php';

class SilverTierCustomer extends Customer {
    public function create($first_name, $last_name, $email, $phone_number, $street, $city, $state, $zip_code, $loyalty_program_tier_type = 'silver') {
        return parent::create($first_name, $last_name, $email, $phone_number, $street, $city, $state, $zip_code, $loyalty_program_tier_type);
    }
}
?>


