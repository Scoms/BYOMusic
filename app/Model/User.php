<?php

App::uses('AuthComponent', 'Controller/Component');
App::import('model', 'Band');
App::import('model', 'Country');

class User extends AppModel{
	public $name = 'User';
    public $hasOne = array('Band','Manager');
    public $belongsTo = array('Country' => array(
            'classname' => 'Country'
            )
        );

    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Username required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Password required'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'band','manager')),
                'message' => 'Enter an existing role',
                'allowEmpty' => false
            )
        )
    );

    public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
    }
    return true;
}
}

?>