<?php

namespace Models;

abstract class DbConnect {

    protected $pdo;

    protected function connect() {
        $this->pdo = new \PDO("mysql:host=localhost:3306;dbname=mutuelle;charset=utf8", "root","");
    }

    abstract function insert();
    abstract function update();
    abstract function delete();
    abstract function select();
    abstract function selectAll();
}