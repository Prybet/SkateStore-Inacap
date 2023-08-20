<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once '../models/User.php';
require_once '../models/Product.php';
require_once '../models/ProductType.php';
require_once '../models/Status.php';
session_start();
//echo '<h1> Bienvenido ' . $_SESSION["user"]->username . "</h1>";
$proList = $_SESSION["AdminProdList"];
$sta = new Status();
$statusList = $sta->getAll();
$pt = new ProductType;
$typeList = $pt->getAll();
?>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>SkateShop | Admin</title>
        <link rel="stylesheet" href="../vendors/feather/feather.css">
        <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
        <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="../vendors/select2/select2.min.css">
        <link rel="stylesheet" href="../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
        <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
        <link rel="shortcut icon" href="../img/logo.png" />
    </head>

    <body>
        <div class="container-scroller">
            <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo mr-5" href="aPage.php"><img src="../img/logo.png" class="mr-2" /></a>
                    <a class="navbar-brand brand-logo-mini" href="aPage.php"><img src="../img/logo.png" /></a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                    <ul class="navbar-nav mr-lg-2">

                    </ul>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                                <i class="icon-ellipsis"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                                <a class="dropdown-item">
                                    <i class="ti-power-off text-primary"></i>
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="icon-menu"></span>
                    </button>
                </div>
            </nav>
            <div class="container-fluid page-body-wrapper">
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="aPage.php">
                                <i class="icon-grid menu-icon"></i>
                                <span class="menu-title">Productos</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Gestión de Productos</h4>
                                        <div class="card-description">
                                            <button type="submit" class="btn btn-primary mr-2" data-toggle="modal" data-target="#agregar">Agregar</button>
                                            <!-- MODAL AGREGAR PRODUCTOS-->
                                            <div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <form class="forms-sample" id="formguardar" action="../controller/AdminController.php" method="post">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <h4 class="card-title">Nuevo Producto</h4>

                                                                <div class="form-group">
                                                                    <label for="nombre">Nombre Producto</label>
                                                                    <input type="text" class="form-control" id="nombre" name="name" placeholder="Nombre producto">
                                                                    <code id="nombreError" style="display: none;">No ha ingresado un nombre</code>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="descripcion">Descripción</label>
                                                                    <textarea class="form-control" id="descripcion" name="desc" rows="4" placeholder="Descripción de producto"></textarea>
                                                                    <code id="descripcionError" style="display: none;">No ha ingresado una descripción</code>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Precio">Precio</label>
                                                                    <input type="number" class="form-control" id="precio" name="price" placeholder="$0">
                                                                    <code id="precioError" style="display: none;">No ha ingresado ningún precio</code>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Stock">Stock</label>
                                                                    <input type="number" class="form-control" id="stock" name="stock" placeholder="0">
                                                                    <code id="stockError" style="display: none;">No ha ingresado un stock</code>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Estado">Estado</label>
                                                                    <select class="form-control form-control-lg" id="estado" name="status">
                                                                        <option value="-1">No seleccionado</option>
                                                                        <?php foreach ($statusList as $v) { ?>
                                                                            <option value="<?= $v->id ?>"> <?= $v->name ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    <code id="estadoError" style="display: none;">No ha seleccionado un estado</code>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Estado">Tipo Producto</label>
                                                                    <select class="form-control form-control-lg" id="tproducto" name="ptype">
                                                                        <option value="-1">No seleccionado</option>
                                                                        <?php foreach ($typeList as $v) { ?>
                                                                            <option value="<?= $v->id ?>"> <?= $v->name ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    <code id="tproductoError" style="display: none;">No ha seleccionado un tipo</code>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Stock">URL Imagen de producto</label>
                                                                    <textarea class="form-control" id="imageUrl" name="imageUrl" rows="2" placeholder="URL de la imagen"></textarea>
                                                                    <!--<input type="file" name="imagen[]" value="" class="form-control file-upload-info" id="imagen" accept="image/jpeg,image/png,image/jpg" multiple>-->
                                                                    <code id="fotoError" style="display: none;">No ha ingresado una imagen</code>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                                <button type="submit" class="btn btn-primary" name="submit" value="insert">Guardar</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- MODAL EDITAR PRODUCTOS
                                            <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h4 class="card-title">Editar Producto</h4>
                                                            <form class="forms-sample" id="formeditar">
                                                                <input type="hidden" name="idProducto">
                                                                <div class="form-group">
                                                                    <label for="nombre">Nombre Producto</label>
                                                                    <input type="text" class="form-control" id="edinombre" name="name">
                                                                    <code id="nombreError" style="display: none;">No ha ingresado un nombre</code>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="descripcion">Descripción</label>
                                                                    <textarea class="form-control" id="edidescripcion" name="desc" rows="4"></textarea>
                                                                    <code id="descripcionError" style="display: none;">No ha ingresado una descripción</code>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Precio">Precio</label>
                                                                    <input type="number" class="form-control" id="ediprecio" name="price" placeholder="$0">
                                                                    <code id="precioError" style="display: none;">No ha ingresado ningún precio</code>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Stock">Stock</label>
                                                                    <input type="number" class="form-control" id="edistock" name="stock" placeholder="0">
                                                                    <code id="stockError" style="display: none;">No ha ingresado un stock</code>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Estado">Estado</label>
                                                                    <select class="form-control form-control-lg" id="ediestado" name="status">
                                                                        <option value="-1">No seleccionado</option>
                                                                        < ?php foreach ($statusList as $v) { ?>
                                                                            <option value="< ?= $v->id ?>"> < ?= $v->name ?></option>
                                                                        < ?php } ?>
                                                                    </select>
                                                                    <code id="estadoError" style="display: none;">No ha seleccionado un estado</code>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Estado">Tipo Producto</label>
                                                                    <select class="form-control form-control-lg" id="editproducto" name="ptype">
                                                                        <option value="-1">No seleccionado</option>
                                                                        < ?php foreach ($typeList as $v) { ?>
                                                                            <option value="< ?= $v->id ?>"> < ?= $v->name ?></option>
                                                                        < ?php } ?>
                                                                    </select>
                                                                    <code id="tproductoError" style="display: none;">No ha seleccionado un tipo</code>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Stock">Foto de producto</label>
                                                                    <input type="file" name="imagen[]" value="" class="form-control file-upload-info" id="imagen" accept="image/jpeg,image/png,image/jpg" multiple>
                                                                    <code id="edifotoError" style="display: none;">No ha ingresado una foto</code>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                            <button type="button" class="btn btn-primary" name="submit" value="update">Editar < ?= $prod->ptodcuttype->name ?></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            ID
                                                        </th>
                                                        <th>
                                                            Nombre
                                                        </th>
                                                        <th>
                                                            Tipo Producto
                                                        </th>
                                                        <th>
                                                            Stock
                                                        </th>
                                                        <th>
                                                            Precio
                                                        </th>
                                                        <th>
                                                            Estado
                                                        </th>
                                                        <th>
                                                            Opciones
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    if ($proList != null) {

                                                        foreach ($proList as $prod) :
                                                            ?>
                                                            <tr>
                                                                <td class="py-1">
                                                                    <?= $prod->id ?>
                                                                </td>
                                                                <td>
                                                                    <?= $prod->name ?>
                                                                </td>
                                                                <td>
                                                                    <?= $prod->productType->name ?>
                                                                </td>
                                                                <td>
                                                                    <?= $prod->stock ?>
                                                                </td>
                                                                <td>
                                                                    <?= $prod->price ?>
                                                                </td>
                                                                <td>
                                                                    <?= $prod->status->name ?>
                                                                </td>
                                                                <td>

                                                                    <div class="dropdown">

                                                                        <button class="btn btn-danger dropdown-toggle" type="button" id="opciones" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Opciones
                                                                        </button>
                                                                        <div class="dropdown-menu" aria-labelledby="opciones">
                                                                            <a class="dropdown-item" data-toggle="modal" data-target="#editar">Editar</a>
                                                                            <div class="dropdown-divider"></div>
                                                                            <button class="dropdown-item" name="eliminar">Eliminar</button>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                        <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <h4 class="card-title">Editar Producto</h4>
                                                                        <form class="forms-sample" id="formeditar">

                                                                            <input type="hidden" name="idProducto">
                                                                            <div class="form-group">
                                                                                <label for="nombre">Nombre Producto</label>
                                                                                <input type="text" class="form-control" id="edinombre" name="name">
                                                                                <code id="nombreError" style="display: none;">No ha ingresado un nombre</code>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="descripcion">Descripción</label>
                                                                                <textarea class="form-control" id="edidescripcion" name="desc" rows="4"></textarea>
                                                                                <code id="descripcionError" style="display: none;">No ha ingresado una descripción</code>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="Precio">Precio</label>
                                                                                <input type="number" class="form-control" id="ediprecio" name="price" placeholder="$0">
                                                                                <code id="precioError" style="display: none;">No ha ingresado ningún precio</code>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="Stock">Stock</label>
                                                                                <input type="number" class="form-control" id="edistock" name="stock" placeholder="0">
                                                                                <code id="stockError" style="display: none;">No ha ingresado un stock</code>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="Estado">Estado</label>
                                                                                <select class="form-control form-control-lg" id="ediestado" name="status">
                                                                                    <option value="-1">No seleccionado</option>
                                                                                    <?php foreach ($statusList as $v) { ?>
                                                                                        <option value="<?= $v->id ?>"> <?= $v->name ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                                <code id="estadoError" style="display: none;">No ha seleccionado un estado</code>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="Estado">Tipo Producto</label>
                                                                                <select class="form-control form-control-lg" id="editproducto" name="ptype">
                                                                                    <option value="-1">No seleccionado</option>
                                                                                    <?php foreach ($typeList as $v) { ?>
                                                                                        <option value="<?= $v->id ?>"> <?= $v->name ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                                <code id="tproductoError" style="display: none;">No ha seleccionado un tipo</code>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="Stock">Foto de producto</label>
                                                                                <input type="file" name="imagen[]" value="" class="form-control file-upload-info" id="imagen" accept="image/jpeg,image/png,image/jpg" multiple>
                                                                                <code id="edifotoError" style="display: none;">No ha ingresado una foto</code>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                                        <button type="button" class="btn btn-primary" name="submit" value="update">Editar <?= $prod->ptodcuttype->name ?></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </tr>
                                                        <?php
                                                    endforeach;
                                                }
                                                ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../vendors/js/vendor.bundle.base.js"></script>
        <script src="../vendors/typeahead.js/typeahead.bundle.min.js"></script>
        <script src="../vendors/select2/select2.min.js"></script>
        <script src="../js/js/off-canvas.js"></script>
        <script src="../js/js/hoverable-collapse.js"></script>
        <script src="../js/js/template.js"></script>
        <script src="../js/js/settings.js"></script>
        <script src="../js/js/todolist.js"></script>
        <script src="../js/js/file-upload.js"></script>
        <script src="../js/js/typeahead.js"></script>
        <script src="../js/js/select2.js"></script>
        <script src="../js/panel.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>

</html>
