<?php

class BandsController extends AppController{
	
	public function index($id=null)
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
	
	
	public function show()
	{
		$this->Band->recursive = 0;
		$this->set('band',$this->paginate());
		/*
		$band = $this->Band->find('first',array(
			'conditions' => array(
				'id'=>$id)
			));	

        $this->Band->recursive = 0;
		$this->set('band',$this->paginate());
		*/
	}
}
?>