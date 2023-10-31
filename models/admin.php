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
  function addProduct($nameProduct, $priceProduct, $imageProduct, $idSizeProduct, $idColorProduct, $idBrandProduct, $descriptionProduct)
  {
    $id_information = uniqid();

    $sql = "INSERT INTO `information`(`id_information`, 'image',`id_size`,`id_color`,'id_brand','description') 
            VALUES('$id_information', '$imageProduct', '$idSizeProduct', '$idColorProduct','$idBrandProduct', '$descriptionProduct');
            INSERT INTO `shoes`(`name`,`price`,`id_information`) 
            VALUES('$nameProduct','$priceProduct','$id_information')";
    $query = mysqli_query($this->connection, $sql);
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
                `information`.`description` = '$descriptionProduct'  

            WHERE `information`.`id_information` = `shoes`.`id_information`
            AND `shoes`.`id_shoe`= '$id_shoe'";
    return mysqli_query($this->connection, $sql);
  }
  function delProduct($id_shoe, $colWhere, $valueWhere)
  {
    $sql = "DELETE `shoes`, `information`
            FROM `shoes` inner join `information` on `information`.`id_information` = `shoes`.`id_information`
            WHERE `shoes`.`id_shoe`= '$id_shoe'";
    return mysqli_query($this->connection, $sql);
  }
}