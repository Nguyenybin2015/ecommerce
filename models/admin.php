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
  function updateProduct()
  {
  }
  function delProduct()
  {
  }
}
