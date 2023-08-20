<?php

/**
 * Description of Product
 *
 * @author Prybet
 */
require_once '../db/PDOConnection.php';
require_once '../../SkateShop/models/ProductType.php';
class Product {
    public $id;
    public $name;
    public $price;
    public $stock;
    public $imageUrl;
    public $description;
    public $productType;
    public $status;
    
    
    
    public function getAll() {
        $conn = new PDOConnection();
        
        $sql = "SELECT * FROM product WHERE stock > 1 AND statusid = 1";
        $sentence = $conn->mysql->prepare($sql);
        if($sentence->execute()){
            if($sentence->rowCount()>0){
                $rows = $sentence->fetchAll();
                $list = array();
                foreach ($rows as $v){
                    $p = new Product();
                    $p->setId($v["ID"]);
                    $p->setName($v["Name"]);
                    $p->setPrice($v["Price"]);
                    $p->setStock($v["Stock"]);
                    $p->setImageUrl($v["ImageURL"]);
                    $p->setDescription($v["Description"]);
                    $pt = new ProductType();
                    $p->setProductType($pt->getById($v["ProducttypeID"]));
                    $s = new Status();
                    $p->setStatus($s->getById($v["StatusID"]));
                    $list[] = $p;
                }
                return $list;
            }
        }
        return null;
    }
    
    public function getById($id) {
        $conn = new PDOConnection();
        
        $sql = "SELECT * FROM product WHERE id = :ID";
        $sentence = $conn->mysql->prepare($sql);
        $sentence->bindParam(":ID", $id);
        
        if($sentence->execute()){
            if($sentence->rowCount()>0){
                $v = $sentence->fetch();
                    $this->setId($id);
                    $this->setName($v[1]);
                    $this->setPrice($v[2]);
                    $this->setStock($v[3]);
                    $this->setImageUrl($v[4]);
                    $this->setDescription($v[5]);
                    $pt = new ProductType();
                    $this->setProductType($pt->getById($v[6]));
                    $s = new Status();
                    $this->setStatus($s->getById($v[7]));
                return $this;
            }
        }
        return null;
    }
    public function insert() {
        $conn = new PDOConnection();
        $sentence = $conn->mysql->prepare("INSERT INTO product VALUES(null, :name, :price, :stock, :imUrl, :desc, :ptyp, :stat)");
        $sentence->bindParam(":name", $this->name);
        $sentence->bindParam(":price", $this->price);
        $sentence->bindParam(":stock", $this->stock);
        $sentence->bindParam(":imUrl", $this->imageUrl);
        $sentence->bindParam(":desc", $this->description);
        $sentence->bindParam(":ptyp", $this->productType->id);
        $sentence->bindParam(":stat", $this->status->id);
        if ($sentence->execute()) {
            return $this->getAdminAll();
        } else {
            return null;
        }
    }
    public function getAdminAll() {
        $conn = new PDOConnection();
        
        $sql = "SELECT * FROM product";
        $sentence = $conn->mysql->prepare($sql);
        if($sentence->execute()){
            if($sentence->rowCount()>0){
                $rows = $sentence->fetchAll();
                $list = array();
                foreach ($rows as $v){
                    $p = new Product();
                    $p->setId($v["ID"]);
                    $p->setName($v["Name"]);
                    $p->setPrice($v["Price"]);
                    $p->setStock($v["Stock"]);
                    $p->setImageUrl($v["ImageURL"]);
                    $p->setDescription($v["Description"]);
                    $pt = new ProductType();
                    $p->setProductType($pt->getById($v["ProducttypeID"]));
                    $s = new Status();
                    $p->setStatus($s->getById($v["StatusID"]));
                    $list[] = $p;
                }
                
                return $list;
            }
        }
        return null;
    }
    
    public function updateStock() {
        $conn = new PDOConnection();
        $sql = "UPDATE product set stock = :stock where id = :id";
        $sentence = $conn->mysql->prepare($sql);
        $sentence->bindParam(":stock", $this->stock);
        $sentence->bindParam(":id", $this->id);
        if($sentence->execute()){
            return true;
        }else {
            return false;
        }
        
    }
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getImageUrl() {
        return $this->imageUrl;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getProductType() {
        return $this->productType;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setPrice($price): void {
        $this->price = $price;
    }

    public function setStock($stock): void {
        $this->stock = $stock;
    }

    public function setImageUrl($imageUrl): void {
        $this->imageUrl = $imageUrl;
    }

    public function setDescription($description): void {
        $this->description = $description;
    }

    public function setProductType($productType): void {
        $this->productType = $productType;
    }

    public function setStatus($status): void {
        $this->status = $status;
    }



}
