<?php
require_once('../constants/header.php');
require_once('../config/database.php');
require_once('../utils/sendJson.php');

$db = new DatabaseService();
$connection = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') :
    $data = json_decode(file_get_contents('php://input'));
    if (
        !isset($data->name) ||
        !isset($data->email) ||
        !isset($data->password) ||
        empty(trim($data->name)) ||
        empty(trim($data->email)) ||
        empty(trim($data->password))
    ) :
        sendJson(
            422,
            'Please fill all the required fields & None of the fields should be empty.',
            ['required_fields' => ['name', 'email', 'password']]
        );
    endif;

    $name = mysqli_real_escape_string($connection, htmlspecialchars(trim($data->name)));
    $email = mysqli_real_escape_string($connection, trim($data->email));
    $password = trim($data->password);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) :
        sendJson(422, 'Invalid Email Address!');

    elseif (strlen($password) < 8) :
        sendJson(422, 'Your password must be at least 8 characters long!');

    elseif (strlen($name) < 3) :
        sendJson(422, 'Your name must be at least 3 characters long!');

    endif;

    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "SELECT `email` FROM `users` WHERE `email`='$email'";
    $query = mysqli_query($connection, $sql);
    $row_num = mysqli_num_rows($query);

    if ($row_num > 0) sendJson(422, 'This E-mail already in use!');

    $sql = "INSERT INTO `users`(`id_user`,`name`,`email`,`password`) VALUES('test1', '$name','$email','$hash_password')";
    $query = mysqli_query($connection, $sql);
    if ($query) sendJson(201, 'You have successfully registered.');
    sendJson(500, 'Something going wrong.');
endif;

sendJson(405, 'Invalid Request Method. HTTP method should be POST');
