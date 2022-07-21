<?php

abstract class Bdd {
protected $Bdd;

    function __construct() {
        $this->Bdd = new PDO('mysql:host=localhost;dbname=hmetal;charset=utf8','root','');
    }

}

?>