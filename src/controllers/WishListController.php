<?php

namespace src\controllers;

use \core\Controller;
use \src\models\WishList;
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
        $list = WishList::loadInfoList($args['id']);
        if(count($list) === 0) {
            $newArr[1] = 'Sem items';
            $withoutItem = true;
        }else {
            $newArr = array_values($list[0]);
            $withoutItem = false;
        }; 
        $this->render('details', ['list' => $list, 'name' => $newArr[1], 'withoutItem' => $withoutItem ]);
    }
}