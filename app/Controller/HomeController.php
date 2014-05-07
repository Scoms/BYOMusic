<?php

class HomeController extends AppController
{
    var $uses = array('Band','User','Event');

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

		$events = $this->Event->find('all',array(
			"limit"=>"5",
			"contain"=>array('Hall'))
		);
		$this->set('bands',$bands);
		$this->set('events',$events);
		$this->set('title_for_layout','');
	}
}

?>