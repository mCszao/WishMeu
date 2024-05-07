<?php

namespace src\controllers;

use \core\Controller;
use \src\models\WishList;

class HomeController extends Controller {
    public function index(){
        $list = WishList::loadResumeLists();
        $this->render('home', ['list' => $list]);
    }

    
}