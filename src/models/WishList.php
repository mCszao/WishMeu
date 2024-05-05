<?php

namespace src\models;

use \core\Model;
class WishList extends Model {
    public static function loadCompleteLists(){
        return WishList::select()->join('itemtolists', 'itemtolists.id_list', '=', 'wishlists.id')->get();
    }

    public static function loadResumeLists(){
        return WishList::select()->get();
    }
}