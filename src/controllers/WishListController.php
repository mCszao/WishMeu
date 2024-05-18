<?php

namespace src\controllers;

use \core\Controller;
use \src\models\WishList;
use \src\models\Item;
use \src\models\ItemToList;
class WishListController extends Controller {

    
    public function add($args){
        $name = "";
        $desc = "";
        $endpoint = "save";
        if($args) {
            $slug = $args['id'];
            $result = WishList::select()->where('id', $slug)->first();
            if(count($result) > 0) {
                $name = $result['name'];
                $desc = $result['description'];
                $endpoint = "edit/".$slug;
            }
        }            
        $this->render('addWishList', ['name' => $name, 'desc' => $desc, 'endpoint' => $endpoint]);
    }

    public function save(){
        $name = filter_input(INPUT_POST, 'name');
        $desc = filter_input(INPUT_POST, 'desc');

        if($name) {
            $result = WishList::select()->where('name', $name)->execute();
            if(count($result) === 0){
                WishList::insert([
                    'name' => $name,
                    'description' => $desc
                ])->execute();
            }
        }
        $this->redirect('/list/add');
    }

    public function edit($args){
        $name = filter_input(INPUT_POST, 'name');
        $desc = filter_input(INPUT_POST, 'desc');
        if($name) {
            WishList::update(['name' => $name, 'description' => $desc])->where('id', $args['id'])->execute();
        }
        $this->redirect('/');
    }

    public function details($args){
        $idList = $args['id'];
        $list = WishList::loadInfoList($idList);
        $items = Item::select(['items.id', 'items.name', 'observations', 'c.name as cat_name'])->innerJoin('categories as c', 'c.id', '=', 'items.category_id')->get();
        $total = 0;
        $totalMax = 0;
        $totalMin = 0;
        $this->render('details', ['idList' => $idList,'list' => $list, 'name' => $list[0]['name'], 'tot' => $total,'totMax' => $totalMax, 'totMin' => $totalMin, 'items' => $items ]);
    }

    public function delete($args){
        $idList = $args['id'];
        ItemToList::delete()->where('id_list', $idList)->execute();
        WishList::delete()->where('id', $idList)->execute();
        
        $this->redirect('/');
    }
}