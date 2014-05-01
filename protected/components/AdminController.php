<?php

class AdminController extends CController
{

	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	public $showMenu = true;
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

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
				'actions'=>array('index','view','create','update','admin','delete'),
				'roles'=>array('top_admin', 'admin'),
			),
			array('allow',
				'actions'=>array('login'),
				'users'=>array('*'),
			),
			array('allow',
				'actions'=>array('logout'),
				'users'=>array('@'),
			),
			array('allow',
				'actions'=>array('error'),
				'users'=>array('@'),
			),
			array('allow',
				'actions'=>array('page'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}	
}

?>