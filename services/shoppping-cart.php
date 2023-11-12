<?php
require_once '../models/shoppingCart.php';

function getAllProduct($getParams)
{
  $headers = getallheaders();

    if (array_key_exists('Authorization', $headers) && preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {

      $shoppingCart = new ShoppingCart();
      $getAll = $shoppingCart->getAllProduct($getParams);
  
      if ($getAll) {
        sendJson(200, 'Success', $getAll);
      } else {
        sendJson(500, 'Failed to get all the product.');
      }
    } else {
      sendJson(403, "Authorization Token is Missing!");
    }
}
function addProduct()
{
    // Get request headers
    $headers = getallheaders();

    // Check for Authorization header
    if (array_key_exists('Authorization', $headers) && preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {
        // Decode token
        $id_user = decodeDataToken($matches[1]);

        // Validate and sanitize input parameters
        $id_shoe = isset($_POST['id_shoe']) ? trim($_POST['id_shoe']) : null;
        $quantity = isset($_POST['quantity']) ? trim($_POST['quantity']) : null;

        // Check if required parameters are present
        if ($id_shoe !== null && $quantity !== null) {
            $shoppingCart = new ShoppingCart();
            $add = $shoppingCart->addProduct($id_user, $id_shoe, $quantity);

            // Check if the product was added successfully
            if ($add) {
                sendJson(201, 'Product added to the shopping cart successfully!');
            } else {
                sendJson(500, 'Failed to add the product.');
            }
        } else {
            // Handle missing or invalid parameters
            sendJson(400, 'Invalid or missing parameters.');
        }
    } else {
        // Handle missing Authorization header
        sendJson(403, 'Authorization Token is Missing!');
    }
}

function removeProduct($delParams)
{
  $headers = getallheaders();

  if (array_key_exists('Authorization', $headers) && preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {

    $shoppingCart = new ShoppingCart();
    $remove = $shoppingCart->removeProduct($delParams);

    if ($remove) {
      sendJson(201, 'Product delete successfully!');
    } else {
      sendJson(500, 'Failed to delete the product.');
    }
  } else {
    sendJson(403, "Authorization Token is Missing!");
  }
}

function updateProductQuantity($quantityParams){
  $headers = getallheaders();

  if (array_key_exists('Authorization', $headers) && preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {

    $shoppingCart = new ShoppingCart();
    $remove = $shoppingCart->updateProductQuantity($quantityParams);

    if ($remove) {
      sendJson(201, 'Product update successfully!');
    } else {
      sendJson(500, 'Failed to update the product.');
    }
  } else {
    sendJson(403, "Authorization Token is Missing!");
  }
}
