<?php

App::import('model', 'User');

class Band extends AppModel{ 
	
	public $belongsTo = array(
		'User' => array(
			'classname' => 'User',
			'conditons' => array('User.role == "band"'),
			'dependent' => 'true'
			)
		);
}

?>