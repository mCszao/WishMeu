<?php

namespace src\models;

use \core\Model;
class WishList extends Model {
    public static function loadCompleteLists(){
        return WishList::select(['wishlists.name', 'wishlists.description', 'i.name as item_name', 'i.observations', 'itl.min_value', 'itl.max_value', 'itl.payed_value', 'itl.conclued'])->innerJoin('itemtolists as itl', 'itl.id_list', '=', 'wishlists.id')->join('items as i', 'i.id', '=', 'itl.id_item')->get();
    }

    public static function loadResumeLists(){
        return WishList::select()->get();
    }

    public static function loadInfoList($id){
        $list = WishList::select(['wishlists.id','wishlists.name','itl.id as id_item_lista','i.name as item_name', 'i.observations','c.name as categorie_name', 'itl.min_value', 'itl.max_value', 'itl.payed_value', 'itl.conclued', 'itl.id as item_list_id'])->innerJoin('itemtolists as itl', 'itl.id_list', '=', 'wishlists.id')->join('items as i', 'i.id', '=', 'itl.id_item')->join('categories as c', 'c.id', '=', 'i.category_id')->where('wishlists.id', $id)->execute();
        if(count($list) === 0) {
            $list = WishList::select()->where('id', $id)->get();
        }
        return $list;
    }
}