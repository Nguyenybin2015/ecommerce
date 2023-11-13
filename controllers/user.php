<?php
require_once '../constants/header.php';
require_once '../config/database.php';
require_once '../services/jwtHandler.php';
require_once '../services/product.php';
require_once '../models/admin.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    getUserData();
}
else {
    sendJson(405, 'Invalid Request Method. HTTP method should be POST or PUT');
  }