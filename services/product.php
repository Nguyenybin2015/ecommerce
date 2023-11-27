<?php
require_once '../constants/header.php';
require_once '../config/database.php';
require_once '../services/jwtHandler.php';
require_once '../models/admin.php';
require_once '../models/product.php';
function addProduct()
{

  $headers = getallheaders();
  if (array_key_exists('Authorization', $headers) && preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {
    $admin = checkAdmin($matches[1]);

    if (isset($_FILES['imageFile'])) {
      $targetDirectory = "../public/img/";
      $dirFile = "/api/public/img/" . basename($_FILES["imageFile"]["name"]);
      $targetFile = $targetDirectory . basename($_FILES["imageFile"]["name"]);


      if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $targetFile)) {
        $imageProduct = $dirFile;

        $nameProduct = trim($_POST['nameProduct']);
        $priceProduct = trim($_POST['priceProduct']);
        $idSizeProduct = trim($_POST['idSizeProduct']);
        $idColorProduct = trim($_POST['idColorProduct']);
        $idBrandProduct = trim($_POST['idBrandProduct']);
        $descriptionProduct = trim($_POST['descriptionProduct']);
        $amountProduct = trim($_POST['amountProduct']);

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
function updateProduct($productParams)
{
  $headers = getallheaders();

  if (array_key_exists('Authorization', $headers) && preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {
    $admin = checkAdmin($matches[1]);

    $admin = new Admin();
    $update = $admin->updateProduct($productParams);

    if ($update) {
      sendJson(201, 'Product update successfully!');
    } else {
      sendJson(500, 'Failed to update the product.');
    }
  } else {
    sendJson(403, "Authorization Token is Missing!");
  }
}
function delProduct($delParams)
{
  $headers = getallheaders();

  if (array_key_exists('Authorization', $headers) && preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {
    $admin = checkAdmin($matches[1]);

    $admin = new Admin();
    $add = $admin->delProduct($delParams);

    if ($add) {
      sendJson(201, 'Product delete successfully!');
    } else {
      sendJson(500, 'Failed to delete the product.');
    }
  } else {
    sendJson(403, "Authorization Token is Missing!");
  }
}

function getProduct($getParams)
{
  $headers = getallheaders();

  if (array_key_exists('Authorization', $headers) && preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {

    $product = new Product();
    $get = $product->getProduct($getParams);

    if ($get) {
      sendJson(200, 'Success', $get);
    } else {
      sendJson(500, 'Failed to get the product.');
    }
  } else {
    sendJson(403, "Authorization Token is Missing!");
  }
}
function getAllProductService()
{
  $headers = getallheaders();

  if (array_key_exists('Authorization', $headers) && preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {
    $product = new Product();
    $get = $product->getAllProduct();
    if ($get) {
      sendJson(200, 'Success', $get);
    } else {
      sendJson(500, 'Failed to get the product.');
    }
  } else {
    sendJson(403, "Authorization Token is Missing!");
  }
}
