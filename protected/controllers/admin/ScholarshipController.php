<?php

class ScholarshipController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';
        public $upload_path;
        public $thai_month_arr = array(
            "0" => "",
            "1" => "ม.ค.",
            "2" => "ก.พ.",
            "3" => "มี.ค.",
            "4" => "เม.ย.",
            "5" => "พ.ค.",
            "6" => "มิ.ย.",
            "7" => "ก.ค.",
            "8" => "ส.ค.",
            "9" => "ก.ย.",
            "10" => "ต.ค.",
            "11" => "พ.ย.",
            "12" => "ธ.ค."
        );
        public function init() {
                $this->upload_path = Yii::app()->basePath . '/../uploads/scholarships/';
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
                $this->layout='//layouts/column2';
		$model=new Scholarship;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Scholarship']))
		{
			$model->attributes=$_POST['Scholarship'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->scholar_enroll_id));
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
                $this->layout='//layouts/column2';
		$model=$this->loadModel($id);
                $how_to_knows = HowToKnow::model()->findAll();
                $how_to_know_list = array();

                if (is_array($how_to_knows)) {
                    foreach ($how_to_knows as $how_to_know) {
                        $how_to_know_list[$how_to_know->id] = $how_to_know->name;
                    }
                     $how_to_know_list[0] = 'อื่นๆ โปรดระบุ';
                }

                $orders_status = OrderStatus::model()->findAll();
		$order_status_list = array();
		foreach($orders_status as $order_status) {
			$order_status_list[$order_status->order_status_id] = $order_status->name;
		}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Scholarship']))
		{

                        $record_portfolio = $model->portfolio;
                        $record_image = $model->image;
                        if (isset($_POST['number1'])) {
                            $_POST['Scholarship']['id_card'] = $_POST['number1'] . $_POST['number2'] . $_POST['number3'] . $_POST['number4'] . $_POST['number5'] . $_POST['number6'] . $_POST['number7'] . $_POST['number8'] . $_POST['number9'] . $_POST['number10'] . $_POST['number11'] . $_POST['number12'] . $_POST['number13'];
                        } else {
                            $_POST['Scholarship']['id_card'] = '0000000000000';
                        }
                        list($d, $m, $y) = explode("/", $_POST['Scholarship']['birthday']);
                        $birthday = ($y - 543) . "-" . $m . "-" . $d;
                        $_POST['Scholarship']['birthday'] = $birthday;

                        $sep = "";
                        $language ="";
                        if(isset($_POST['Scholarship']['language'])){
                            $lang_arr = array();
                            $lang_arr =  $_POST['Scholarship']['language'];
                            foreach($lang_arr as $value){
                                $language .= $sep.$value;
                                $sep = ",";
                            }
                        }

                        $_POST['Scholarship']['language'] = $language;
                        $_POST['Scholarship']['date_modified'] = date('Y-m-d H:i:s');

                        $email = $_POST['Scholarship']['email'];

                        if($email != $model->email){
                            $check_email = $this->checkDuplicateEmail($email,$id);

                           // echo $check_email;
                            if($check_email>0){
                                $_POST['Scholarship']['email'] = "";
                            }
                        }
			$model->attributes=$_POST['Scholarship'];
                        $image = CUploadedFile::getInstance($model, 'image');

                        if($image) {

                                $genName = 'img_' . date('YmdHis');
                                $saveName = $genName;

                                while(file_exists($this->upload_path . $saveName . '.' . $image->getExtensionName())) {
                                        $saveName = $genName . '-' . rand(0,99);
                                }

                                $model->image = $saveName . '.' . $image->getExtensionName();
                        }else{
                             $model->image    = $record_image;

                        }
                        //Upload exam_file
                        $file = CUploadedFile::getInstance($model, 'portfolio');
                        if($file) {

                                $genName = 'portfolio_' . date('YmdHis');
                                $saveName = $genName;

                                while(file_exists($this->upload_path . $saveName . '.' . $file->getExtensionName())) {
                                        $saveName = $genName . '-' . rand(0,99);
                                }

                                $model->portfolio = $saveName . '.' . $file->getExtensionName();
                        }else{
                             $model->portfolio    = $record_portfolio;

                        }
			if($model->save()){
                            if($image) {
                                    if(file_exists($this->upload_path . $record_image)) {
                                            @unlink($this->upload_path . $record_image);
                                    }
                                    $image->saveAs($this->upload_path . $model->image);
                            }
                            if($file) {
                                    if(file_exists($this->upload_path . $record_portfolio)) {
                                            @unlink($this->upload_path . $record_portfolio);
                                    }
                                    $file->saveAs($this->upload_path . $model->portfolio);
                            }
				$this->redirect(array('index'));
                        }

		}

		$this->render('update',array(
			'model'=>$model,
                        'how_to_know_list'=>$how_to_know_list,
                        'order_status_list'=>$order_status_list,
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
//		$dataProvider=new CActiveDataProvider('Scholarship');
//		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
//		));

		$model=new Scholarship('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Scholarship']))
			$model->attributes=$_GET['Scholarship'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Scholarship('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Scholarship']))
			$model->attributes=$_GET['Scholarship'];

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
		$model=Scholarship::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='scholarship-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

        public function checkDuplicateEmail($email,$scholar_id)
	{
                $criteria=new CDbCriteria();
		$criteria->select='*';
		$criteria->condition='email="'.$email.'" AND scholar_id ='.$scholar_id;

		$model=Scholarship::model()->count($criteria);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}
