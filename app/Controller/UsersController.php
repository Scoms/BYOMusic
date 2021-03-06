<?php

class UsersController extends AppController{

    var $uses = array('Band','User','Manager');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add','logout','login');
    }

    public function login() {
        if ($this->request->is('post')) {
            if (!$this->Auth->login()) {
                $this->Session->setFlash(__('Bad credentials'));
            }
        }
        return $this->redirect(array('controller'=>'Home'));
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    public function listAll(){
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('User invalide'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() 
    {
        if($this->request->is('post'))
        {
            $this->User->create();
            $str_upper_role = strtoupper($this->request->data['User']['role']);
            $username = $this->request->data['User']['username'];
            //Check that the user name is free
            $userInBase = $this->User->find('first',array('conditions'=>array('username'=> $username)));
            
            if($userInBase)
            {           
                $this->Session->setFlash(__('Username is already used')); 
            }
            else
            {
                $this->User->save($this->request->data);
                //If it's a band 
                if($str_upper_role == 'BAND'){
                    $this->Band->create();
                    $this->Band->set('id', $this->User->find('first',
                        array('conditions'=>array('username'=> $username))
                    )['User']['id']);
                    var_dump($this->request->data);
                    $this->Band->set('name',$username);
                    $this->Band->save();
                }
                else if($str_upper_role == 'MANAGER'){
                    $this->Manager->create();
                    $this->Manager->set('id', $this->User->find('first',
                        array('conditions'=>array('username'=> $username))
                    )['User']['id']);
                    $this->Manager->set('name', $this->User->find('first',
                        array('conditions'=>array('username'=> $username))
                    )['User']['username']);
                    $this->Manager->save();
                }
                $this->Session->setFlash(__('Your account has been created successfuly !')); 
                return $this->redirect(array('controller'=> 'Home'));  
            }    
       }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('User Invalide'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('L\'user a été sauvegardé'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('L\'user n\'a pas été sauvegardé. Merci de réessayer.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if (!$this->User->exists()) {
            throw new NotFoundException(__('User invalide'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User supprimé'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('L\'user n\'a pas été supprimé'));
        return $this->redirect(array('action' => 'index'));
    }   
}
?>