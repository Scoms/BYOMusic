<?php


App::import('model', 'User');

class Country extends AppModel{
	public $hasMany = 'User';
}

?>