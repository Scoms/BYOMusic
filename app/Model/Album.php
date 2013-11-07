<?php

class Album extends AppModel{
	public $id;
	public $title;
	public $hasOne = 'Song';
}

?>