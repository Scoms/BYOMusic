<?php

App::import('model', 'User');
App::import('model', 'Style');

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
			'joinTable' => 'bands_styles',
			'classname' => 'Style',
			'foreignKey' => 'band_id',
			'associatedKey' => 'style_id'
			)
		);

	public function beforeSave($options = array()) {
        foreach (array_keys($this->hasAndBelongsToMany) as $model)
        {
          if(isset($this->data[$this->name][$model])){
            $this->data[$model][$model] = $this->data[$this->name][$model];
            unset($this->data[$this->name][$model]);
          }
        }
	    return true;
	}
}

?>