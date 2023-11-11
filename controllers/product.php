<?php
require_once '../constants/header.php';
require_once '../config/database.php';
require_once '../services/jwtHandler.php';
require_once '../services/product.php';
require_once '../models/admin.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  addProduct();
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
  getProduct($_GET);
} elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE'){
  delProduct($_GET);
}else {
  sendJson(405, 'Invalid Request Method. HTTP method should be POST or PUT');
}
