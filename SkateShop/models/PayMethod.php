<?php

/**
 * Description of PayMethod
 *
 * @author Prybet
 */
class PayMethod {

    public $id;
    public $name;
    public $status;

    public function getById($id) {
        $conn = new PDOConnection();

        $sql = "SELECT * FROM paymethod WHERE id = :id";
        $sentence = $conn->mysql->prepare($sql);
        $sentence->bindParam(":id", $id);

        if ($sentence->execute()) {
            if ($sentence->rowCount() > 0) {
                $rs = $sentence->fetch();
                $this->id = $rs[0];
                $this->name = $rs[1];
                $s = new Status();
                $this->status = $s->getById($rs[2]);
                return $this;
            }
        }
        return null;
    }

    public function getAll() {
        $conn = new PDOConnection();

        $sql = "SELECT * FROM paymethod WHERE statusid = 1";
        $sentence = $conn->mysql->prepare($sql);
        if ($sentence->execute()) {
            if ($sentence->rowCount() > 0) {
                $rs = $sentence->fetchAll();
                foreach ($rs as $v) {
                    $pm = new PayMethod();
                    $pm->id = $v[0];
                    $pm->name = $v[1];
                    $s = new Status();
                    $this->status = $s->getById($v[2]);
                    $list[] = $pm;
                }

                return $list;
            }
        }
        return null;
    }


}
