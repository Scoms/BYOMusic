<?php

class HallsController extends AppController{
	
	public $helpers = array('GoogleMap');
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index','view');		
    }

    public function isAuthorized($user) {
    	return true;
    }

	public function create($manager_id){

	}	
}

?>