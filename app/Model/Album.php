<?php

class Album extends AppModel{
	public $id;
	public $title;
	public $band_id;
	public $hasOne = 'Song';
}

?>