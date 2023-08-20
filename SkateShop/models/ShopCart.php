<?php

/**
 * Description of ShopCart
 *
 * @author Prybet
 */
require_once '../models/Status.php';
require_once '../models/CartItem.php';

class ShopCart {

    public $id;
    public $user;
    public $status;
    public $itemsList;

    public function getById($id) {
        $conn = new PDOConnection();

        $sql = "SELECT * FROM shopcart WHERE id = :ID AND statusid = 3";
        $sentence = $conn->mysql->prepare($sql);
        $sentence->bindParam(":ID",$id );

        if ($sentence->execute()) {
            if ($sentence->rowCount() > 0) {
                
                $v = $sentence->fetch();
                $this->id = $v[0];
                $this->user = $v[1];
                $s = new Status();
                $this->status = $s->getById($v[2]);
                $c = new CartItem();
                $this->itemsList = $c->getByCartId($this->id);
                return $this;
            }
        }
        return null;
    }

    public function getCurrentCart($idU) {
        $conn = new PDOConnection();

        $sql = "SELECT * FROM shopcart WHERE userid = :IDU AND statusid = 6";
        $sentence = $conn->mysql->prepare($sql);
        $sentence->bindParam(":IDU", $idU);

        if ($sentence->execute()) {
            if ($sentence->rowCount() > 0) {
                $v = $sentence->fetch();
                $this->id = $v[0];
                $this->user = $v[1];
                $s = new Status();
                $this->status = $s->getById($v[2]);
                $c = new CartItem();
                $this->itemsList = $c->getByCartId($this->id);
                return $this;
            }
        }
        return null;
    }

    public function newCart($idU) {
        $conn = new PDOConnection();

        $sql = "INSERT INTO shopcart values (null, :IDU, 6)";
        $sentence = $conn->mysql->prepare($sql);
        $sentence->bindParam(":IDU", $idU);
        if ($sentence->execute()) {
            return true;
        }
        return false;
    }

    public function buyCart() {
        $conn = new PDOConnection();
        $sql = "UPDATE shopcart SET statusid = 3 where id = :ID";
        $sentence = $conn->mysql->prepare($sql);
        $sentence->bindParam(":ID", $this->id);
        if ($sentence->execute()) {
            $sql = "INSERT INTO shopcart VALUES (null, :IDU, 6)";
            $sentence = $conn->mysql->prepare($sql);
            $sentence->bindParam(":IDU", $this->user);
            echo $this->user;
            if($sentence->execute()){
                return true;
            }
        } else {
            return false;
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getUser() {
        return $this->user;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setUser($user): void {
        $this->user = $user;
    }

    public function setStatus($status): void {
        $this->status = $status;
    }

    public function getItemsList() {
        return $this->itemsList;
    }

    public function setItemsList($itemsList): void {
        $this->itemsList = $itemsList;
    }

}
