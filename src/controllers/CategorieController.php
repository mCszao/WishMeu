<?php

namespace src\controllers;

use \core\Controller;
use \src\models\Categorie;

class CategorieController extends Controller {
    public function add(){
        $endpoint = "save";
        $name = "";
        $desc = "";
        $this->render('addCategorie',['name' => $name, 'desc' => $desc, 'endpoint' => $endpoint]);
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
            }
        }
        $this->redirect('/categorie/add');
    }
}