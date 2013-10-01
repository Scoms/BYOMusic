<?php

App::import('model', 'User');

class Band extends AppModel{ 
    public $hasOne = 'User';
}

?>