<?php

namespace model;

class WishList {
    private $id;
    private $name;
    private $desc;
    private $items = [];

    public function __constructor($id, $name, $desc, $items){
        $this->id = $id;
        $this->name = $name;
        $this->desc = $desc;
        $this->items = $items;
    }

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }

    public function getDesc(){
        return $this->desc;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setDesc($description){
        $this->desc = $description;
    }
}

interface WishListDAO {
    public function save(WishList $list);
    public function findItemsByList(WhishList $list);
    public function findAll();
    public function findByName($string);
}