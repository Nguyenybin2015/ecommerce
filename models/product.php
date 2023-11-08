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
  
  function getProduct($id_shoe){
    $sql = "SELECT *
            FROM `shoes` inner join `information` on `information`.`id_information` = `shoes`.`id_information`
            WHERE `shoes`.`id_shoe`= '$id_shoe'";

    $query = mysqli_query($this->connection, $sql);
    return mysqli_fetch_assoc($query);
  }

}
