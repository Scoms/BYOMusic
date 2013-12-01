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
        $editable = $id == AuthComponent::user('id') ? true : false;
        $manager = $this->Manager->find('first',array('conditions'=>array('user_id'=>$id)));

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
                'user_id'=> $id ),
            'recursive' => 2
            ));

        if($this->request->is('put'))
        {
            $this->Manager->set('user_id',$id);
            var_dump($this->data);
            if($this->Manager->saveAll($this->request->data,array('deep'=>true)))
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
    }
}

?>