<?php 
namespace src\controllers;

use \core\Controller;
use \src\models\ItemToList;

class ItemToListController extends Controller {
    public function addItemToList(){
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
        $idList = ItemToList::select('id_list')->where('id', $id)->one();
        ItemToList::delete()->where('id', $id)->execute();
        
        $this->redirect('/list/'.$idList['id_list']);
    }

    public function edit($args){
        $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        ItemToList::update(['min_value' => $data['min'],
                            'max_value' => $data['max'],
                            'payed_value' => $data['payed']]
        )->where('id', $args['id'])->execute();
        
    }

    public function setConclued($args){
        $id = $args['id'];
        $correlationItem = ItemToList::select(['conclued', 'id_list'])->where('id', $id)->one();
        echo json_encode(['status' => false, 'data' => $correlationItem['conclued']]);
        if($correlationItem['conclued'] === '0'){
            ItemToList::update(['conclued' => true])->where('id', $id)->execute();
        } 
        if($correlationItem['conclued'] === '1') {
            ItemToList::update(['conclued' => false])->where('id', $id)->execute();
        }
        
        // $this->redirect('/list/'.$correlationItem['id_list']);
    }
}