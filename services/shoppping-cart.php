<?php
require_once '../models/shoppingCart.php';

function getAllProduct()
{

  $headers = getallheaders();
  if (array_key_exists('Authorization', $headers) && preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {
    $data = json_decode(file_get_contents('php://input'));

    $id_user = decodeDataToken($matches[1]);

    $shoppingCart = new ShoppingCart();
    $getAll = $shoppingCart->getAllProduct($id_user);

    if ($getAll) {
      sendJson(201, 'Successfully!', $getAll);
    } else {
      sendJson(500, 'Failed to add the product.');
    }
  } else {
    sendJson(403, "Authorization Token is Missing!");
  }
}
function addProduct()
{

  $headers = getallheaders();
  if (array_key_exists('Authorization', $headers) && preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {
    $data = json_decode(file_get_contents('php://input'));

    $requiredFields = [
      'idShoe',
      'quantity'
    ];
    $id_user = decodeDataToken($matches[1]);
    $id_shoe = trim($data->idShoe);
    $quantity = trim($data->quantity);

    $shoppingCart = new ShoppingCart();
    $add = $shoppingCart->addProduct($id_user, $id_shoe, $quantity);

    if ($add) {
      sendJson(201, 'Product added to shopping cart successfully!');
    } else {
      sendJson(500, 'Failed to add the product.');
    }
  } else {
    sendJson(403, "Authorization Token is Missing!");
  }
}
function updateProductQuantity()
{

  $headers = getallheaders();
  if (array_key_exists('Authorization', $headers) && preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {
    $data = json_decode(file_get_contents('php://input'));

    $requiredFields = [
      'idOrder',
      'quantity'
    ];
    $id_order = trim($data->idOrder);
    $quantity = trim($data->quantity);

    $shoppingCart = new ShoppingCart();
    $updateQuantity = $shoppingCart->updateProductQuantity($id_order, $quantity);

    if ($updateQuantity) {
      sendJson(201, 'Product in cart updated successfully!');
    } else {
      sendJson(500, 'Failed to add the product.');
    }
  } else {
    sendJson(403, "Authorization Token is Missing!");
  }
}
function removeProduct()
{

  $headers = getallheaders();
  if (array_key_exists('Authorization', $headers) && preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {
    $data = json_decode(file_get_contents('php://input'));

    $requiredFields = [
      'idOrder'
    ];
    $id_order = trim($data->idOrder);

    $shoppingCart = new ShoppingCart();
    $remove = $shoppingCart->removeProduct($id_order);

    if ($remove) {
      sendJson(201, 'Product in cart removed successfully!');
    } else {
      sendJson(500, 'Failed to add the product.');
    }
  } else {
    sendJson(403, "Authorization Token is Missing!");
  }
}
