<?php
require_once '../services/product.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  getAllProductService();
}