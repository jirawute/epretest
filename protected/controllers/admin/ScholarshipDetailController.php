<?php

class ScholarshipDetailController extends AdminController
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
		$model=new ScholarshipDetail;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ScholarshipDetail']))
		{
                        list($d, $m, $y) = explode("/", $_POST['ScholarshipDetail']['period_start']);
                        $period_start = $y. "-" . $m . "-" . $d;
                        $_POST['ScholarshipDetail']['period_start'] = $period_start;

                        list($d2, $m2, $y2) = explode("/", $_POST['ScholarshipDetail']['period_end']);
                        $period_end = $y2. "-" . $m2 . "-" . $d2;
                        $_POST['ScholarshipDetail']['period_end'] = $period_end;

                        list($d3, $m3, $y3) = explode("/", $_POST['ScholarshipDetail']['announce_date']);
                        $announce_date = $y3. "-" . $m3 . "-" . $d3;
                        $_POST['ScholarshipDetail']['announce_date'] = $announce_date;
                        
			$model->attributes=$_POST['ScholarshipDetail'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('create',array(
			'model'=>$model,
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

		if(isset($_POST['ScholarshipDetail']))
		{
                        list($d, $m, $y) = explode("/", $_POST['ScholarshipDetail']['period_start']);
                        $period_start = $y. "-" . $m . "-" . $d;
                        $_POST['ScholarshipDetail']['period_start'] = $period_start;

                        list($d2, $m2, $y2) = explode("/", $_POST['ScholarshipDetail']['period_end']);
                        $period_end = $y2. "-" . $m2 . "-" . $d2;
                        $_POST['ScholarshipDetail']['period_end'] = $period_end;

                        list($d3, $m3, $y3) = explode("/", $_POST['ScholarshipDetail']['announce_date']);
                        $announce_date = $y3. "-" . $m3 . "-" . $d3;
                        $_POST['ScholarshipDetail']['announce_date'] = $announce_date;

			$model->attributes=$_POST['ScholarshipDetail'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('update',array(
			'model'=>$model,
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
//		$dataProvider=new CActiveDataProvider('ScholarshipDetail');
//		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
//		));
            	$model=new ScholarshipDetail('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ScholarshipDetail']))
			$model->attributes=$_GET['ScholarshipDetail'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ScholarshipDetail('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ScholarshipDetail']))
			$model->attributes=$_GET['ScholarshipDetail'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=ScholarshipDetail::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='scholarship-detail-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
