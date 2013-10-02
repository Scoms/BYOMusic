<?php

App::import('model', 'User');

class Manager extends AppModel{ 
    public $hasOne = 'User';
}

?>