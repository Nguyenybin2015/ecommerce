<?php
namespace config;
class SchemaService
{
  private $connection;
  public function createSchema()
  {
    $sql = "CREATE TABLE IF NOT EXISTS `Users` (
        `id` INT  AUTO_INCREMENT ,
        `first_name` VARCHAR(150) NOT NULL ,
        `last_name` VARCHAR(150) NOT NULL ,
        `email` VARCHAR(255),
        `password` VARCHAR(255),
        PRIMARY KEY (`id`) );";
    $this->connection->query($sql);
  }
}
