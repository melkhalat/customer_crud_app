<?php

class DatabaseConnection
{
    private $server_name;
    private $db_name;
    private $username;
    private $password;
    private $conn;

    public function __construct($server_name, $db_name, $username, $password)
    {
        $this->server_name = $server_name;
        $this->db_name = $db_name;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect()
    {
        try {
            $dsn = "mysql:host={$this->server_name};dbname={$this->db_name}";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }
}
?>


