<?php

App::import('model', 'User');
App::import('model', 'Country');

class Band extends AppModel{ 
	//public $belongsTo = array('User','Country');
	public $belongsTo = array(
		'User' => array(
			'classname' => 'User',
			'conditons' => array('User.role == "band"'),
			'dependent' => 'true'
			),
		'Country'
		);
}

?>