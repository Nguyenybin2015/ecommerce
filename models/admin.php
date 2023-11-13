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
  function addProduct($nameProduct, $priceProduct, $imageProduct, $idSizeProduct, $idColorProduct, $idBrandProduct, $descriptionProduct, $amountProduct)
{
    $id_information = uniqid();

    // Insert data into the 'information' table
    $sql_information = "INSERT INTO `information` (`id_information`, `image`, `amount`, `id_size`, `id_color`, `id_brand`, `description`) 
                        VALUES ('$id_information', '$imageProduct', '$amountProduct', '$idSizeProduct', '$idColorProduct', '$idBrandProduct', '$descriptionProduct')";

    // Execute the query for 'information' table
    $result_information = mysqli_query($this->connection, $sql_information);

    if ($result_information) {
        // Insert data into the 'shoes' table if the 'information' insertion was successful
        $sql_shoes = "INSERT INTO `shoes` (`name`, `price`, `id_information`) 
                      VALUES ('$nameProduct', '$priceProduct', '$id_information')";

        // Execute the query for 'shoes' table
        $result_shoes = mysqli_query($this->connection, $sql_shoes);

        // Return the result of the 'shoes' table query
        return $result_shoes;
    } else {
        // Return false if the 'information' insertion failed
        return false;
    }
}

  function delProduct($delParams)
  {
    $id_shoe = mysqli_real_escape_string($this->connection, $delParams['id_shoe']);

    $sql = "DELETE `shoes`, `information`
          FROM `shoes` inner join `information` on `information`.`id_information` = `shoes`.`id_information`
          WHERE `shoes`.`id_shoe`= '$id_shoe'";
          
    return mysqli_query($this->connection, $sql);
  }
}