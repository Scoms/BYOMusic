<?php

class ManagersController extends AppController{
	
    var $uses = array('Manager','Hall');
    public $helpers = array('GoogleMap');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index','view');		
    }

    public function isAuthorized($user) {
    	return true;
    }
    
	public function view($id){
        $editable = $id == AuthComponent::user('id') ? true : false;
        $manager = $this->Manager->find('first',array('conditions'=>array('Manager.id'=>$id)));
        $halls = $this->Hall->find('all',array("conditions" => array('manager_id' => $id)));

        $this->set('halls',$halls);
        $this->set('editable',$editable);
        $this->set('manager',$manager);
        $this->set('id',$id);
	}

    public function edit($id){
        if(AuthComponent::user('id') != $id)
        {
            $this->redirect(array('controller'=>'Errors','action'=>'forbidden'));
        }
       
       $manager = $this->Manager->find('first',array(
            'conditions' => array(
                'Manager.id'=> $id ),
            'recursive' => 2
            ));

        if($this->request->is('put'))
        {
            if($this->Manager->saveAll($this->request->data,array('deep'=>true)) && $this->request->data['Manager']['id'] == $id)
            {
                $this->Session->setFlash('Data saved.');
                $this->redirect(array('action'=>'view',$id));
            }
            else
            {
                $this->Session->setFlash('Oops ! Try again.');
            }
        }
        $this->data = $manager;
        $this->set('id',$id);
    }
}

?>