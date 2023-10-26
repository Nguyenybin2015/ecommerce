<?php
require_once('../constants/header.php');
require_once('../config/database.php');
require_once('../services/jwtHandler.php');
$db = new DatabaseService();
$connection = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') :
    
    $data = json_decode(file_get_contents('php://input'));

    if (
        !isset($data->email) ||
        !isset($data->password) ||
        empty(trim($data->email)) ||
        empty(trim($data->password))
    ) :
        sendJson(
            422,
            'Please fill all the required fields & None of the fields should be empty.',
            ['required_fields' => ['email', 'password']]
        );
    endif;


    $email = mysqli_real_escape_string($connection, trim($data->email));
    $password = trim($data->password);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) :
        sendJson(422, 'Invalid Email Address!');

    elseif (strlen($password) < 8) :
        sendJson(422, 'Your password must be at least 8 characters long!');
    endif;

    $sql = "SELECT * FROM `users` WHERE `email`='$email'";
    $query = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
    echo $row['id_user'];
    if ($row === null) sendJson(404, 'User not found! (Email is not registered)');
    if (!password_verify($password, $row['password'])) sendJson(401, 'Incorrect Password!');
    sendJson(200, '', [
        'token' => encodeToken($row['id_user'], $row['is_admin'])
    ]);
endif;

sendJson(405, 'Invalid Request Method. HTTP method should be POST');