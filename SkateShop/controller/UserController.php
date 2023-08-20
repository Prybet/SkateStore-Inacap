<?php

require_once "../../SkateShop/models/User.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["submit"] == "create") {
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $username = isset($_POST["username"]) ? $_POST["username"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";
        $description = isset($_POST["description"]) ? $_POST["description"] : "";
        $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";

        if ($email != "" && $username != "" && $password != "") {
            $user = new User();
            $user->setEmail($email);
            $user->setUsername($username);
            $user->setPassword($password);
            $user->setDescription($description);
            $user->setPhone($phone);
            if ($user->verifyUsername($username)) {
                if ($user->insert($user)) {
                    $_SESSION["user"] = $user->getLogin();
                    header("location: ../base/index.php");
                } else {
                    $_SESSION["err"] = "Ocurrio un error, intente denuevo";
                    header("location: ../views/singin.php");
                }
            } else {
                $_SESSION["errS"] = "Nombre de usuario repetido";
                header("location: ../views/singin.php");
            }
        }
    } elseif ($_POST["submit"] == "edit") {
        if ($_SESSION["user"] != null) {
            $user = $_SESSION["user"];
            $password = isset($_POST["password"]) ? $_POST["password"] : "";
            $description = isset($_POST["description"]) ? $_POST["description"] : "";
            $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";

            if ($user->email != "" && $user->username != "" && $user->password != "") {
                $user->password = $password;
                $user->description = $description;
                $user->phone = $phone;
                if ($user->update($user)) {
                    $_SESSION["user"] = $user;
                    header("location: ../base/index.php");
                } else {
                    header("location: ../base/index.php");
                }
            }
            header("location: ../base/index.php");
        } else {
            header("location: ../base/index.php");
        }
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "PUT") {
    echo 'WEENA';
}
