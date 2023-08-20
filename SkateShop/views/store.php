<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>SkateStore</title>
    <?php include_once '../base/header.php'; ?>
    <?php
    require '../models/Product.php';
    require '../models/Status.php';
    require '../models/User.php';

    $p = new Product;
    $list = $p->getAll();
    session_start();
    $_SESSION["allProds"] = $list;
    ?>
</head>

<body>
    <?php include_once '../../SkateShop/base/nav.php'; ?>
    <div class="section">
        <div class="container">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Nuestros Productos</h3>
                </div>
            </div>
            <div class="row">
                <?php foreach ($list as $v) : ?>
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="<?= $v->imageUrl ?>" alt="" >
                            </div>
                            <div class="product-body">
                                <p class="product-category"><?= $v->productType->name ?></p>
                                <h3 class="product-name"><a href="../controller/ProductController.php?prod=<?= $v->id?>"><?= $v->name ?></a></h3>
                                <h4 class="product-price">$<?= $v->price ?></h4>
                                <div class="product-btns">
                                    <a href="../controller/ProductController.php?prod=<?= $v->id?>" class="quick-view"><span class="tooltipp">MÁS DETALLES</span> <i class="fa fa-eye"></i></a>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <form action="../controller/ProductController.php" method="post">
                                    <button class="add-to-cart-btn" type="submit" name="add" value="<?= $v->id ?>"><i class="fa fa-shopping-cart"></i>Agregar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- Producto -->
            </div>
        </div>
    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/slick.min.js"></script>
    <script src="../js/nouislider.min.js"></script>
    <script src="../js/jquery.zoom.min.js"></script>
    <script src="../js/main.js"></script>

</body>


</html>