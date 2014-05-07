<?php

class WebServicesController extends AppController{

	var $uses = array('Band','Manager');

    public function beforeFilter() {
        parent::beforeFilter();	
        $this->Auth->allow(); 
    }

    public function isAuthorized($user) {
    	return true;
    }

    public function searchAll(){
		$pSearch = $this->request->query['pSearch'];
		$bands = $this->Band->find('all',array('limit'=>50,
			 'conditions' => array('band.name LIKE' => "%".$pSearch."%"),
   			 'fields' => array('band.id', 'name')));
        $managers = $this->Manager->find('all',array('limit'=>50,
             'conditions' => array('manager.name LIKE' => "%".$pSearch."%"),
             'fields' => array('manager.id', 'name')));
		$this->layout = null ;

        $this->set('bands', $bands); 
	    $this->set('managers', $managers); 
    }
}

?>