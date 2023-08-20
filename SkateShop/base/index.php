<?php

require_once '../../SkateShop/models/User.php';
require_once '../../SkateShop/models/ShopCart.php';
require_once '../../SkateShop/models/Product.php';
session_start();
$p = new Product();
$_SESSION["itemsList"] = $p->getAll();
$user = new User();
if ($_SESSION["user"] == null || $_SESSION["user"]->getId() === 0 || $_SESSION["user"]->username == "guest") {
    $user->setUsername("guest");
    $cart = new ShopCart();
    $_SESSION["cart"] = $cart;
    $_SESSION["user"] = $user;
} else {
    $_SESSION["cart"] = $_SESSION["user"]->cart;
    if ($_SESSION["user"]->status->name == "Admin") {
        require_once '../../SkateShop/models/Product.php';
        $p = new Product();
        $_SESSION["AdminProdList"] = $p->getAdminAll();
        header("location: ../views/aPage.php");
        return;
    }
}
header("Location: ../views/store.php");

