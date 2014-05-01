<?php

class InformationController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	
	public $upload_path;
	
	public function init() {
		$this->upload_path = Yii::app()->basePath . '/../uploads/information/';
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
		$model=new Information;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Information']))
		{
			$_POST['Information']['user_id'] = Yii::app()->user->id;
			$_POST['Information']['date_added'] = date('Y-m-d H:i:s');
		
			$model->attributes=$_POST['Information'];
			
			$image = CUploadedFile::getInstance($model, 'image');	
	
			if($image) {

				$genName = 'info_' . date('YmdHis');
				$saveName = $genName;
				
				while(file_exists($this->upload_path . $saveName . '.' . $image->getExtensionName())) {
					$saveName = $genName . '-' . rand(0,99);
				}
					
				$model->image = $saveName . '.' . $image->getExtensionName();
			}	

			if($model->save()) {
				if($image) {
					$image->saveAs($this->upload_path . $model->image);
				}
				
				$this->redirect(array('index','id'=>$model->information_id));
			}
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

		if(isset($_POST['Information']))
		{
			$record_image = $model->image;
		
			$model->attributes=$_POST['Information'];
			
			$image = CUploadedFile::getInstance($model, 'image');	
		
			if($image) {			
				$genName = 'info_' . date('YmdHis');
				$saveName = $genName;
				
				while(file_exists($this->upload_path . $saveName . '.' . $image->getExtensionName())) {
					$saveName = $genName . '-' . rand(0,99);
				}
					
				$model->image = $saveName . '.' . $image->getExtensionName();
			}
			
			if($model->save()) {
				if($image) {
					if(file_exists($this->upload_path . $record_image)) {
						@unlink($this->upload_path . $record_image);
					}
				
					$image->saveAs($this->upload_path . $model->image);
				}
				
				$this->redirect(array('index','id'=>$model->information_id));
			}
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
		$this->loadModel($id)->delete();

		if(file_exists($this->upload_path . $model->image)) {
			@unlink($this->upload_path . $model->image);
		}

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
// 		$dataProvider=new CActiveDataProvider('Information');
// 		$this->render('index',array(
// 			'dataProvider'=>$dataProvider,
// 		));

		$model=new Information('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Information']))
			$model->attributes=$_GET['Information'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Information('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Information']))
			$model->attributes=$_GET['Information'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

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

	/**
	 * Performs the AJAX validation.
	 * @param Information $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='information-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
