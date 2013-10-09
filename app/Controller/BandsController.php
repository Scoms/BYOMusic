<?php

class BandsController extends AppController{
	
	public function index($id=null)
	{
		$band = $this->Band->find('first',array(
			'conditions' => array(
				'user_id'=> $id )
			));	

		$this->set('band',$band);
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