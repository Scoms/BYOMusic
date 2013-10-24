<?php

class BandsController extends AppController
{
	var $uses = array('User','Band','Country');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index','view');		
    }

    public function isAuthorized($user) {
    	return true;
    }

	public function view($id=null)
	{
		$editable = $id == AuthComponent::user('id') ? true : false;
		$band = $this->Band->find('first',array(
			'conditions' => array(
				'user_id'=> $id ),
			'recursive' => 2
			));	

		$this->set('band',$band);
		$this->set('editable',$editable);
		$this->set('id',$id);
	}

	public function edit($id) 
	{

		if(AuthComponent::user('id') != $id)
		{
			$this->redirect(array('controller'=>'Errors','action'=>'forbidden'));
		}
		
		if($this->request->is('post'))
		{
			var_dump($this->request->data);
			$this->Band->create();
			if($this->Band->saveAll($this->request->data,array('deep'=>true)))
			{
				$this->Session->setFlash('Data saved.');
			}
			else
			{
				$this->Session->setFlash('Oops ! Try again.');
			}
		}

		$band = $this->Band->find('first',array(
			'conditions' => array(
				'user_id'=> $id ),
			'recursive' => 2
			));	
		$this->set('band',$band);
	}

	public function index(){

	}
}
?>