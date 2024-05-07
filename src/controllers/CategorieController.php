<?php

namespace src\controllers;

use \core\Controller;
use \src\models\Categorie;

class CategorieController extends Controller {
    public function add(){
        $this->render('addCategorie');
    }

    public function save(){
        $name = filter_input(INPUT_POST, 'name');
        $desc = filter_input(INPUT_POST, 'desc');

        if($name) {
            $result = Categorie::select()->where('name', $name)->execute();
            if(count($result) === 0){
                Categorie::insert([
                    'name' => $name,
                    'description' => $desc
                ])->execute();
            } else {
                Categorie::update()->set([
                    'name' => $name,
                    'description' => $desc
                ])->execute();
            }
            
            exit;
        } else {
            echo 'f';
        }
    }
}