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

//     function updateProduct($nameProduct, $priceProduct, $idSizeProduct, $idColorProduct, $imageProduct, $idBrandProduct, $descriptionProduct, $id_shoe, $amountProduct)
// {
//     $id_information = uniqid();

//     // Update `information` table
//     $sqlInfo = "UPDATE `information`
//                 SET `image` = '$imageProduct',
//                     `amount` = '$amountProduct',
//                     `id_size` = '$idSizeProduct',
//                     `id_color` = '$idColorProduct',
//                     `id_brand` = '$idBrandProduct',
//                     `description` = '$descriptionProduct'
//                 WHERE `id_information` = '$id_information'";

//     // Update `shoes` table
//     $sqlShoes = "UPDATE `shoes`
//                  SET `name` = '$nameProduct',
//                      `price` = '$priceProduct',
//                      `id_information` = '$id_information'
//                  WHERE `id_shoe` = '$id_shoe'";

//     // Perform the queries
//     $resultInfo = mysqli_query($this->connection, $sqlInfo);
//     $resultShoes = mysqli_query($this->connection, $sqlShoes);

//     // Check for errors
//     if ($resultInfo && $resultShoes) {
//         return true;
//     } else {
//         return false;
//     }
// }

function updateProduct($nameProduct, $priceProduct, $idSizeProduct, $idColorProduct, $imageProduct, $idBrandProduct, $descriptionProduct, $id_shoe, $amountProduct)
{
  $id_information = uniqid();

    // Update `information` table
    $sqlInfo = "UPDATE `information`
                SET `image` = '$imageProduct',
                    `amount` = '$amountProduct',
                    `id_size` = '$idSizeProduct',
                    `id_color` = '$idColorProduct',
                    `id_brand` = '$idBrandProduct',
                    `description` = '$descriptionProduct'
                WHERE `id_information` = '$id_information'";

    // Update `shoes` table
    $sqlShoes = "UPDATE `shoes`
                 SET `name` = '$nameProduct',
                     `price` = '$priceProduct',
                     `id_information` = '$id_information'
                 WHERE `id_shoe` = '$id_shoe'";

    // Prepare the statements
    $stmtInfo = mysqli_prepare($this->connection, $sqlInfo);
    $stmtShoes = mysqli_prepare($this->connection, $sqlShoes);

    if ($stmtInfo && $stmtShoes) {
        // Bind parameters for `information` table
        mysqli_stmt_bind_param($stmtInfo, "sssssss", $imageProduct, $amountProduct, $idSizeProduct, $idColorProduct, $idBrandProduct, $descriptionProduct, $id_information);

        // Bind parameters for `shoes` table
        mysqli_stmt_bind_param($stmtShoes, "ssss", $nameProduct, $priceProduct, $id_information, $id_shoe);

        // Execute the statements
        $resultInfo = mysqli_stmt_execute($stmtInfo);
        $resultShoes = mysqli_stmt_execute($stmtShoes);

        // Check for errors
        if ($resultInfo && $resultShoes) {
            mysqli_stmt_close($stmtInfo);
            mysqli_stmt_close($stmtShoes);
            return true;
        }
    }

    // Close the statements in case of an error
    mysqli_stmt_close($stmtInfo);
    mysqli_stmt_close($stmtShoes);

    return false;
}


  
  function delProduct($id_shoe, $colWhere, $valueWhere)
  {
    $sql = "DELETE `shoes`, `information`
            FROM `shoes` inner join `information` on `information`.`id_information` = `shoes`.`id_information`
            WHERE `shoes`.`id_shoe`= '$id_shoe'";
    return mysqli_query($this->connection, $sql);
  }
}