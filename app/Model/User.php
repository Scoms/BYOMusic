<?php

App::uses('AuthComponent', 'Controller/Component');
App::import('model', 'Band');
App::import('model', 'Country');

class User extends AppModel{
	public $name = 'User';
    public $email;
    public $hasOne = array(
        'Band' => array(
            'className' => 'Band',
            'foreignKey' => 'id'
            ),
        'Manager' => array(
            'className' => 'Manager',
            'foreignKey' => 'id'
            )    
        );
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
        ),
        'email' => 'email'
    );

    public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
    }
    return true;
}
}

?>