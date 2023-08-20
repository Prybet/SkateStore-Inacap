<?php
require '../db/PDOConnection.php';
require '../models/User.php';
    
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $body = file_get_contents('php://input');
    $params = json_decode($body);
    $user = new User();
    $user->username = $params->username;
    $user->password = $params->password;
    $item = new CartItem();
    $item->id = $params->id;
    $item->product = $params->product;
    $item->amount = $params->amount;
    $item->status = $params->status;
        
    $resp = $user->setItem($params->idCart, $item);
    header("Content-Type: application/json; charset=UTF8");
    echo json_encode($resp, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
       
}