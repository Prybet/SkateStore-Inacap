<?php

/**
 * Description of ProductType
 *
 * @author Prybet
 */
class ProductType {

    public $id;
    public $name;
    public $status;

    public function getAll() {
        $conn = new PDOConnection();

        $sql = "SELECT * FROM producttype";
        $sentence = $conn->mysql->prepare($sql);
        if ($sentence->execute()) {
            if ($sentence->rowCount() > 0) {
                $rs = $sentence->fetchAll();
                $list = array();
                foreach ($rs as $v) {
                    $tp = new ProductType();
                    $tp->id = $v[0];
                    $tp->name = $v[1];
                    $list[] = $tp;
                }
                return $list;
            }
        }
        return null;
    }

    public function getById($id) {
        $conn = new PDOConnection();

        $sql = "SELECT * FROM producttype WHERE id = :id";
        $sentence = $conn->mysql->prepare($sql);
        $sentence->bindParam(":id", $id);

        if ($sentence->execute()) {

            if ($sentence->rowCount() > 0) {
                $tp = new ProductType();
                $rs = $sentence->fetch();
                $tp->setId($rs[0]);
                $tp->setName($rs[1]);
                $s = new Status();
                $tp->setStatus($s->getById($rs[2]));
                return $tp;
            }
        }
        return null;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
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

    public function setStatus($status): void {
        $this->status = $status;
    }

}
