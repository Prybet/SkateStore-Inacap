<?php

function autoload($clase){
    $classname = str_replace("\\","/", $clase);
   //require_once "models/".$classname.".php";
    //require_once "views/".$classname.".php";
    require_once '../../SkateShop/models/User.php';
    require_once "../../SkateShop/db/PDOConnection.php";
    require_once "../../SkateShop/controller/LoginController.php";
    //require_once "../controller/".$classname.".php";
    //require_once "db/".$classname.".php";
}
spl_autoload_register("autoload");
