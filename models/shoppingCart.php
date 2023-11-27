<?php

require_once '../config/database.php';
require_once '../models/product.php';

class OrderRepository
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function addOrder($id_user, $id_shoe, $quantity)
    {
        $id_order = uniqid();

        $sql = "INSERT INTO `order`(`id_order`, `id_user`, `id_shoe`, `quantity`) 
                VALUES('$id_order', '$id_user', '$id_shoe', '$quantity')";

        return mysqli_query($this->connection, $sql);
    }

    public function removeOrder($id_order)
    {
        $id_order = mysqli_real_escape_string($this->connection, $id_order);

        $sql = "DELETE FROM `order` WHERE `id_order` = '$id_order'";
        return mysqli_query($this->connection, $sql);
    }

    public function updateOrderQuantity($id_order, $quantity)
    {
        $id_order = mysqli_real_escape_string($this->connection, $id_order);
        $quantity = mysqli_real_escape_string($this->connection, $quantity);

        $sql = "UPDATE `order`
                SET `quantity` = '$quantity'  
                WHERE `id_order` = '$id_order'";
        return mysqli_query($this->connection, $sql);
    }

    public function getAllOrdersByUser($id_user)
    {
        $id_user = mysqli_real_escape_string($this->connection, $id_user);

        $sql = "SELECT `id_order`, `id_shoe`, `quantity` 
                FROM `order`
                WHERE `id_user` = '$id_user'";

        $query = mysqli_query($this->connection, $sql);
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    }
}

class ShoppingCart
{
    private $db;
    private $orderRepository;
    private $product;

    public function __construct()
    {
        $this->db = new DatabaseService();
        $this->orderRepository = new OrderRepository($this->db->getConnection());
        $this->product = new Product();
    }

    public function addProduct($id_user, $id_shoe, $quantity)
    {
        return $this->orderRepository->addOrder($id_user, $id_shoe, $quantity);
    }

    public function removeProduct($delParams)
    {
        return $this->orderRepository->removeOrder($delParams['id_order']);
    }

    public function updateProductQuantity($quantityParams)
    {
        return $this->orderRepository->updateOrderQuantity($quantityParams['id_order'], $quantityParams['quantity']);
    }

    public function getAllProduct($getParams)
    {
        $id_user = $getParams['id_user'];
        $arrOrders = $this->orderRepository->getAllOrdersByUser($id_user);
        
        $arrShoe = array();
        foreach ($arrOrders as $order) {
            $arrShoe[] = $this->product->getOrderProduct($order['id_shoe']);
        }

        return $arrShoe;
    }
}
