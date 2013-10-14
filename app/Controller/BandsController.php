<?php

class BandsController extends AppController
{
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index','view');
    }

    public function isAuthorized($user = null) {
    	//return true;
    	//$this->Session->setFlash('Gordon','default',array('class'=>'flashGordon'));
    	$this->Session->setFlash('You must be logged to access that location.');
    }

	public function view($id=null)
	{
		$editable = $id == AuthComponent::user('id') ? true : false;
		$band = $this->Band->find('first',array(
			'conditions' => array(
				'user_id'=> $id )
			));	

		$this->set('band',$band);
		$this->set('editable',$editable);
		$this->set('id',$id);
	}

	public function edit() 
	{

	}

	public function index(){

	}
	/*public function edit()
	{
		$this->log('ta race');
		$this->redirect('bra');
	}*/
}
?>