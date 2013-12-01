<?php

App::uses('File', 'Utility'); 
App::uses('Folder', 'Utility'); 

class BandsController extends AppController
{
	var $uses = array('User','Band','Country','Style','Song','Album');

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
			'recursive' => 2,
			'condtions' => array(
				'id' => $id
				)
			)
		);
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
				$this->redirect(array('action'=>'view',$id));
			}
			else
			{
				$this->Session->setFlash('Oops ! Try again.');
			}
		}

		$band = $this->Band->find('first',array(
			'recursive' => 2,
			'condtions' => array(
				'id' => $id
				)
			)
		);
		$selected_styles = array();	
		foreach ($band['Style'] as $style) {
			array_push($selected_styles, $style['id']);
		}

		$this->set('band',$band);
		$this->set('id',$id);
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
			}
		}

		$albums = $this->Album->find('list',array('conditions'=>array('Album.band_id'=>$id),'fields'=>array('id','title')));
		$albums_for = $this->Album->find('all',array('conditions'=>array('Album.band_id'=>$id),'fields'=>array('id','title')));
		$songs = $this->Song->find('all',array('conditions'=>array('band_id'=>$id)));//,array('conditions'=>array('band_id'=>$id)));
		$this->set('songs',$songs);
		$this->set('albums',$albums);
		$this->set('id',$id);
		$this->set('albums_for',$albums_for);
	}
}
?>