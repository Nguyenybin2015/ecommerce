<?php
class User
{
  private $db;
  private $connection;
  public function __construct()
  {
    $this->db = new DatabaseService();
    $this->connection = $this->db->getConnection();
  }
}
