<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Item;

class ItemController extends Controller {
    public function add(){
        $this->render('addItem');
    }

    public function save(){

    }
}