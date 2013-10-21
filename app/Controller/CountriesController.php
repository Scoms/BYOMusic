<?php

class CountriesController extends AppController
{
	 public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('webService');		
    }

    public function isAuthorized($user) {
    	return true;
    }

	public function webService()
	{
		$pSearch = $this->request->query['pSearch'];
		$countries = $this->Country->find('all',array('limit'=>50,
			 'conditions' => array('label_en LIKE' => "%".$pSearch."%"),
   			 'fields' => array('id', 'label_en')));
		$this->layout = null ;
	    $this->set('countries', $countries); 
	}
}