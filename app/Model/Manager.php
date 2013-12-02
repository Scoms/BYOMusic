<?php

App::import('model', 'User','Hall');

class Manager extends AppModel{ 
	public $id;
	public $name;

	public $hasOne = array(
		'Hall' => array(
			'className' => 'Hall',
			'foreignKey' => 'manager_id' 
			)
		);
}

?>