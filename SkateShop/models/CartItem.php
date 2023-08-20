<?php

/**
 * Description of CartItem
 *
 * @author Prybet
 */
require_once '../../SkateShop/models/Product.php';

class CartItem {

    public $id;
    public $product;
    public $amount;
    public $shopCart;
    public $status;

    public function getByCartId($id) {
        $conn = new PDOConnection();

        $sql = "SELECT * FROM cartitem WHERE shopcartid = :ID";
        $sentence = $conn->mysql->prepare($sql);
        $sentence->bindParam(":ID", $id);

        if ($sentence->execute()) {
            if ($sentence->rowCount() > 0) {
                $rows = $sentence->fetchAll();
                foreach ($rows as $v) {
                    $item = new CartItem();
                    $item->id = $v[0];
                    $p = new Product();
                    $item->product = $p->getById($v[2]);
                    $item->amount = $v[1];
                    $item->shopCart = $v[3];
                    $s = new Status();
                    $item->status = $s->getById($v[4]);

                    $list[] = $item;
                }
                return $list;
            }
        }
        return null;
    }

    public function buyItems($cart) {
        $conn = new PDOConnection();
        $sql = "UPDATE cartitem SET statusid = 3 where id = :ID";
        $sentence = $conn->mysql->prepare($sql);
        foreach ($cart->itemsList as $i) {
            $sentence->bindParam(":ID", $i->id);
            if (!$sentence->execute()) {
                return false;
            }
            $prod = new Product();
            $prod = $i->product;
            $prod->stock = $prod->stock - $i->amount;
            if (!$prod->updateStock()) {
                return false;
            }
        }
        return true;
    }

}
