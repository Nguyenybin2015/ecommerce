<?php
require_once '../services/jwtHandler.php';
// demo
function add ($token){
  if (checkAdmin($token) == 1) {
    # them sp
  }
  else {
    echo 'Loi';
  }
}