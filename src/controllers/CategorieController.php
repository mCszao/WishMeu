<?php

namespace src\controllers;

use \core\Controller;
use \src\models\Categorie;
use \src\models\Item;

class CategorieController extends Controller {
    public function add($args){
        $endpoint = "save";
        $name = "";
        $desc = "";
        if($args) {
            $slug = $args['id'];
            $result = Categorie::select()->where('id', $slug)->first();
            if(count($result) > 0) {
                $name = $result['name'];
                $desc = $result['description'];
                $endpoint = "edit/".$slug;
            }
        }
        $list = Categorie::select()->get();  
        $this->render('addCategorie',['name' => $name, 'desc' => $desc, 'endpoint' => $endpoint, 'list' => $list]);
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

    public function edit($args){
        $name = filter_input(INPUT_POST, 'name');
        $desc = filter_input(INPUT_POST, 'desc');
        if($name) {
            Categorie::update(['name' => $name, 'description' => $desc])->where('id', $args['id'])->execute();
        }
        $this->redirect('/');
    }

    public function delete($args){
        Item::update(['category_id' => '17'])->where('category_id', $args['id'])->execute();
        Categorie::delete()->where('id', $args['id'])->execute();
        $this->redirect('/categorie/add');
    }
}