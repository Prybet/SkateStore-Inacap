<?php

require_once '../models/User.php';
require_once '../models/Product.php';
require_once '../models/ProductType.php';
require_once '../models/Status.php';
session_start();
if ($_SESSION["user"]->username == "guest" || $_SESSION["user"]->status->name != "Admin") {
    header("location: ../base/index.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["submit"] == "insert") {
        
        $sta = new Status();
        $pt = new ProductType;
        
        $prod = new Product();
        $prod->name = isset($_POST["name"]) ? $_POST["name"] : "none";
        $prod->description = isset($_POST["desc"]) ? $_POST["desc"] : "none";
        $prod->price = isset($_POST["price"]) ? $_POST["price"] : 0;
        $prod->stock = isset($_POST["stock"]) ? $_POST["stock"] : 0;
        $ids = isset($_POST["status"]) ? $_POST["status"] : 0;
        $prod->status = $sta->getById($ids);
        $idt = isset($_POST["ptype"]) ? $_POST["ptype"] : 0;
        $prod->productType = $pt->getById($idt);
        $prod->imageUrl = isset($_POST["imageUrl"]) ? $_POST["imageUrl"] : "none";
        
        $_SESSION["AdminProdList"] = $prod->insert();
            
        header("location: ../views/aPage.php");
    }
}