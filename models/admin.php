<?php
require_once '../services/jwtHandler.php';
require_once '../config/database.php';


class Admin
{
  private $db;
  private $connection;
  public function __construct()
  {
    $this->db = new DatabaseService();
    $this->connection = $this->db->getConnection();
  }
  function addProduct()
  {

  }
  function updateProduct($nameProduct, $priceProduct, $idSizeProduct, $idColorProduct, $imageProduct, $idBrandProduct, $descriptionProduct, $id_shoe)
  {
    $sql = "UPDATE `shoes`, `information`
            SET `shoes`.`name` = '$nameProduct',
                `shoes`.`price` = '$priceProduct',
                `information`.`id_size` = '$idSizeProduct',
                `information`.`id_color` = '$idColorProduct',
                `information`.`image` = '$imageProduct',
                `information`.`id_brand` = '$idBrandProduct',
                `information`.`description` = '$description'  
            WHERE `shoes`.`id_shoe`= '$id_shoe'";
    return mysqli_query($connection, $sql);
  }
  function delProduct($tableName, $colWhere, $valueWhere)
  {
    $sql = "DELETE FROM `shoes`, `information`
            WHERE `information`.`id_information` = `shoes`.`id_information`
            AND `shoes`.`id_shoe`= '$id_shoe'";
    return mysqli_query($connection, $sql);
  }
}