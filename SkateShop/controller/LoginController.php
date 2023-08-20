<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    require_once "../../SkateShop/models/User.php";
    session_start();

    if ($username != "" && $password != "") {
        $user = new User();
        $user->setUsername($username);
        $user->setPassword($password);

        if ($user->getLogin()) {
            $_SESSION["user"] = $user;
            header("location: ../base/index.php");
        } else {
            $_SESSION["err"] = "Usuario y/o Contraseña no valido(s)";
            header("location: ../views/login.php");
        }
    } else {
        $_SESSION["err"] = "Hay Campos vacios";
        header("location: ../views/login.php");
    }
}
if ($_SERVER["REQUEST_METHOD"] == "GET"){
    session_start();
    $_SESSION["user"] = null;
    $_SESSION["cart"] = null;
    header("location: ../views/login.php");
}


