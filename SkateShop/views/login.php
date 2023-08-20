<!DOCTYPE html>
<?php
require_once '../models/User.php';
session_start();
if ($_SESSION["user"]->username != "guest") {
    header("location: ../views/home.php");
}
$err = isset($_SESSION["err"]) ? $_SESSION["err"] : "";

?>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Skate Store | Iniciar</title>
        <link rel="stylesheet" href="../vendors/feather/feather.css">
        <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
        <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="../vendors/vertical-layout-light/style.css">
        <link rel="stylesheet" href="../styles/main2.css">
    </head>

    <body>
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-center auth px-0">
                    <div class="row w-100 mx-0">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                                <h2>SKATE STORE</h2>
                                <h6 class="font-weight-light">Inicie sesión para continuar.</h6>
                                <div class="pt-3">
                                    <form action="../controller/LoginController.php" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Usuario">
                                            <code id="userError" class="error">No ha ingresado su usuario.</code>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Contraseña">
                                            <code id="passError" class="error">No ha ingresado su contraseña.</code>
                                        </div>
                                        <div class="mt-3 text-center">
                                            <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="login">INICIAR SESIÓN</button>
                                            <br>
                                            <code id="resError" class="error">Usuario y/o contraseña incorrectos.</code>
                                        </div>
                                        <div class="text-center mt-4 font-weight-light">
                                            ¿No tienes una cuenta? <a href="../views/singin.php" class="text-primary">Crear una</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../js/js/vendor.bundle.base.js"></script>
        <script src="../js/js/off-canvas.js"></script>
        <script src="../js/js/hoverable-collapse.js"></script>
        <script src="../js/js/template.js"></script>
        <script src="../js/js/settings.js"></script>
        <script src="../js/js/todolist.js"></script>
        <script src="../js/login.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>

</html>