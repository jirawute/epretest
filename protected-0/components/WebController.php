<?php

class AdminController extends CController
{
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('index','create','update','admin','delete'),
				'roles'=>array('top_admin', 'admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}	
}

?>