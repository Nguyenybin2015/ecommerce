<?php
function getAllProduct()
{

  $headers = getallheaders();
  if (array_key_exists('Authorization', $headers) && preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {
    $data = json_decode(file_get_contents('php://input'));

    $requiredFields = [
      'idUser',
      'idShoe'
    ];
    $id_user = trim($data->idUser);
    $id_shoe = trim($data->idShoe);

    // $add = $admin->addProduct();

    if ($add) {
      sendJson(201, 'Product added successfully!');
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
      'idUser',
      'idShoe'
    ];
    $id_user = trim($data->idUser);
    $id_shoe = trim($data->idShoe);

    // $add = $admin->addProduct();

    if ($add) {
      sendJson(201, 'Product added successfully!');
    } else {
      sendJson(500, 'Failed to add the product.');
    }
  } else {
    sendJson(403, "Authorization Token is Missing!");
  }
}
function updateProduct()
{

  $headers = getallheaders();
  if (array_key_exists('Authorization', $headers) && preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {
    $data = json_decode(file_get_contents('php://input'));

    $requiredFields = [
      'idUser',
      'idShoe'
    ];
    $id_user = trim($data->idUser);
    $id_shoe = trim($data->idShoe);

    // $add = $admin->addProduct();

    if ($add) {
      sendJson(201, 'Product added successfully!');
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
      'idUser',
      'idShoe'
    ];
    $id_user = trim($data->idUser);
    $id_shoe = trim($data->idShoe);

    // $add = $admin->addProduct();

    if ($add) {
      sendJson(201, 'Product added successfully!');
    } else {
      sendJson(500, 'Failed to add the product.');
    }
  } else {
    sendJson(403, "Authorization Token is Missing!");
  }
}
