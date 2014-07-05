<?php

class ExamController extends AdminController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column3';
    public $menu2 = array();
    public $exam_path;
    public $answer_path;
    public $scribd;

    public function init() {
        require_once 'scribd.php';
        $scribd_api_key = "i9q9jyikdhscosm4igavojb3o4465c"; //api_key & secret key from account epretest@e-studio.co.th
        $scribd_secret = "sec-wvl4e6mhzusskr0x35c7802q7t";

        $this->scribd = new Scribd($scribd_api_key, $scribd_secret);
        $this->exam_path = Yii::app()->basePath . '/../uploads/pdf/';
        $this->answer_path = Yii::app()->basePath . '/../uploads/answer/';
    }

    public function accessRules() {
        return array();
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Exam;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Exam'])) {
            //$_POST['Exam']['score_total'] = 0;
            $_POST['Exam']['score_avg'] = 0;
            $_POST['Exam']['score_max'] = 0;

            $_POST['Exam']['date_added'] = date('Y-m-d H:i:s');

            $model->attributes = $_POST['Exam'];

            //Upload exam_file
            $ex_upload = CUploadedFile::getInstance($model, 'exam_file');
            if ($ex_upload) {

                $genName = 'uploaded_' . date('YmdHis');
                $saveName = $genName;

                while (file_exists($this->exam_path . $saveName . '.' . $ex_upload->getExtensionName())) {
                    $saveName = $genName . '-' . rand(0, 99);
                }
                $model->exam_file = $saveName . '.' . $ex_upload->getExtensionName();
            }

            //Upload answer_file
            $ans_upload = CUploadedFile::getInstance($model, 'answer_file');
            if ($ans_upload) {

                $genName = 'answer_' . date('YmdHis');
                $saveName = $genName;

                while (file_exists($this->answer_path . $saveName . '.' . $ans_upload->getExtensionName())) {
                    $saveName = $genName . '-' . rand(0, 99);
                }

                $model->answer_file = $saveName . '.' . $ans_upload->getExtensionName();
            }

            if ($model->save()) {

                if ($ex_upload) {
                    $ex_upload->saveAs($this->exam_path . $model->exam_file);
                    $data = $this->uploadScribd($this->exam_path . $model->exam_file);
                    $model->exam_doc_id = $data['doc_id'];
                    $model->exam_access_key = $data['access_key'];
                    $model->save();
                }
                if ($ans_upload) {

                    $ans_upload->saveAs($this->answer_path . $model->answer_file);
                    $data = $this->uploadScribd($this->answer_path . $model->answer_file);

                    $model->answer_doc_id = $data['doc_id'];
                    $model->answer_access_key = $data['access_key'];
                    $model->save();
                }
                $this->redirect(array('index'));
            }
        }

        $condition = array(
            'condition' => 'status=:status',
            'params' => array(':status' => 1),
            'order' => 'name',
        );

        $types = Type::model()->findAll($condition);
        $levels = Level::model()->findAll($condition);
        $subjects = Subject::model()->findAll($condition);

        $option_types = array();
        $option_levels = array();
        $option_subjects = array();

        foreach ($types as $type) {
            $option_types[$type->type_id] = $type->name;
        }

        foreach ($levels as $level) {
            $option_levels[$level->level_id] = $level->name;
        }

        foreach ($subjects as $subject) {
            $option_subjects[$subject->subject_id] = $subject->name;
        }

        $this->render('create', array(
            'model' => $model,
            'option_types' => $option_types,
            'option_levels' => $option_levels,
            'option_subjects' => $option_subjects,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Exam'])) {
            $ex_file = $model->exam_file;

            $ans_file = $model->answer_file;

            $model->attributes = $_POST['Exam'];

            //---------------Start Upload Exam File-----------------------
            $ex_upload = CUploadedFile::getInstance($model, 'exam_file');

            if ($ex_upload && !empty($ex_file)) {
                if (file_exists($this->exam_path . $ex_file)) {
                    @unlink($this->exam_path . $ex_file);
                }
            }

            if ($ex_upload) {

                $genName = 'uploaded_' . date('YmdHis');
                $saveName = $genName;

                while (file_exists($this->exam_path . $saveName . '.' . $ex_upload->getExtensionName())) {
                    $saveName = $genName . '-' . rand(0, 99);
                }

                $model->exam_file = $saveName . '.' . $ex_upload->getExtensionName();
            } else {
                $model->exam_file = $ex_file;
            }
            //-----------------End Upload Exam File------------------------
            //---------------Start Upload Answer File-----------------------
            $ans_upload = CUploadedFile::getInstance($model, 'answer_file');

            if ($ans_upload && !empty($ans_file)) {

                if (file_exists($this->answer_path . $ans_file)) {
                    @unlink($this->answer_path . $ans_file);
                }
            }

            if ($ans_upload) {


                $genName = 'answer_' . date('YmdHis');
                $saveName = $genName;

                while (file_exists($this->answer_path . $saveName . '.' . $ans_upload->getExtensionName())) {
                    $saveName = $genName . '-' . rand(0, 99);
                }

                $model->answer_file = $saveName . '.' . $ans_upload->getExtensionName();
            } else {
                $model->answer_file = $ans_file;
            }
            //-----------------End Upload Answer File------------------------

            if ($model->save()) {

                if ($ex_upload) {
                    $ex_upload->saveAs($this->exam_path . $model->exam_file);
                    $data = $this->uploadScribd($this->exam_path . $model->exam_file, $model->exam_doc_id);
                    $model->exam_doc_id = $data['doc_id'];
                    $model->exam_access_key = $data['access_key'];
                    $model->save();
                }
                if ($ans_upload) {

                    $ans_upload->saveAs($this->answer_path . $model->answer_file);
                    $data = $this->uploadScribd($this->answer_path . $model->answer_file, $model->answer_doc_id);

                    $model->answer_doc_id = $data['doc_id'];
                    $model->answer_access_key = $data['access_key'];
                    $model->save();
                }

                $this->redirect(array('index'));
            } else {
                var_dump($model->getErrors());
            }
        }

        $condition = array(
            'condition' => 'status=:status',
            'params' => array(':status' => 1),
            'order' => 'name',
        );

        $types = Type::model()->findAll($condition);
        $levels = Level::model()->findAll($condition);
        $subjects = Subject::model()->findAll($condition);

        $option_types = array();
        $option_levels = array();
        $option_subjects = array();

        foreach ($types as $type) {
            $option_types[$type->type_id] = $type->name;
        }

        foreach ($levels as $level) {
            $option_levels[$level->level_id] = $level->name;
        }

        foreach ($subjects as $subject) {
            $option_subjects[$subject->subject_id] = $subject->name;
        }

        $this->render('update', array(
            'model' => $model,
            'option_types' => $option_types,
            'option_levels' => $option_levels,
            'option_subjects' => $option_subjects,
        ));
    }

    /**
     * Upload a document  to scribd
     */
    public function uploadScribd($filePath, $rev_id = null) {
        if ($rev_id == "") {
            $rev_id = null;
        }
        $doc_type = 'pdf';
        $access = 'private';  // upload private
        $data = $this->scribd->upload($filePath, $doc_type, $access, $rev_id); // returns Array ( [doc_id] => 1026598 [access_key] => key-23nvikunhtextwmdjm2i )
//        print_r($data);
        return $data;
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model = $this->loadModel($id);

        if (file_exists($this->exam_path . $model->exam_file)) {
            @unlink($this->exam_path . $model->exam_file);
        }

        $model->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
// 		$dataProvider=new CActiveDataProvider('Exam');
// 		$this->render('index',array(
// 			'dataProvider'=>$dataProvider,
// 		));

        $model = new Exam('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Exam']))
            $model->attributes = $_GET['Exam'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Exam('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Exam']))
            $model->attributes = $_GET['Exam'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionSubject() {
        $type_id = (!empty($_GET['type_id'])) ? $_GET['type_id'] : '0';
        $data = Subject::model()->findAll('type_id=:type_id', array(':type_id' => $type_id));

        $data = CHtml::listData($data, 'subject_id', 'name');
        echo CHtml::tag('option', array('value' => ''), '--Please Select Subject--');
        foreach ($data as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

    public function actionType() {
        $level_id = (!empty($_GET['level_id'])) ? $_GET['level_id'] : '0';

        $data = Type::model()->findAll('level_id=:level_id', array(':level_id' => $level_id));

        $data = CHtml::listData($data, 'type_id', 'name');
        echo CHtml::tag('option', array('value' => ''), '--Please Select Type--');
        foreach ($data as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Exam the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Exam::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Exam $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'exam-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
