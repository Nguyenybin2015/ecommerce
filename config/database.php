<?php
class DatabaseService
{

    private $db_host = "localhost";
    private $db_name = "ecommerce";
    private $db_user = "root";
    private $db_password = "";
    private $connection;

    public function getConnection()
    {
        try {
            $this->connection = new mysqli($this->db_host, $this->db_user, '', $this->db_name);
        } catch (mysqli_sql_exception $exception) {
            echo "Failed to connect to MySQL: " . $exception->getMessage();
        }
        return $this->connection;
    }
}