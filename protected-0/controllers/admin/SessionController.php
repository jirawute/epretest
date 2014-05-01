<?php

class SessionController extends AdminController
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

        public function actionSearch($id){

            echo $id;
            $model=new Session('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Session']))
			$model->attributes=$_GET['Session'];

		$this->render('admin',array(
			'model'=>$model,
		));

        }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$examAll= Exam::model()->findAll('status=1');
		$examOption = array();
		foreach($examAll as $exam) {
			$examOption[$exam->exam_id] = $exam->name;
		}

                $answerTypeAll= AnswerType::model()->findAll();
		$answerTypeOption = array();
		foreach($answerTypeAll as $answerType) {
			$answerTypeOption[$answerType->answer_type_id] = $answerType->answer_type_name;
		}

                $model=new Session;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Session']))
		{
			$model->attributes=$_POST['Session'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('create',array(
			'model'=>$model,
                        'examOption'=>$examOption,
                        'answerTypeOption'=>$answerTypeOption,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$examAll= Exam::model()->findAll('status=1');
		$examOption = array();
		foreach($examAll as $exam) {
			$examOption[$exam->exam_id] = $exam->name;
		}
                
                $answerTypeAll= AnswerType::model()->findAll();
		$answerTypeOption = array();
		foreach($answerTypeAll as $answerType) {
			$answerTypeOption[$answerType->answer_type_id] = $answerType->answer_type_name;
		}

                $model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Session']))
		{
			$model->attributes=$_POST['Session'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('update',array(
			'model'=>$model,
                        'examOption'=>$examOption,
                        'answerTypeOption'=>$answerTypeOption,
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
		/*$dataProvider=new CActiveDataProvider('Session');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
                $answerTypeAll= AnswerType::model()->findAll();
		$answerTypeOption = array();
		foreach($answerTypeAll as $answerType) {
			$answerTypeOption[$answerType->answer_type_id] = $answerType->answer_type_name;
		}

                $model=new Session('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Session']))
			$model->attributes=$_GET['Session'];

		$this->render('admin',array(
			'model'=>$model,
                        'answerTypeOption'=>$answerTypeOption,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
                $answerTypeAll= AnswerType::model()->findAll();
		$answerTypeOption = array();
		foreach($answerTypeAll as $answerType) {
			$answerTypeOption[$answerType->answer_type_id] = $answerType->answer_type_name;
		}

		$model=new Session('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Session']))
			$model->attributes=$_GET['Session'];

		$this->render('admin',array(
			'model'=>$model,
                        'answerTypeOption'=>$answerTypeOption,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Session::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

        public function loadModelByExamId($id)
	{
		$model=Session::model()->findByAttributes(array('exam_id'=>$id));

		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='session-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
