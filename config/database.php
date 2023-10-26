<?php
include_once './config/schema.php';
class DatabaseService
{

    private $db_host = "localhost";
    private $db_name = "ecommerce";
    private $db_user = "root";
    private $db_password = "";
    private $connection;

    public function getConnection()
    {
        $this->connection = new mysqli($this->db_host, $this->db_user, '', $this->db_name);
        if ($this->connection->connect_errno) {
            echo "Failed to connect to MySQL: " . $this->connection->connect_error;
        }
        echo 'Successfully connected to MySQL';
        return $this->connection;
    }
}