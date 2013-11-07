<?php

class SongsController extends AppController{
	
    public function beforeFilter() {
        parent::beforeFilter();	
    }

    public function isAuthorized($user) {
    	if(is_null($user['id'])){
    		return false;
    	}
    	return true;
    }

    public function remove($user_id,$song_id){

    	$song = $this->Song->find('first',array('conditions'=>array('id'=>$song_id)));

    	//If the user is the owner od the song
    	if($user_id != AuthComponent::user('id')){
    		$this->Session->setFlash('What the fuck are you doing here ??');
    	}
    	else{
    		//Remove physically 
    		$str_songPath = WWW_ROOT.DS.'files'.DS.'songs'.DS.$user_id.DS.$song['Song']['path'];
    		$this->Song->delete($song_id);
    		$this->Session->setFlash("Song removed successfully");
    	}
    	$this->redirect(array('controller'=>'bands','action'=>'songsManagement',$user_id));
    }
}

?>