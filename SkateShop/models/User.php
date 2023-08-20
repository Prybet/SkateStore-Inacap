<?php

/**
 * Description of User
 *
 * @author Prybet
 */
require_once '../../SkateShop/db/PDOConnection.php';
require_once '../../SkateShop/models/Status.php';
require_once '../../SkateShop/models/SaleDetail.php';
require_once '../../SkateShop/models/ShopCart.php';
require_once '../../SkateShop/models/CartItem.php';

class User {

    public $id;
    public $username;
    public $password;
    public $email;
    public $description;
    public $phone;
    public $status;
    public $cart;
    public $shoppingList;

    public function getLogin() {
        $conn = new PDOConnection();
        $sentence = $conn->mysql->prepare("SELECT * FROM user WHERE username = :uname and password = :pass or email = :uname and password = :pass");
        $sentence->bindParam(":uname", $this->username);
        $sentence->bindParam(":pass", $this->password);
        if ($sentence->execute()) {

            if ($sentence->rowCount() > 0) {
                $rs = $sentence->fetch();
                $this->setId($rs[0]);
                $this->setEmail($rs[3]);
                $this->setDescription($rs[4]);
                $this->setPhone($rs[5]);
                $s = new Status();
                $this->setStatus($s->getById($rs[6]));
                $c = new ShopCart();
                $this->cart = $c->getCurrentCart($this->id);
                $sa = new SaleDetail();
                $this->setShoppingList($sa->getUserById($rs[0]));
                $_SESSION["user"] = $this;
                return $this;
            }
        }
        return null;
    }

    public function insert($params) {
        $conn = new PDOConnection();
        $sentence = $conn->mysql->prepare("INSERT INTO user VALUES(null, :uname, :pass, :email, :desc, :ph, 8)");
        $sentence->bindParam(":uname", $params->username);
        $sentence->bindParam(":pass", $params->password);
        $sentence->bindParam(":email", $params->email);
        $sentence->bindParam(":desc", $params->description);
        $sentence->bindParam(":ph", $params->phone);
        $this->username = $params->username;
        $this->password = $params->password;
        if ($sentence->execute()) {
            $object = $this->getLogin();
            $sc = new ShopCart();
            if ($sc->newCart($object->id)) {
                return $this->getLogin();
            }
        } else {
            return null;
        }
    }

    public function update($params) {
        $conn = new PDOConnection();
        $sentence = $conn->mysql->prepare("UPDATE user SET password = :pass , email = :email, description = :desc, phone = :ph WHERE ID = :ID ");
        $sentence->bindParam(":pass", $params->password);
        $sentence->bindParam(":email", $params->email);
        $sentence->bindParam(":desc", $params->description);
        $sentence->bindParam(":ph", $params->phone);
        $sentence->bindParam(":ID", $params->id);

        if ($sentence->execute()) {
            $user = new User();
            $user->username = $params->username;
            $user->password = $params->password;
            
            $resp = $user->getLogin();
            return $resp;
        } else {
            return null;
        }
    }

    public function verifyUsername($username) {
        $conn = new PDOConnection();
        $sentence = $conn->mysql->prepare("SELECT username FROM user");
        if ($sentence->execute()) {
            if ($sentence->rowCount() > 0) {
                $rs = $sentence->fetchAll();
                foreach ($rs as $v) {
                    if ($username == $rs[0]) {
                        return false;
                    }
                }
                return true;
            }
        }
    }

    public function setCart($cart) {
        $conn = new PDOConnection();
        $sentence = $conn->mysql->prepare("INSERT INTO shopcart values (null, :ID, 6)");
        $sentence->bindParam(":ID", $this->id);
        if ($sentence->execute()) {
            $sen = $conn->mysql->prepare("SELECT id FROM shopcart WHERE userid = :ID AND statusid = 6");
            $sen->bindParam(":ID", $this->id);
            if ($sen->execute()) {
                $rs = $sen->fetch();
                $idC = $rs["id"];
                $cart->id = $idC;
                foreach ($itemsList as $v) {
                    $this->setItem($cart->id, $v, "setCart");
                }
            }
        }
    }

    public function setItem($idC, $item) {
        $conn = new PDOConnection();
        $sentence = $conn->mysql->prepare("INSERT INTO cartitem values (null,:AM , :IDP, :IDC, 5)");
        $sentence->bindParam("AM", $item->amount);
        $sentence->bindParam("IDP", $item->product->id);
        $sentence->bindParam("IDC", $idC);
        $sentence->execute();

        return $this->getLogin();
    }
    
    public function quitItem($item){
        $conn = new PDOConnection();
        $sentence = $conn->mysql->prepare("DELETE FROM cartitem WHERE id = :ID");
        $sentence->bindParam(":ID", $item->id);
        $sentence->execute();
        return $this->getLogin();
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setUsername($username): void {
        $this->username = $username;
    }

    public function setPassword($password): void {
        $this->password = $password;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setDescription($description): void {
        $this->description = $description;
    }

    public function setPhone($phone): void {
        $this->phone = $phone;
    }

    public function setStatus($status): void {
        $this->status = $status;
    }

    public function getShoppingList() {
        return $this->shoppingList;
    }

    public function setShoppingList($shoppingList): void {
        $this->shoppingList = $shoppingList;
    }

}
