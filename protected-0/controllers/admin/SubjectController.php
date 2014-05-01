<?php

class SubjectController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

        public function accessRules()
        {
            return array();
        }
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
		$model=new Subject;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $condition = array(
			'condition'=>'status=:status',
			'params'=>array(':status'=>1),
			'order'=>'name',
		);

		$types = Type::model()->findAll($condition);
		$levels = Level::model()->findAll($condition);

		$option_types = array();
		$option_levels = array();
                foreach($types as $type) {
			$option_types[$type->type_id] = $type->name;
		}

		foreach($levels as $level) {
			$option_levels[$level->level_id] = $level->name;
		}

		if(isset($_POST['Subject']))
		{
			$model->attributes=$_POST['Subject'];
			if($model->save())
				$this->redirect(array('index','id'=>$model->subject_id));
		}

		$this->render('create',array(
			'model'=>$model,
                        'option_types'	=> $option_types,
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $condition = array(
			'condition'=>'status=:status',
			'params'=>array(':status'=>1),
			'order'=>'name',
		);

		$types = Type::model()->findAll($condition);
		$levels = Level::model()->findAll($condition);

		$option_types = array();
		$option_levels = array();

                foreach($types as $type) {
			$option_types[$type->type_id] = $type->name;
		}

		foreach($levels as $level) {
			$option_levels[$level->level_id] = $level->name;
		}
                
		if(isset($_POST['Subject']))
		{
			$model->attributes=$_POST['Subject'];
			if($model->save())
				$this->redirect(array('index','id'=>$model->subject_id));
		}

		$this->render('update',array(
			'model'=>$model,
                        'option_types'	=> $option_types,
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
// 		$dataProvider=new CActiveDataProvider('Subject');
// 		$this->render('index',array(
// 			'dataProvider'=>$dataProvider,
// 		));
		$model=new Subject('search');
		$model->unsetAttributes();  // clear any default values
                if(isset($_GET['Subject']))
			$model->attributes=$_GET['Subject'];

		$this->render('admin',array(
			'model'=>$model,
		));
            
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Subject('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Subject']))
			$model->attributes=$_GET['Subject'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        public function actionType()
        {
               $level_id =  (!empty($_POST['level_id'])) ? $_POST['level_id']: '0';
               $data=Type::model()->findAll('level_id=:level_id',
                                array(':level_id'=>$level_id));

                $data=CHtml::listData($data,'type_id','name');
                foreach($data as $value=>$name)
                {
                echo CHtml::tag('option',array('value'=>$value),CHtml::encode($name),true);
                }

        }
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Subject the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Subject::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Subject $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='subject-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
