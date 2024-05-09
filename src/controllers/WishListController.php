<?php

namespace src\controllers;

use \core\Controller;
use \src\models\WishList;
use \src\models\Item;
class WishListController extends Controller {

    
    public function add(){
        $this->render('addWishList');
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

    public function details($args){
        $idList = $args['id'];
        $list = WishList::loadInfoList($idList);
        $items = Item::select(['items.id', 'items.name', 'observations', 'c.name as cat_name'])->innerJoin('categories as c', 'c.id', '=', 'items.category_id')->get();
        $total = 0;
        $totalMax = 0;
        $totalMin = 0;
        if(count($list) === 0) {
            $newArr[1] = 'Sem items';
            $withoutItem = true;
        }else {
            $newArr = array_values($list[0]);
            $withoutItem = false;
        }; 
        $this->render('details', ['idList' => $idList,'list' => $list, 'name' => $newArr[1], 'withoutItem' => $withoutItem, 'tot' => $total,'totMax' => $totalMax, 'totMin' => $totalMin, 'items' => $items ]);
    }
}