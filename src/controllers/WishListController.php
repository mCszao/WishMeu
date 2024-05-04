<?php

namespace src\controllers;

use \core\Controller;

class WishListController extends Controller {
    public function add(){
        $this->render('addWishList');
    }
}