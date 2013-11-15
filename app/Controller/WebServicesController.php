<?php

class WebServicesController extends AppController{

	var $uses = array('Band','Manager');

    public function beforeFilter() {
        parent::beforeFilter();	
    }

    public function isAuthorized($user) {
    	return true;
    }

    public function searchAll(){
		$pSearch = $this->request->query['pSearch'];
		$bands = $this->Band->find('all',array('limit'=>50,
			 'conditions' => array('name LIKE' => "%".$pSearch."%"),
   			 'fields' => array('id', 'name')));
		$this->layout = null ;
	    $this->set('bands', $bands); 
    }
}

?>