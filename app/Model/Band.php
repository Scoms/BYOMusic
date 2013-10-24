<?php

App::import('model', 'User');

class Band extends AppModel{ 
	public $id;
	
	public $belongsTo = array(
		'User' => array(
			'classname' => 'User',
			'conditons' => array('User.role == "band"'),
			'dependent' => 'true'
			)
		);

	public $hasAndBelongsToMany = array(
		'Style' => array(
			'classname' => 'Style',
			'foreignKey' => 'band_id',
			'associatedKey' => 'style_id'
			)
		);
}

?>