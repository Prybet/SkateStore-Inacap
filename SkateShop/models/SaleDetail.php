<?php

/**
 * Description of SaleDetail
 *
 * @author Prybet
 */
require_once '../db/PDOConnection.php';
require_once '../models/PayMethod.php';
require_once '../models/Status.php';
require_once '../models/ShopCart.php';
require_once '../models/CartItem.php';

class SaleDetail {

    public $id;
    public $dateTime;
    public $Neto;
    public $IVA;
    public $Total;
    public $user;
    public $shopCart;
    public $payMethod;
    public $status;

    //public $salesList;

    public function getUserById($id) {
        $conn = new PDOConnection();

        //$sql = "SELECT * FROM sale INNER JOIN saledetail ON sale.saledetailid = saledetail.id where saledetail.userid = :ID";
        $sql = "SELECT * FROM saledetail WHERE userid = :ID ORDER BY id desc";
        $sentence = $conn->mysql->prepare($sql);
        $sentence->bindParam(":ID", $id);

        if ($sentence->execute()) {
            if ($sentence->rowCount() > 0) {
                $rows = $sentence->fetchAll();
                foreach ($rows as $v) {
                    $sale = new SaleDetail();
                    $sale->id = $v[0];
                    $sale->dateTime = $v[1];
                    $sale->Neto = $v[2];
                    $sale->IVA = $v[3];
                    $sale->Total = $v[4];
                    $sale->user = $v[5];
                    $s = new Status();
                    $sale->status = $s->getById($v[8]);
                    $c = new ShopCart();
                    $sale->shopCart = $c->getById($v[6]);
                    $p = new PayMethod();
                    $sale->payMethod = $p->getById($v[7]);

                    $list[] = $sale;
                }
                return $list;
            }
        }
        return null;
    }

    public function setSale() {
        $conn = new PDOConnection();
        $sql = "INSERT INTO saledetail VALUES(null,CURRENT_TIMESTAMP , :neto, :iva, :total, :uid, :caid, :pmid, 3)";
        $sentence = $conn->mysql->prepare($sql);
        $sentence->bindParam(":neto", $this->Neto);
        $sentence->bindParam(":iva", $this->IVA);
        $sentence->bindParam(":total", $this->Total);
        $sentence->bindParam(":uid", $this->user);
        $sentence->bindParam(":caid", $this->shopCart->id);
        $sentence->bindParam(":pmid", $this->payMethod->id);
        if ($sentence->execute()) {
            if ($this->shopCart->buyCart()) {
                $item = new CartItem();
                if ($item->buyItems($this->shopCart)) {
                    return true;
                }
            }
        }
    }

    public function getByTime($time) {
        $conn = new PDOConnection();
        $sql = "SELECT * FROM saledetail WHERE datetime = :time";
        $sentence = $conn->mysql->prepare($sql);
        $sentence->bindParam(":time", $time);
        if ($sentence->execute()) {
            $rs = $sentence->fetch();
            $sale = new SaleDetail();
            $sale->id = $rs[0];
            $sale->dateTime = $rs[1];
            $sale->Neto = $rs[2];
            $sale->IVA = $rs[3];
            $sale->Total = $rs[4];
            $sale->user = $rs[5];
            $p = new PayMethod();
            $sale->payMethod = $p->getById($rs[7]);
            $s = new Status();
            $sale->status = $s->getById($rs[8]);
            return $sale;
        }
    }

}
