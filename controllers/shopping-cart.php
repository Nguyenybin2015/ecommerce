<?php
require_once '../constants/header.php';
require_once '../config/database.php';
require_once '../services/jwtHandler.php';
require_once '../models/shoppingCart.php';
require_once '../services/shoppping-cart.php';

$db = new DatabaseService();
$connection = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  getAllProduct($_GET);
}
if($_SERVER['REQUEST_METHOD'] === 'PUT') {
  updateProductQuantity($_GET);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  addProduct();
}if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
  removeProduct($_GET);
}