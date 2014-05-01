<?php

class TypeController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
                $option_levels = $this->levelOption();
		$model=new Type;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Type']))
		{
			$model->attributes=$_POST['Type'];
			if($model->save())
				$this->redirect(array('index','id'=>$model->type_id));
		}

		$this->render('create',array(
			'model'=>$model,
                        'option_levels'	=> $option_levels,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
                $option_levels = $this->levelOption();
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Type']))
		{
			$model->attributes=$_POST['Type'];
			if($model->save())
				$this->redirect(array('index','id'=>$model->type_id));
		}

		$this->render('update',array(
			'model'=>$model,
                        'option_levels'	=> $option_levels,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
// 		$dataProvider=new CActiveDataProvider('Type');
// 		$this->render('index',array(
// 			'dataProvider'=>$dataProvider,
// 		));
                $option_levels = $this->levelOption();
		$model=new Type('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Type']))
			$model->attributes=$_GET['Type'];

		$this->render('admin',array(
			'model'=>$model,
                        'option_levels'=> $option_levels,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
                $option_levels = $this->levelOption();
		$model=new Type('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Type']))
			$model->attributes=$_GET['Type'];

		$this->render('admin',array(
			'model'=>$model,
                        'option_levels'	=> $option_levels,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Type the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Type::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

         public function levelOption()
	{
                $condition = array(
                                    'condition'=>'status=:status',
                                    'params'=>array(':status'=>1),
                                    'order'=>'level_id',
                            );
		$levels=  Level::model()->findAll($condition);

                $option_levels = array();

		if(is_array($levels)){
                    foreach($levels as $level) {
                        $option_levels[$level->level_id] = $level->name;
                    }
                    return $option_levels;
                }
	}

	/**
	 * Performs the AJAX validation.
	 * @param Type $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='type-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
