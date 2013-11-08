<?php

class AlbumsController extends AppController{
    public function beforeFilter() {
        parent::beforeFilter();	
    }

    public function isAuthorized($user) {
    	if(is_null($user['id'])){
    		return false;
    	}
    	return true;
    }

    public function add(){
    	if($this->request->is('post')){
    		$this->Album->create();
    		if($this->Album->save($this->request->data)){
    			$this->Session->setFlash('Album Created');
    		}
    		else{
    			$this->Session->setFlash('OOps');
    		}
    	}
        $this->redirect(array('controller'=>'bands','action'=>'songsManagement',AuthComponent::user('id')));
    }
}

?>