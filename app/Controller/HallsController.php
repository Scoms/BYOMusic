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
        $this->set('id',$manager_id);

        if($this->request->is('post'))
        {
            $this->Hall->set('manager_id',$manager_id);
            var_dump($this->request->data);
            if($this->Hall->save($this->request->data)){
                $this->redirect(array('controller'=>'managers','action'=>'view',AuthComponent::user('id')));
            }
        }

	}	
}

?>