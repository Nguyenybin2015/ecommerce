<?php
require_once('../constants/header.php');
require_once '../config/database.php';
require_once '../services/jwtHandler.php';

$db = new DatabaseService();
$connection = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  // getAllProduct()
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // AddProduct
  // totalPriceProduct
  // choose
  // byChosenProduct

}
if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
  // UpdateProductQuantity
}
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
  // RemoveProduct
}