<?php

namespace model;

class Item {
    private $id;
    private $name;
    private $observations;
    private $minValue;
    private $maxValue;
    private $category;

    public function __constructor($id, $name, $observation, $min, $max, $category){
        $this->id = $id;
        $this->name = $name;
        $this->observations = $observation;
        $this->minValue = $min;
        $this->maxValue = $max;
    }
}

interface ItemDAO {
    public function save(Item $item);
    public function findAll();
    public function findById($id);
    public function findByName($string);
}