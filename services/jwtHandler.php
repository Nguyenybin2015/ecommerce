<?php
require_once "../vendor/autoload.php";
require_once('../utils/sendJson.php');


use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\SignatureInvalidException;

$tokenSecret = 'my_strong_token_secret';

function encodeToken($data, $is_admin)
{
    global $tokenSecret;
    $token = array(
        'iss' => 'http://localhost/api-ecommerce/api/controllers/login.php',
        'iat' => time(),
        'exp' => time() + 3600, // 1hr
        'data' => $data,
        'isAdmin' => $is_admin
    );
    return JWT::encode($token, $tokenSecret, 'HS256');
}

function decodeDataToken($token)
{
    global $tokenSecret;
    try {
        $decode = JWT::decode($token, new Key($tokenSecret, 'HS256'));
        return $decode->data;
    } catch (ExpiredException | SignatureInvalidException $e) {
        sendJson(401, $e->getMessage());
    } catch (UnexpectedValueException | Exception $e) {
        sendJson(400, $e->getMessage());
    }
}

function checkAdmin($token)
{
    global $tokenSecret;
    try {
        $decode = JWT::decode($token, new Key($tokenSecret, 'HS256'));
        return $decode->isAdmin;
    } catch (ExpiredException | SignatureInvalidException $e) {
        sendJson(401, $e->getMessage());
    } catch (UnexpectedValueException | Exception $e) {
        sendJson(400, $e->getMessage());
    }
}