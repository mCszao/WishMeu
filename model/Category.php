<?php 

namespace model;

class Category {
    private $id;
    public $name;

    public function __constructor($id, $name){
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

}


interface CategoryDAO {
    public function save(Category $cat);
    public function findAll();
    public function findByName($string);
}