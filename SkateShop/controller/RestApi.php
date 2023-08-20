<?php
require '../db/PDOConnection.php';
require '../models/User.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $body = file_get_contents('php://input');
    $params = json_decode($body);
    
    if($params->username != "" && $params->password != ""){
        $user = new User();
        $user->setUsername($params->username);
        $user->setPassword($params->password);
        if($user->getLogin()){
            $user = $_SESSION["user"];
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode($user, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
        }else{
            $user = null;
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode($user, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
        }
    }
    if($params->username == "" && $params->password == "" && $params->action == "inner"){
        
    }
    
    
    
}elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    
    $p = new Product;
    $datos = $p->getAll();
    header("Content-Type: application/json; charset=UTF8");
    echo json_encode($datos, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
    
}elseif ($_SERVER["REQUEST_METHOD"] == "PUT"){
    
    $body = file_get_contents('php://input');
    $params = json_decode($body);
    $user = new User();
    if($params->id == "0"){ 
        if($user->verifyUsername($params->username)){
            $resp = $user->insert($params);
        }else{
            $resp = null;
        }
        header("Content-Type: application/json; charset=UTF8");
        echo json_encode($resp, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
    }elseif (!$params->id == "0") {
        $resp = $user->update($params);
        header("Content-Type: application/json; charset=UTF8");
        echo json_encode($resp, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
    }
    
}