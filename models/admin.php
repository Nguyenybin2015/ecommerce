<?php

require_once '../services/jwtHandler.php';
require_once '../config/database.php';

class InformationMapper
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function addInformation($imageProduct, $amountProduct, $idSizeProduct, $idColorProduct, $idBrandProduct, $descriptionProduct)
    {
        $id_information = uniqid();

        $sql = "INSERT INTO `information` (`id_information`, `image`, `amount`, `id_size`, `id_color`, `id_brand`, `description`) 
                VALUES ('$id_information', '$imageProduct', '$amountProduct', '$idSizeProduct', '$idColorProduct', '$idBrandProduct', '$descriptionProduct')";

        $result = mysqli_query($this->connection, $sql);

        return $result ? $id_information : false;
    }
}

class ShoesMapper
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function addShoes($nameProduct, $priceProduct, $id_information)
    {
        $sql = "INSERT INTO `shoes` (`name`, `price`, `id_information`) 
                VALUES ('$nameProduct', '$priceProduct', '$id_information')";

        return mysqli_query($this->connection, $sql);
    }

    public function updateShoes($productParams)
    {
        $id_shoe = mysqli_real_escape_string($this->connection, $productParams['id_shoe']);
        $nameProduct = mysqli_real_escape_string($this->connection, $productParams['nameProduct']);
        $priceProduct = mysqli_real_escape_string($this->connection, $productParams['priceProduct']);
        $idSizeProduct = mysqli_real_escape_string($this->connection, $productParams['idSizeProduct']);
        $idColorProduct = mysqli_real_escape_string($this->connection, $productParams['idColorProduct']);
        $idBrandProduct = mysqli_real_escape_string($this->connection, $productParams['idBrandProduct']);
        $description = mysqli_real_escape_string($this->connection, $productParams['description']);

        $sql = "UPDATE `shoes`, `information`
                SET `shoes`.`name` = '$nameProduct',
                    `shoes`.`price` = '$priceProduct',
                    `information`.`id_size` = '$idSizeProduct',
                    `information`.`id_color` = '$idColorProduct',
                    `information`.`id_brand` = '$idBrandProduct',
                    `information`.`description` = '$description'  
                WHERE `shoes`.`id_shoe`= '$id_shoe'";
        return mysqli_query($this->connection, $sql);
    }

    public function deleteShoes($id_shoe)
    {
        $id_shoe = mysqli_real_escape_string($this->connection, $id_shoe);

        $sql = "DELETE FROM `shoes` WHERE `id_shoe`= '$id_shoe'";

        return mysqli_query($this->connection, $sql);
    }
}

class Admin
{
    private $db;
    private $informationMapper;
    private $shoesMapper;

    public function __construct()
    {
        $this->db = new DatabaseService();
        $this->informationMapper = new InformationMapper($this->db->getConnection());
        $this->shoesMapper = new ShoesMapper($this->db->getConnection());
    }

    public function addProduct($nameProduct, $priceProduct, $imageProduct, $idSizeProduct, $idColorProduct, $idBrandProduct, $descriptionProduct, $amountProduct)
    {
        $id_information = $this->informationMapper->addInformation($imageProduct, $amountProduct, $idSizeProduct, $idColorProduct, $idBrandProduct, $descriptionProduct);

        if ($id_information !== false) {
            return $this->shoesMapper->addShoes($nameProduct, $priceProduct, $id_information);
        } else {
            return false;
        }
    }

    public function updateProduct($updateParams)
    {
        return $this->shoesMapper->updateShoes($updateParams);
    }

    public function delProduct($delParams)
    {
        return $this->shoesMapper->deleteShoes($delParams['id_shoe']);
    }
}
