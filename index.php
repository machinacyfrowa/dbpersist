<?php
class GPU {

    private $vram;
    private $clock;
    private $model;
    private $vendor;

    public function __construct($v = '', $m = '', $c = 0, $r = 0) {
        $this->vram = $r;
        $this->clock = $c;
        $this->model = $m;
        $this->vendor = $v;
    }

    public function getFromDB($db, $id) {
        $q = "SELECT * FROM `gpu` WHERE `id` = $id";
        $result = $db->query($q);
        $row = $result->fetch_assoc();
        $this->vendor = $row['vendor'];
        $this->model = $row['model'];
        $this->clock = $row['clock'];
        $this->vram = $row['vram'];
    }

    public function addToDb($db) {
        $q = "INSERT INTO `gpu` (`id`, `vendor`, `model`, `clock`, `vram`) VALUES (NULL, '$this->vendor', '$this->model', '$this->clock', '$this->vram');";
        $db->query($q);
    }
}

$db = new mysqli('localhost', 'root', '', 'test');


$gpu1 = new GPU('nVidia', '1030', 1257, 2);

//$gpu1->addToDb($db);

$gpu2 = new GPU();
$gpu2->getFromDB($db, 3);

echo '<pre>';
var_dump($gpu2);

?>