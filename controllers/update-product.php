<?php
require_once '../constants/header.php';
require_once '../config/database.php';
require_once '../services/jwtHandler.php';
require_once '../models/admin.php';


if ($_SERVER['REQUEST_METHOD'] == 'PUT') :
  $headers = getallheaders();
  if (array_key_exists('Authorization', $headers) && preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) :
    $admin = checkAdmin($matches[1]);
    $data = json_decode(file_get_contents('php://input'));
    if ($admin) :
      if (
        !isset($data->nameProduct) ||
        !isset($data->priceProduct) ||
        !isset($data->idSizeProduct) ||
        !isset($data->idColorProduct) ||
        !isset($data->imageProduct) ||
        !isset($data->idBrandProduct) ||
        !isset($data->descriptionProduct) ||
        !isset($data->id_shoe) ||
        empty(trim($data->nameProduct)) ||
        empty(trim($data->priceProduct)) ||
        empty(trim($data->idSizeProduct)) ||
        empty(trim($data->idColorProduct)) ||
        empty(trim($data->imageProduct)) ||
        empty(trim($data->idBrandProduct)) ||
        empty(trim($data->descriptionProduct)) ||
        empty(trim($data->id_shoe))
      ) :
        sendJson(
          422,
          'Please fill all the required fields & None of the fields should be empty.',
          ['required_fields' => ['nameProduct', 'priceProduct', 'imageProduct', 'idSizeProduct', 'idColorProduct', 'idBrandProduct', 'descriptionProduct', 'amountProduct']]
        );
      endif;
      $priceProduct = trim($data->nameProduct);
      $imageProduct = trim($data->priceProduct);
      $idSizeProduct = trim($data->idSizeProduct);
      $idColorProduct = trim($data->idColorProduct);
      $idBrandProduct = trim($data->imageProduct);
      $descriptionProduct = trim($data->idBrandProduct);
      $amountProduct = trim($data->descriptionProduct);
      $id_shoe = trim($data->id_shoe);

      $admin = new Admin();
      $addProduct = $admin->updateProduct(
        $nameProduct,
        $priceProduct,
        $idSizeProduct,
        $idColorProduct,
        $imageProduct,
        $idBrandProduct,
        $descriptionProduct,
        $amountProduct,
        $id_shoe
      );
    endif;
  endif;
  sendJson(403, "Authorization Token is Missing!");
endif;

sendJson(405, 'Invalid Request Method. HTTP method should be GET');
