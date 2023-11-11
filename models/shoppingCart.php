<?php
require_once '../config/database.php';
require_once '../models/product.php';


class ShoppingCart
{
  private $db;
  private $connection;
  public function __construct()
  {
    $this->db = new DatabaseService();
    $this->connection = $this->db->getConnection();
  }
  function addProduct($id_user, $id_shoe, $quantity){
    $id_order = uniqid();

    $sql = "INSERT INTO `order`(`id_order`, `id_user`, `id_shoe`, `quantity`) 
            VALUES('$id_order', '$id_user', '$id_shoe', '$quantity')";
    
    return mysqli_query($this->connection, $sql);
  }
  
  function removeProduct($delParams){
    $id_order = mysqli_real_escape_string($this->connection, $delParams['id_order']);

    $sql = "DELETE FROM `order` WHERE `id_order` = '$id_order'";
    return mysqli_query($this->connection, $sql);
  }

  function updateProductQuantity($quantityParams){
    $id_order = mysqli_real_escape_string($this->connection, $quantityParams['id_order']);
    $quantity = mysqli_real_escape_string($this->connection, $quantityParams['quantity']);

    $sql = "UPDATE `order`
            SET `quantity` = '$quantity'  
            WHERE `id_order` = '$id_order'";
    return mysqli_query($this->connection, $sql);
  }
  function getAllProduct($getParams){
    $id_user = mysqli_real_escape_string($this->connection, $getParams['id_user']);

    $temp = new Product();
    $arrShoe = array();

    $sql = "SELECT `id_shoe`, `quantity` 
            FROM `order`
            WHERE `id_user` = '$id_user'";
            
    $query = mysqli_query($this->connection, $sql);

    if (mysqli_num_rows($query) > 0) {
      while($row = mysqli_fetch_assoc($query)) {
          array_push($arrShoe, $temp->getOrderProduct($row["id_shoe"]));
      }
    } 
  return $arrShoe;
  }
}