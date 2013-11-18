<?php

class ManagersController extends AppController{
	
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index','view');		
    }

    public function isAuthorized($user) {
    	return true;
    }
    
	public function view($id){
	}
}

?>