<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <?php include_once '../base/header.php'; ?>
    <?php
    require_once '../models/Product.php';
    require_once '../models/User.php';
    session_start();
    $product = $_SESSION["prod"];
    ?>
    <title>SkateStore | <?= $product->getName() ?></title>
</head>

<body>
    <?php include_once '../../SkateShop/base/nav.php'; ?>
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- Product main img -->
                <div class="col-md-5 col-md-push-2">
                    <div id="product-main-img">
                        <div class="product-preview">
                            <img src="<?= $product->imageUrl ?>" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="product-details">
                        <h2 class="product-name"><?= $product->name ?></h2>
                        <div>
                            <h3 class="product-price">$<?= $product->price ?></h3>
                            <span class="product-available"><?= $product->stock ?> Disponible(s)</span>
                        </div>
                        <p><?= $product->description ?></p>
                        <div class="add-to-cart">
                            <form class="prodFormulary_place" action="../controller/ProductController.php" method="post">
                                <div class="qty-label">
                                CANT.
                                <div class="input-number">
                                    <input type="number" placeholder="0" name="amount" min="1" max="<?= $product->stock ?>" value="1">
                                </div>
                            </div>
                                <button class="add-to-cart-btn" type="submit" name="add" value="<?= $product->id ?>"><i class="fa fa-shopping-cart"></i>Agregar </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Product details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/slick.min.js"></script>
    <script src="../js/nouislider.min.js"></script>
    <script src="../js/jquery.zoom.min.js"></script>
    <script src="../js/main.js"></script>

</body>


</html>
