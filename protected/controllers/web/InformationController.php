<?php

class InformationController extends Controller
{

	public $layout;
	
	public function actionIndex()
	{
		$this->layout = '//layouts/information_list';
		
		$criteria=new CDbCriteria();
		$criteria->select='*';
		$criteria->condition='status=:status';
		$criteria->params=array(':status'=>1);
		$criteria->order='date_added desc';

		$information_total = Information::model()->count($criteria);
	
		$pages = new CPagination($information_total);
                $pages->setPageSize(10);
                $pages->applyLimit($criteria);

		$informations = Information::model()->findAll($criteria);
	
		$this->render('index', array(
			'informations'	=> $informations,
			'pages'			=> $pages,
		));
	}
	
	public function actionView($id)
	{
		$this->layout = '//layouts/information_view';
	
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Information the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Information::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

}