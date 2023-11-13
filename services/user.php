<?php
    require_once '../constants/header.php';
    require_once '../config/database.php';
    require_once '../services/jwtHandler.php';
    require_once '../models/user.php';
    function getUserData($userId) {
        $headers = getallheaders();      
        if (array_key_exists('Authorization', $headers) && preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {
          $admin = checkAdmin($matches[1]);      
          if ($admin) {
            $user = new User();
            $userData = $user->getUser($userId);     
            if ($userData) {
              $name = $userData['name']; 
              $email = $userData['email']; 
              sendJson(200, 'User data retrieved successfully', ['name' => $name, 'email' => $email]);
            } else {
              sendJson(500, 'Failed to retrieve user data.');
            }
          } 
         else {
          sendJson(403, 'Authorization Token is Missing!');
        }
      }
