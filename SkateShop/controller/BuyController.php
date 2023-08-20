<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../models/CartItem.php';
    require_once '../models/PayMethod.php';
    require_once '../models/Product.php';
    require_once '../models/SaleDetail.php';
    require_once '../models/ShopCart.php';
    require_once '../models/User.php';

    session_start();
    $user = $_SESSION["user"];
    if ($_SESSION["user"]->username == "guest") {
        header("location: ../views/login.php");
    }
    $cart = $_SESSION["user"]->cart;
    $sale = new SaleDetail();
    $sale->dateTime = new DateTime();
    $sale->Neto = $_SESSION["neto"];
    $sale->IVA = $_SESSION["neto"] * 0.19;
    $sale->Total = $_SESSION["neto"] * 1.19;
    $sale->user = $_SESSION["user"]->id;
    $sale->shopCart = $_SESSION["user"]->cart;
    $pm = new PayMethod();
    $idt = isset($_POST["paym"]) ? $_POST["paym"] : 0;
    echo $idt;
    
    $sale->payMethod = $pm->getById($idt);
    if ($sale->setSale()) {
        $_SESSION["user"] = $_SESSION["user"]->getLogin();
        $_SESSION["cart"] = $_SESSION["user"]->cart;
    }
    header("location: ../views/store.php");
}