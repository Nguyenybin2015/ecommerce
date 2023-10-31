x<?php
require_once('../constants/header.php');
require_once '../config/database.php';
require_once '../services/jwtHandler.php';

$db = new DatabaseService();
$connection = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'GET') :
    $headers = getallheaders();
    if (array_key_exists('Authorization', $headers) && preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) :
        $data = decodeDataToken($matches[1]);
        $userId = $data;
        $sql = "SELECT `id_user`,`name`,`email` FROM `users` WHERE `id_user`='$userId'";
        $query = mysqli_query($connection, $sql);
        $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
        if ($row === null) sendJson(404, 'User not found!');
        sendJson(200, '', $row);
    endif;
    sendJson(403, "Authorization Token is Missing!");

endif;

sendJson(405, 'Invalid Request Method. HTTP method should be GET');