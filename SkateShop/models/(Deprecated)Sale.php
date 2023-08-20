<?php
/**
 * Description of Sale
 *
 * @author Prybet
 */
require_once '../models/ShopCart.php';
require_once '../models/Status.php';
class Sale {
    public $id;
    public $dateTime;
    public $amount;
    public $saleDetail;
    public $status;
    public $shopCart;
    
    public function getById($id) {
        $conn = new PDOConnection();
        $sql = "SELECT * FROM sale WHERE saledetailid = :ID";
        $sentence = $conn->mysql->prepare($sql);
        $sentence->bindParam(":ID", $id);
        
        if($sentence->execute()){
            if($sentence->rowCount()>0){
                $rows = $sentence->fetchAll();
                foreach ($rows as $v) {
                    $this->setId($v[0]);
                    $this->setDateTime($v[1]);
                    $this->setAmount($v[2]);
                    //$sl = new SaleDetail();
                    //$sl->id = $$v[3];
                    //$this->setSaleDetail($sl);
                    $s = new Status();
                    $this->setStatus($s->getById($v[4]));
                    $sc = new ShopCart();
                    $this->setShopCart($sc->getById($v[5]));
 
                    $list[] = $this;
                }
                return $list;
            }
        }
        return null;
    }
    public function getId() {
        return $this->id;
    }

    public function getDateTime() {
        return $this->dateTime;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getSaleDetail() {
        return $this->saleDetail;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getShopCart() {
        return $this->shopCart;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setDateTime($dateTime): void {
        $this->dateTime = $dateTime;
    }

    public function setAmount($amount): void {
        $this->amount = $amount;
    }

    public function setSaleDetail($saleDetail): void {
        $this->saleDetail = $saleDetail;
    }

    public function setStatus($status): void {
        $this->status = $status;
    }

    public function setShopCart($shopCart): void {
        $this->shopCart = $shopCart;
    }


    
}
