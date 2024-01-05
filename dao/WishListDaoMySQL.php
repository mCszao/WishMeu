<?php

namespace dao;

use \model\WishListDAO;
use \model\WishList;

class WishListDaoMySQL implements WishListDAO {

    private $pdo;

    public function __constructor(PDO $driver){
        $this->pdo = $driver;
    }
    public function save(WishList $list){
        $sql = $this->pdo->prepare("INSERT INTO wish_lists (name, desc) VALUES (:name, :desc)");
        $sql->bindValue(':name', $list->getName());
        $sql->bindValue(':desc', $list->getDesc());
        $sql->execute();
    }
    public function findItemsByList(WhishList $list){

    }
    public function findAll(){

    }
    public function findByName($string){

    }
}