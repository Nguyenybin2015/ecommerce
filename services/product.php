<?php
require_once '../constants/header.php';
require_once '../config/database.php';
require_once '../services/jwtHandler.php';
require_once '../models/admin.php';
function addProduct()
{

  $headers = getallheaders();
  if (array_key_exists('Authorization', $headers) && preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {
    $admin = checkAdmin($matches[1]);
    $data = json_decode(file_get_contents('php://input'));

    $requiredFields = [
      'nameProduct',
      'priceProduct',
      'idSizeProduct',
      'idColorProduct',
      'idBrandProduct',
      'descriptionProduct',
      'amountProduct'
    ];

    if (isset($_FILES['imageFile'])) {
      $targetDirectory = "../public/img/"; // Replace with your target directory
      $targetFile = $targetDirectory . basename($_FILES["imageFile"]["name"]);

      // You may want to add more validation and checks here for security and file type

      if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $targetFile)) {
        // The file has been successfully uploaded, proceed to save the other data
        $imageProduct = $targetFile;

        // Retrieve other product information
        $nameProduct = trim($data->nameProduct);
        $priceProduct = trim($data->priceProduct);
        $idSizeProduct = trim($data->idSizeProduct);
        $idColorProduct = trim($data->idColorProduct);
        $idBrandProduct = trim($data->idBrandProduct);
        $descriptionProduct = trim($data->descriptionProduct);
        $amountProduct = trim($data->amountProduct);

        // Instantiate the Admin class and add product
        $admin = new Admin();
        $add = $admin->addProduct(
          $nameProduct,
          $priceProduct,
          $imageProduct,
          $idSizeProduct,
          $idColorProduct,
          $idBrandProduct,
          $descriptionProduct,
          $amountProduct
        );

        if ($add) {
          sendJson(201, 'Product added successfully!');
        } else {
          sendJson(500, 'Failed to add the product.');
        }
      } else {
        sendJson(500, 'Failed to upload the file.');
      }
    } else {
      sendJson(422, 'Image file is required.');
    }
  } else {
    sendJson(403, "Authorization Token is Missing!");
  }
}

function updateProduct() {
  $headers = getallheaders();
  if (array_key_exists('Authorization', $headers) && preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {
      $admin = checkAdmin($matches[1]);
      $data = json_decode(file_get_contents('php://input'));
      $imageProduct = '';

      if ($admin) {
          $requiredFields = [
              'nameProduct',
              'priceProduct',
              'idSizeProduct',
              'idColorProduct',
              'idBrandProduct',
              'descriptionProduct',
              'id_shoe'
          ];

          // Handle file upload
          if (isset($_FILES['imageFile'])) {
              $targetDirectory = "../public/img/"; // Replace with your target directory
              $targetFile = $targetDirectory . basename($_FILES["imageFile"]["name"]);

              // You may want to add more validation and checks here for security and file type

              if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $targetFile)) {
                  // The file has been successfully uploaded
                  $imageProduct = $targetFile;
              } else {
                  sendJson(500, 'Failed to upload the file.');
              }
          } else {
              sendJson(422, 'Image file is required.');
          }

          $nameProduct = trim($data->nameProduct);
          $priceProduct = trim($data->priceProduct);
          $idSizeProduct = trim($data->idSizeProduct);
          $idColorProduct = trim($data->idColorProduct);
          $idBrandProduct = trim($data->idBrandProduct);
          $descriptionProduct = trim($data->descriptionProduct);
          $id_shoe = trim($data->id_shoe);
          $amountProduct = trim($data->amountProduct);

          // Instantiate the Admin class and update the product
          $admin = new Admin();
          $update = $admin->updateProduct(
              $nameProduct,
              $priceProduct,
              $idSizeProduct,
              $idColorProduct,
              $imageProduct,
              $idBrandProduct,
              $descriptionProduct,
              $id_shoe,
              $amountProduct
          );

          if ($update) {
              sendJson(200, 'Update product success!');
          } else {
              sendJson(500, 'Failed to update the product.');
          }
      }
  } else {
      sendJson(403, "Authorization Token is Missing!");
  }
}