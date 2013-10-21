<?php

class ErrorsController extends AppController
{
    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function isAuthorized($user) {
    	return true;
    }

	public function forbidden()
	{

	}
}