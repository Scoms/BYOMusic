<?php

class HallsController extends AppController{
	
    public $helpers = array('GoogleMap');
	var $uses = array('Event','Hall');
    
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
        $this->redirect(array('controller'=>'managers','action'=>'view',AuthComponent::user('id')));

	}	

    public function createDate(){
        $halls = $this->Hall->find("list",array(
            "fields" => array("id","name"),
            "conditions" => array('manager_id' => AuthComponent::user('id'))
            )
        ); 
        
        $this->set("halls",$halls);   

        if($this->request->is('post')){
            var_dump($this->request->data);
            if($this->Event->save($this->request->data)){
                $this->Session->setFlash("Done");
            }
            else{
                $this->Session->setFlash("Opps");
            }

        }    
    }

    public function remove($id){
        $this->Hall->delete($id);
        $this->redirect(array('controller' => 'managers', 'action'=>'view',AuthComponent::user('id')));
    }
}

?>