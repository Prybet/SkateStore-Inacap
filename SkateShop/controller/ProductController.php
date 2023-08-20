<?php

require_once '../../SkateShop/models/Product.php';
require_once '../../SkateShop/models/ShopCart.php';
require_once '../../SkateShop/models/User.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    //Product Page
    $idProd = isset($_GET["prod"]) ? $_GET["prod"] : 0;

    if ($idProd > 0) {

        $allProds = $_SESSION["allProds"];
        foreach ($allProds as $p) {
            if ($p->getId() == $idProd) {
                $prod = $p;
            }
        }
        $_SESSION["prod"] = $prod;
        header("Location: ../../SkateShop/views/product.php");
    } else {
        header("location: ../base/index.php");
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Add To Cart
    if ($_POST["add"] != null) {
        $idProd = isset($_POST["add"]) ? $_POST["add"] : 0;
        $allProds = $_SESSION["allProds"];
        $prod = new Product();
        foreach ($allProds as $p) {
            if ($p->getId() == $idProd) {
                $prod = $p;
            }
        }
        $item = new CartItem();
        $cart = $_SESSION["cart"];

        $item->product = $prod;
        $item->amount = isset($_POST["amount"]) ? $_POST["amount"] : 1;
        if ($prod != null) {
            $cart->itemsList[] = $item;
            $_SESSION["cart"] = $cart;
            $_SESSION["user"]->cart = $cart;
            if ($_SESSION["user"]->username != "guest") {
                $user = $_SESSION["user"];
                if ($user->cart->id != 0) {
                    $_SESSION["user"] = $user->setItem($user->cart->id, $item);
                } else {
                    $_SESSION["user"] = $user->setCart($cart);
                }
            }
            header("location: ../views/store.php");
        } else {
            header("location: ../base/index.php");
        }
    }
    if ($_POST["delete"] != null) {
        $list = $_SESSION["user"]->cart->itemsList;
        $pos = $_POST["delete"];
        $item = $list[$pos];
        if ($_SESSION["user"]->username != "guest") {
            $user = $_SESSION["user"]->quitItem($item);
            $_SESSION["user"] = $user;
            $_SESSION["cart"] = $user->cart;
             header("location: " . $_SESSION["current"]);
        } else {
            unset($list[$pos]);
            $_SESSION["user"]->cart->itemsList = $list;
            $_SESSION["cart"] = $_SESSION["user"]->cart;
            header("location: " . $_SESSION["current"]);
        }
    }
}


