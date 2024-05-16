<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Item;
use \src\models\Categorie;
use \src\models\ItemToList;

class ItemController extends Controller {
    public function add(){
        $categories = Categorie::select(['id','name'])->get();
        $this->render('addItem', ['categories' => $categories]);
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

    public function itemToList(){
        $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        ItemToList::insert([
            'id_list' => $data['idList'],
            'id_item' => $data['itemId'],
            'max_value' => $data['max'],
            'min_value' => $data['min']
        ])->execute();

    }

    public function delete($args){
        $id = $args['id'];
        $idList = ItemToList::select('id_list')->where('id', $id)->get();
        ItemToList::delete()->where('id', $id)->execute();
        
        $this->redirect('/list/'.$idList);
    }
}