<?php

class StudentController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	

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
		$model=new Student;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Student']))
		{
                        list($d,$m,$y) = explode("/",$_POST['Student']['birthday']);
                        $birthday = ($y-543)."-".$m."-".$d;
                        $_POST['Student']['birthday']  = $birthday;
			$model->attributes=$_POST['Student'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->student_id));
		}

		$this->render('create',array(
			'model'=>$model,
                        'option_levels'=>$option_levels,
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

		if(isset($_POST['Student']))
		{
                        list($d,$m,$y) = explode("/",$_POST['Student']['birthday']);
                        $birthday = ($y-543)."-".$m."-".$d;
                        $_POST['Student']['birthday']  = $birthday;
			$model->attributes=$_POST['Student'];
			if($model->save())
				$this->redirect(array('index','id'=>$model->student_id));
		}

		$this->render('update',array(
			'model'=>$model,
                        'option_levels'=>$option_levels,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		/*$dataProvider=new CActiveDataProvider('Student');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
                $option_levels = $this->levelOption();
                $model=new Student('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Student']))
			$model->attributes=$_GET['Student'];

		$this->render('admin',array(
			'model'=>$model,
                        'option_levels'=>$option_levels,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
                $option_levels = $this->levelOption();
		$model=new Student('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Student']))
			$model->attributes=$_GET['Student'];

		$this->render('admin',array(
			'model'=>$model,
                        'option_levels'=>$option_levels,
		));
	}
        

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Student::model()->findByPk($id);
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
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
