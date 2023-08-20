<!DOCTYPE html>
<?php
require_once '../../SkateShop/models/User.php';
session_start();
if ($_SESSION["user"] == null || $_SESSION["user"]->getId() === 0) {
    header("Location: ../base/index.php");
} elseif ($_SESSION["user"]->username == "guest") {
    header("Location: ../views/login.php");
}

$user = $_SESSION["user"];
?>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Skate Store |  <?= $_SESSION["user"]->username ?> Perfil</title>
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
                                <h2>Tu Perfil de Usuario</h2>
                                <h4 class="font-weight-light">Cambie los datos para editar.</h4>
                                <div class="pt-3">
                                    <div class="form-group">
                                        <h6 class="font-weight-light">Correo Electronico: (No Editable)</h6>
                                        <label type="email" class="form-control form-control-lg"><?= $user->email ?></label>
                                    </div>
                                    <div class="form-group">
                                        <h6 class="font-weight-light">Nombre de Usuario: (No Editable)</h6>
                                        <label type="text" class="form-control form-control-lg" id="nombre"><?= $user->username ?></label>
                                    </div>
                                    <div class="form-group">
                                        <h4 class="font-weight-light">Campos Editables:</h4>
                                    </div>
                                    <form action="../controller/UserController.php" method="post">
                                        <div class="form-group">
                                            <h6 class="font-weight-light">Contraseña:</h6>
                                            <input type="password" class="form-control form-control-lg" id="contra" name="password" value="<?= $user->password ?>">
                                        </div>
                                        <div class="form-group">
                                            <h6 class="font-weight-light">Numero de Celular:</h6>
                                            <input type="number" class="form-control form-control-lg" id="numero" name="phone" value="<?= $user->phone ?>">
                                        </div>
                                        <div class="form-group">
                                            <h6 class="font-weight-light">Tu descripcion</h6>
                                            <textarea type="text" class="form-control form-control-lg" id="descripcion" name="description" placeholder="Descripción"> <?= $user->description ?></textarea>
                                        </div>
                                        <div class="mt-3">
                                            <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" value="edit" name="submit">Confimar Cambios</button>
                                        </div>
                                    </form>
                                    <div class="text-center mt-4 font-weight-light">
                                        ¿No quieres editar? <a href="../views/store.php" class="text-primary">Volver a la tienda</a>
                                    </div>
                                </div>
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