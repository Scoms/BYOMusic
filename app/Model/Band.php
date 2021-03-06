<?php

App::import('model', 'User');
App::import('model', 'Style');

class Band extends AppModel{ 
	public $id;

	public $belongsTo = array(
		'User' => array(
			'classname' => 'User',
			'dependent' => 'true',
			'foreignKey' => 'id'
			)
		);

	public $hasAndBelongsToMany = array(
		'Style' => array(
			'joinTable' => 'bands_styles',
			'classname' => 'Style',
			'foreignKey' => 'band_id',
			'associatedKey' => 'style_id'
			),
		"Events" =>array(
			"joinTable" => "bands_events"
			)
		);

	//public $hasOne = array('Song','Album');

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