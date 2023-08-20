<?php

/**
 * Description of Status
 *
 * @author Prybet
 */
class Status {

    public $id;
    public $name;

    public function getById($id) {
        $conn = new PDOConnection();

        $sql = "SELECT * FROM status WHERE id = :id";
        $sentence = $conn->mysql->prepare($sql);
        $sentence->bindParam(":id", $id);

        if ($sentence->execute()) {
            if ($sentence->rowCount() > 0) {
                $s = new Status();
                $rs = $sentence->fetch();
                $s->setId($rs[0]);
                $s->setName($rs[1]);
                return $s;
            }
        }
        return null;
    }

    public function getAll() {
        $conn = new PDOConnection();

        $sql = "SELECT * FROM status";
        $sentence = $conn->mysql->prepare($sql);
        if ($sentence->execute()) {
            if ($sentence->rowCount() > 0) {
                $rs = $sentence->fetchAll();
                $list = array();
                foreach ($rs as $v) {
                    $s = new Status();
                    $s->setId($v[0]);
                    $s->setName($v[1]);
                    $list[] = $s;
                }
                return $list;
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

    public function setId($id): void {
        $this->id = $id;
    }

    public function setName($name): void {
        $this->name = $name;
    }

}
