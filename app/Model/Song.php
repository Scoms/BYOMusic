<?php

class Song extends AppModel
{
	public $id;
	public $path;

	public $validate = array(
	'path' => array(
	    'extension' => array(
	        'rule' => array('extension', array('flac','mp4','waw','mp3')),
	        'message' => 'Only audio files',
	         )
	)
	);
	public function uploadFile($check,$id) {

	    $uploadData = array_shift($check);
	    if ( $uploadData['size'] == 0 || $uploadData['error'] !== 0) {
	        return false;
	    }
	
	    $fileName = $uploadData['name'];
	    $folderPath = WWW_ROOT.'files/songs'.DS.$id.DS;
	    $uploadPath = $folderPath.DS.$fileName;
	    if( !file_exists($folderPath) ){
	        mkdir($folderPath);
	    }

	    if (move_uploaded_file($uploadData['tmp_name'], $uploadPath)) {
	        $this->set('path', $fileName);
	        return true;
	    }
	 
	    return false;
	}
}

?>