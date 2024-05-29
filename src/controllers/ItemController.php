<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Item;
use \src\models\Categorie;
use \src\models\ItemToList;

class ItemController extends Controller {
    public function index(){
        $items = $items = Item::select(['items.id', 'items.name', 'observations', 'c.name as cat_name'])->innerJoin('categories as c', 'c.id', '=', 'items.category_id')->get();
        echo json_encode($items);
    }
    public function add($args){
        $endpoint = "save";
        $name = "";
        $obs = "";
        $cat = "";
        if($args) {
            $slug = $args['id'];
            $result = Item::select()->where('id', $slug)->first();
            if(count($result) > 0) {
                $name = $result['name'];
                $obs = $result['observations'];
                $cat = $result['category_id'];
                $endpoint = "edit/".$slug;
            }
        }
        $list = Item::select()->get();  
        $categories = Categorie::select(['id','name'])->get();
        $this->render('addItem', ['categories' => $categories, 'endpoint' => $endpoint, 'list' => $list, 'name' => $name, 'obs' => $obs, 'selectedCat' => $cat]);
    }

    public function save(){
        $name = filter_input(INPUT_POST, 'name');
        $obs = filter_input(INPUT_POST, 'observations');
        $categorie = filter_input(INPUT_POST, 'categorie');

        if($name && $categorie) {
            $hasCat = Categorie::select()->where('id', $categorie)->execute();
            if(count($hasCat) > 0){
                $result = Item::select()->where('name', $name)->execute();
                if(count($result) === 0) {
                    Item::insert([
                        'name' => $name,
                        'observations' => $obs,
                        'category_id' => $categorie
                    ])->execute();
                }
            } else {
                echo 'Categoria informada não existe';
            }
        }
        $this->redirect('/item/add');
    
    }

    public function edit($args){
        $name = filter_input(INPUT_POST, 'name');
        $obs = filter_input(INPUT_POST, 'observations');
        $categorie = filter_input(INPUT_POST, 'categorie');

        $idItem = $args['id'];
        if($name && $categorie){
            Item::update([
                'name' => $name,
                'observations' => $obs,
                'category_id' => $categorie
                ])->where('id', $idItem)->execute();
        }
        $this->redirect('/item/add');
    }

    public function delete($args){
        $id = $args['id'];
        if($id){
            Item::delete()->where('id', $id)->execute();
        }
        $this->redirect('/item/add');
    }

}