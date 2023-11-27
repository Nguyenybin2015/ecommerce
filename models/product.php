<?php

require_once '../config/database.php';

class ProductMapper
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getProductById($id_shoe)
    {
        $id_shoe = mysqli_real_escape_string($this->connection, $id_shoe);

        $sql = "SELECT *
                FROM `shoes` INNER JOIN `information` ON `information`.`id_information` = `shoes`.`id_information`
                WHERE `shoes`.`id_shoe` = '$id_shoe'";

        $query = mysqli_query($this->connection, $sql);
        return mysqli_fetch_assoc($query);
    }

    public function getAllProducts()
    {
        $arrShoe = array();

        $sql = "SELECT *
                FROM `shoes` INNER JOIN `information` ON `information`.`id_information` = `shoes`.`id_information`";

        $query = mysqli_query($this->connection, $sql);

        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                array_push($arrShoe, $row);
            }
        }

        return $arrShoe;
    }
}

class Product
{
    private $db;
    private $productMapper;

    public function __construct()
    {
        $this->db = new DatabaseService();
        $this->productMapper = new ProductMapper($this->db->getConnection());
    }

    public function getProduct($getParams)
    {
        $id_shoe = $getParams['id_shoe'];
        return $this->productMapper->getProductById($id_shoe);
    }

    public function getAllProduct()
    {
        return $this->productMapper->getAllProducts();
    }

    public function getOrderProduct($id_shoe)
    {
        return $this->productMapper->getProductById($id_shoe);
    }
}
