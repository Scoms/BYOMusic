<?php

class Event extends AppModel{
	public $id;
	public $description;
	public $date;
	public $hall_id;

	public $belongsTo = array("Hall");

	public $hasAndBelongsToMany = array("Band" =>array(
		"joinTable" => "bands_events"
		)
	)
	;

	/*$options['joins'] = array(
    array('table' => 'channels',
        'alias' => 'Channel',
        'type' => 'LEFT',
        'conditions' => array(
            'Channel.id = Item.channel_id',
        	)
    	)
	)	;*/
}

?>