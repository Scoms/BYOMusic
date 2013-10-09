<?php

class HomeController extends AppController
{
    var $uses = array('Band','User');

	public function index()
	{
		$bandsDisplay = array();
		
		$bands = $this->User->find('all',array(
			'limit' => 5,
			'conditions' => array(
				array('role' => 'band'
				)),
			'order' => 'created desc'
		));


		foreach ($bands as $band) 
		{
			$user = $this->User->find('first',array(
				"conditions" => array(
					"id"=> $band['Band']['user_id']
					),
				"limit"=>5
				));
			array_push($bandsDisplay, array(
				"Display"=> $user
				));
		}

		$this->set('bands',$bandsDisplay);
		$this->set('title_for_layout','');
	}
}

?>