<?php
require_once '../config/database.php';
class Product
{
  private $db;
  private $connection;
  public function __construct()
  {
    $this->db = new DatabaseService();
    $this->connection = $this->db->getConnection();
  }

  function getProduct($getParams)
  {
    $id_shoe = mysqli_real_escape_string($this->connection, $getParams['id_shoe']);

    $sql = "SELECT *
            FROM `shoes` inner join `information` on `information`.`id_information` = `shoes`.`id_information`
            WHERE `shoes`.`id_shoe`= '$id_shoe'";

    $query = mysqli_query($this->connection, $sql);
    return mysqli_fetch_assoc($query);
  }
  function getAllProduct()
  {
    $arrShoe = array();

    $sql = "SELECT *
            FROM `shoes` inner join `information` on `information`.`id_information` = `shoes`.`id_information`";

    $query = mysqli_query($this->connection, $sql);
    if (mysqli_num_rows($query) > 0) {
      while ($row = mysqli_fetch_assoc($query)) {
        array_push($arrShoe, $row);
      }
    }
    return $arrShoe;
  }

  function getOrderProduct($id_shoe)
  {
    $sql = "SELECT *
            FROM `shoes` inner join `information` on `information`.`id_information` = `shoes`.`id_information`
            WHERE `shoes`.`id_shoe`= '$id_shoe'";

    $query = mysqli_query($this->connection, $sql);
    return mysqli_fetch_assoc($query);
  }
}
