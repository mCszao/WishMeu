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
        return WishList::select(['wishlists.name', 'wishlists.description', 'i.name as item_name', 'i.observations', 'itl.min_value', 'itl.max_value', 'itl.payed_value', 'itl.conclued'])->innerJoin('itemtolists as itl', 'itl.id_list', '=', 'wishlists.id')->join('items as i', 'i.id', '=', 'itl.id_item')->where('wishlists.id', $id)->get();
    }
}