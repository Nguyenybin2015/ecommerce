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
      $targetDirectory = "../public/img/"; // Replace with your target directory
      $dirFile = "/ecommerce/public/img/". basename($_FILES["imageFile"]["name"]);
      $targetFile = $targetDirectory . basename($_FILES["imageFile"]["name"]);

      // You may want to add more validation and checks here for security and file type

      if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $targetFile)) {
        // The file has been successfully uploaded, proceed to save the other data
        $imageProduct = $dirFile;

      $nameProduct = trim($_POST['nameProduct']);
      $priceProduct = trim($_POST['priceProduct']);
      $idSizeProduct = trim($_POST['idSizeProduct']);
      $idColorProduct = trim($_POST['idColorProduct']);
      $idBrandProduct = trim($_POST['idBrandProduct']);
      $descriptionProduct = trim($_POST['descriptionProduct']);
      $amountProduct = trim($_POST['amountProduct']);
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

function delProduct($delParams) {
  $headers = getallheaders();

    if (array_key_exists('Authorization', $headers) && preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {
      $admin = checkAdmin($matches[1]);

<<<<<<< HEAD
        if ($admin) {
            parse_str(file_get_contents("php://input"), $_GET);

            // Retrieve data from $_PUT
            $nameProduct = isset($_GET['nameProduct']) ? trim($_GET['nameProduct']) : '2';
            $priceProduct = isset($_GET['priceProduct']) ? trim($_GET['priceProduct']) : '2';
            $idSizeProduct = isset($_GET['idSizeProduct']) ? trim($_GET['idSizeProduct']) : '2';
            $idColorProduct = isset($_GET['idColorProduct']) ? trim($_GET['idColorProduct']) : '2';
            $idBrandProduct = isset($_GET['idBrandProduct']) ? trim($_GET['idBrandProduct']) : '2';
            $descriptionProduct = isset($_GET['descriptionProduct']) ? trim($_GET['descriptionProduct']) : '2';
            $id_shoe = isset($_GET['id_shoe']) ? trim($_GET['id_shoe']) : '2';
            $amountProduct = isset($_GET['amountProduct']) ? trim($_GET['amountProduct']) : '2';
            $imageProduct = ''; // Initialize to empty string

            // Handle file upload
            if (isset($_FILES['imageFile'])) {
                $targetDirectory = "../public/img/"; // Replace with your target directory
                $dirFile = "/ecommerce/public/img/" . basename($_FILES["imageFile"]["name"]);
                $targetFile = $targetDirectory . basename($_FILES["imageFile"]["name"]);

                // You may want to add more validation and checks here for security and file type

                if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $targetFile)) {
                    // The file has been successfully uploaded
                    $imageProduct = $dirFile;
                } else {
                    sendJson(500, 'Failed to upload the file.');
                }
            }

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
        } else {
            sendJson(403, "Authorization Token is Missing!");
        }
    }
}
=======
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

function getProduct($getParams){
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
>>>>>>> 923a3906bf8b749a4e98a057b5926ead2dbf367a
