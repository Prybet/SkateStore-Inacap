<header>
    <?php $_SESSION["current"] = $_SERVER['PHP_SELF'] ?>
    <div id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="../views/store.php" class="logo">
                            <img src="../img/logo2.png" class="img-logo">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                </div>
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span><?= $_SESSION["user"]->username ?> Carrito</span>
                                <div class="qty"><?php
                                    $items = isset($_SESSION["user"]->cart->itemsList) ? $_SESSION["user"]->cart->itemsList : null;
                                    if ($items != null) {
                                        echo sizeof($items);
                                    } else {
                                        echo 0;
                                    }
                                    ?></div>
                            </a>
                            <div class="cart-dropdown">
                                <?php
                                $neto = 0;
                                $iva = 0;
                                $total = 0;
                                $count = 0;
                                ?>
                                <div class="cart-list">
                                    <?php
                                    if ($items != null) {
                                        foreach ($items as $i) :
                                            ?>
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="<?= $i->product->imageUrl ?>" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name"><a href="../controller/ProductController.php?prod=<?= $i->product->id ?>"><?= $i->product->productType->name ?></a></h3>
                                                    <h4 class="product-price"><span class="qty"><?= $i->amount ?></span> <span class="qty"> x </span><?= $i->product->price ?></h4>
                                                </div>
                                                <form action="../controller/ProductController.php" method="post">
                                                    <button name="delete" value="<?= $count ?>" type="submit" class="delete"><i class="fa fa-close"></i></button>
                                                </form>
                                            </div>
                                            <?php
                                            $neto = ($neto + $i->product->price) * $i->amount;
                                            $count++;
                                        endforeach;
                                    }
                                    ?> 
                                </div>
                                <div class="cart-summary">
                                    <?php
                                    $iva = $neto * 0.19;
                                    $total = $neto * 1.19;
                                    $_SESSION["neto"] = $neto;
                                    ?>
                                    <small> <?php
                                        if ($items != null) {
                                            echo sizeof($items);
                                        } else {
                                            echo 0;
                                        }
                                        ?>
                                        Producto(s) Seleccionado(s)</small>
                                    <h5>Neto: $<?= $neto ?></h5>
                                    <h5>I.V.A: $<?= $iva ?></h5>
                                    <h5>SUBTOTAL: $<?= $total ?></h5>
                                </div>
                                <form action="../controller/BuyController.php" method="post">
                                    <div class="cart-summary">
                                        <h5>METODO DE PAGO:</h5>
                                        <select name="paym">
                                            <option value="-1">No seleccionado</option>
                                            <?php
                                            require_once '../models/PayMethod.php';
                                            $pm = new PayMethod();
                                            $payMList = $pm->getAll();
                                            foreach ($payMList as $v) {
                                                ?>
                                                <option value="<?= $v->id ?>"> <?= $v->name ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>

                                    <div class="btn btn-warning btn-block">
                                        <button class="btn btn-warning btn-block" type="submit" name="action">Ir a Pagar <i class="fa fa-arrow-circle-right"></i></button> 
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div>
                            <?php
                            if ($_SESSION["user"]->username == "guest") {
                                echo '<a href="../views/login.php">
                                        <i class="fa fa-user"></i>
                                        <span>Iniciar Sesión</span>
                                      </a>';
                            } else {
                                echo '<a href="../controller/LoginController.php?off=1">
                                        <i class="fa fa-user"></i>
                                        <span>Cerrar Sesión</span>
                                      </a>';
                            }
                            ?>
                        </div>
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menú</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<nav id="navigation">
    <div class="container">
        <div id="responsive-nav">
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="../views/store.php">Productos</a></li>
                    <?php
                    if ($_SESSION["user"]->username == "guest") {
                        echo '<li class="active"><a href="../views/singin.php">Crear Cuenta</a></li>';
                    } else {
                        echo '<li class="active"><a href="../views/home.php">Cuenta</a></li>';
                        echo '<li class="active"><a href="../views/myhome.php">Mis Compras</a></li>';
                    }
                    ?>
            </ul>
        </div>
    </div>
</nav>