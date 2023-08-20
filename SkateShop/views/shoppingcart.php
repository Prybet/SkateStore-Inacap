<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <?php
        require_once '../models/ShopCart.php';
        require_once '../models/CartItem.php';
        require_once '../models/PayMethod.php';
        require_once '../models/User.php';
        require_once '../base/header.php';
        session_start();
        $p = new PayMethod();
        $payList = $p->getAll();
        $cart = $_SESSION["cart"];
        $total = 0;
        $neto = 0;
        $iva = 0;
        $count = 0;
        ?>
        <title>Carrito de <?= $_SESSION["user"]->username?></title>
    </head>
    <body>
        <?php include_once '../../SkateShop/base/nav.php'; ?>
        <div>
            <div class="container">
                <?php
                if ($cart->itemsList != null) {
                    ?>
                    <form action="../controller/ProductController.php" method="post"> 
                        <table border="1">

                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($cart->itemsList as $v):
                                    ?>
                                    <tr>
                                        <td><img class="product" src="<?= $v->product->getImageUrl() ?>" alt="prodImage"> </td>
                                        <td><p><?= $v->product->name ?></p></td>
                                        <td><p><?= $v->product->description ?></p></td>
                                        <td><p>Precio unitario: <?= $v->product->price ?></p></td>
                                        <td><p>Cantidad: <input placeholder="Cantidad" type="number" value="<?= $v->amount ?>" min="1" max="<?= $v->product->stock ?>"></p></td>
                                        <td> <button name="delete" value="<?= $count ?>" type="submit"> Eliminar </button>  </td>
                                    </tr>
                                    <?php
                                    $neto = ($neto + $v->product->price) * $v->amount;
                                    $count++;
                                endforeach;
                                $iva = $neto * 0.19;
                                $total = $neto * 1.19;
                                $_SESSION["neto"] = $neto;
                            }
                            ?>
                        </tbody>

                    </table>
                </form>
                <form action="../controller/BuyController.php" method="post">
                    <div>
                        <h1>Tu Carrito de Compras</h1>
                        <h2>Neto:  $<?= $neto ?></h2>
                        <h2>IVA: $<?= $iva ?></h2>
                        <h2>Total: $<?= $total ?></h2>
                        <h2> Metodo de pago: <select name="payMethod" >
                                <option value="-1"> -- Seleccione --</option>
                                <?php foreach ($payList as $v) { ?>
                                    <option value="<?= $v->id ?>"> <?= $v->name ?></option>
                                <?php } ?>
                            </select></h2>
                        <button type="submit" name="buy"> Hacer compra </button>
                    </div>
                </form>
            </div>

        </div>
    </body>
</html>
