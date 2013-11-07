<?php

App::uses('File', 'Utility'); 
App::uses('Folder', 'Utility'); 

class BandsController extends AppController
{
	var $uses = array('User','Band','Country','Style','Song');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index','view');		
    }

    public function isAuthorized($user) {
    	return true;
    }

	public function view($id=null)
	{
		$editable = $id == AuthComponent::user('id') ? true : false;
		$band = $this->Band->find('first',array(
			'conditions' => array(
				'user_id'=> $id ),
			'recursive' => 2
			));	

		$songs = $this->Song->find('all',array(
			'conditions' => array(
				'band_id' => $id
				),
			'limit' => 5
			));

		$this->set('band',$band);
		$this->set('songs',$songs);
		$this->set('editable',$editable);
		$this->set('id',$id);
	}

	public function edit($id) 
	{

		if(AuthComponent::user('id') != $id)
		{
			$this->redirect(array('controller'=>'Errors','action'=>'forbidden'));
		}
		
		if($this->request->is('post'))
		{
			$this->Band->create();
			if($this->Band->saveAll($this->request->data,array('deep'=>true)))
			{
				$this->Session->setFlash('Data saved.');
				$this->redirect(array('action'=>'view',$id));
			}
			else
			{
				$this->Session->setFlash('Oops ! Try again.');
			}
		}

		$band = $this->Band->find('first',array(
			'conditions' => array(
				'user_id'=> $id ),
			'recursive' => 2
			));
		$selected_styles = array();	
		foreach ($band['Style'] as $style) {
			array_push($selected_styles, $style['id']);
		}
		
		$this->set('band',$band);
		$this->set('styles',$this->Band->Style->find('list',array('fields'=>array('id','label'))));
		$this->set('styles_selected',$selected_styles);
	}

	public function songsManagement($id){

		if($this->request->is('post'))
		{
			$this->Song->create();
			$this->Song->set('band_id',$id);
			var_dump($this->Song->uploadFile($this->request->data['Song'],$id));
			if($this->Song->save($this->request->data['Song']['path']))
			{
				$this->Session->setFlash('Song uploaded');
				$this->Session->setFlash('Song uploaded');
			}
		}

		$songs_no_album = $this->Song->find('all',array('conditions'=>array('band_id'=>$id,'album_id'=>null)));//,array('conditions'=>array('band_id'=>$id)));
		$this->set('songs_no_album',$songs_no_album);
	}
}
?>