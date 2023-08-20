<!DOCTYPE html>
<?php
    require_once '../models/User.php';
    session_start();
    if($_SESSION["user"]->username != "guest"){
        header("location: ../views/home.php");
    }
    $err = isset($_SESSION["errS"])? $_SESSION["errS"] : "";
?>

<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skate Store | Crear Cuenta</title>
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
                            <h2>Registro</h2>
                            <form action="../controller/UserController.php" method="post">
                            <h6 class="font-weight-light">Rellene los datos para su registro.</h6>
                            <div class="pt-3">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="nombre" name="username" placeholder="Usuario">
                                    <code id="nombreError" class="error">No ha ingresado su usuario.</code>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="contra" name="password" placeholder="Contraseña">
                                    <code id="contraError" class="error">No ha ingresado una contraseña.</code>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-lg" id="numero" name="phone" placeholder="Número">
                                    <code id="numeroError" class="error">No ha ingresado su número.</code>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="correo" name="email" placeholder="Correo">
                                    <code id="correoError" class="error">No ha ingresado su correo.</code>
                                </div>
                                <div class="form-group">
                                    <textarea type="text" class="form-control form-control-lg" id="descripcion" name="description" placeholder="Descripción"></textarea>
                                    <code id="descError" class="error">No ha ingresado su descripción.</code>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" value="create" name="submit">REGISTRAR</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    ¿Ya tienes una cuenta? <a href="../views/login.php" class="text-primary">Iniciar Sesión</a>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
    </div>
    <script src="../js/js/vendor.bundle.base.js"></script>
    <script src="../js/js/off-canvas.js"></script>
    <script src="../js/js/hoverable-collapse.js"></script>
    <script src="../js/js/template.js"></script>
    <script src="../js/js/settings.js"></script>
    <script src="../js/js/todolist.js"></script>
    <script src="../js/registro.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>