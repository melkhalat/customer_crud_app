<?php

require_once 'includes/db.php';

class Customer {
    protected $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($first_name, $last_name, $email, $phone_number, $street, $city, $state, $zip_code, $loyalty_program_tier_type) {
        $stmt = $this->conn->prepare("INSERT INTO customer (first_name, last_name, email, phone_number, street, city, state, zip_code, loyalty_program_tier_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$first_name, $last_name, $email, $phone_number, $street, $city, $state, $zip_code, $loyalty_program_tier_type]);
    }

    public function read($id = null) {
        if ($id) {
            $stmt = $this->conn->prepare("SELECT * FROM customer WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $stmt = $this->conn->query("SELECT * FROM customer");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function update($id, $first_name, $last_name, $email, $phone_number, $street, $city, $state, $zip_code, $loyalty_program_tier_type) {
        $stmt = $this->conn->prepare("UPDATE customer SET first_name = ?, last_name = ?, email = ?, phone_number = ?, street = ?, city = ?, state = ?, zip_code = ?, loyalty_program_tier_type = ? WHERE id = ?");
        return $stmt->execute([$first_name, $last_name, $email, $phone_number, $street, $city, $state, $zip_code, $loyalty_program_tier_type, $id]);
    }
    

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM customer WHERE id = ?");
        return $stmt->execute([$id]);
    }
}



?>

