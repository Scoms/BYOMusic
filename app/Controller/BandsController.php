<?php

class BandsController extends AppController{
	
	public function index()
	{
        $this->Band->recursive = 0;
		$this->set('bands',$this->paginate());
	}
}
?>