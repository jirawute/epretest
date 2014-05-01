<?php

require_once('mail.php');

class ScholarshipController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
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

    public $layout = '//layouts/scholarship';

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionInterview($id) {
        // Get information data
        $criteria = new CDbCriteria();
        $criteria->select = '*';
        $criteria->condition = 'status=:status AND payment_status=:payment_status AND scholar_id=' . $id;
        $criteria->params = array(':status' => 1, ':payment_status' => 2);
        $criteria->order = 'name_th';


        $model = Scholarship::model()->findAll($criteria);

        $this->render('interview', array(
            'model' => $model,
        ));
    }

    public function actionPass($id) {
        // Get information data
        $criteria = new CDbCriteria();
        $criteria->select = '*';
        $criteria->condition = 'status=:status AND payment_status=:payment_status AND scholar_id=' . $id;
        $criteria->params = array(':status' => 2, ':payment_status' => 2);
        $criteria->order = 'name_th';


        $model = Scholarship::model()->findAll($criteria);

        $this->render('interview', array(
            'model' => $model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($id) {
        $how_to_knows = HowToKnow::model()->findAll();
        $how_to_know_list = array();

        if (is_array($how_to_knows)) {
            foreach ($how_to_knows as $how_to_know) {
                $how_to_know_list[$how_to_know->id] = $how_to_know->name;
            }
            $how_to_know_list[0] = 'อื่นๆ โปรดระบุ';
        }

        $scholar = $this->loadScholarShipDetailModel($id);

        $model = new Scholarship;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Scholarship'])) {
            if (isset($_POST['number1'])) {
                $_POST['Scholarship']['id_card'] = $_POST['number1'] . $_POST['number2'] . $_POST['number3'] . $_POST['number4'] . $_POST['number5'] . $_POST['number6'] . $_POST['number7'] . $_POST['number8'] . $_POST['number9'] . $_POST['number10'] . $_POST['number11'] . $_POST['number12'] . $_POST['number13'];
            } else {
                $_POST['Scholarship']['id_card'] = '0000000000000';
            }
            list($d, $m, $y) = explode("/", $_POST['Scholarship']['birthday']);
            $birthday = ($y - 543) . "-" . $m . "-" . $d;
            $_POST['Scholarship']['birthday'] = $birthday;

            $sep = "";
            $language = "";
            if (isset($_POST['Scholarship']['language'])) {
                $lang_arr = array();
                $lang_arr = $_POST['Scholarship']['language'];
                foreach ($lang_arr as $value) {
                    $language .= $sep . $value;
                    $sep = ",";
                }
            }

            $_POST['Scholarship']['language'] = $language;
            $_POST['Scholarship']['scholar_id'] = $id;
            $_POST['Scholarship']['payment_status'] = 1;



            $_POST['Scholarship']['date_created'] = date('Y-m-d H:i:s');
            $_POST['Scholarship']['date_modified'] = date('Y-m-d H:i:s');
            $_POST['Scholarship']['status'] = 0;


            $email = $_POST['Scholarship']['email'];
            $check_email = $this->checkDuplicateEmail($email, $id);

            // echo $check_email;
            if ($check_email > 0) {
                $_POST['Scholarship']['email'] = "";
            }
            //  exit;
            //Generate Invoice
            $totalOrder = $this->getTotalScholarshipOrder();

            if ($totalOrder > 0) {

                // Get Last Invoice Number
                $order = $this->getScholarshipOrder(0, 1);

                $last_inv_id = $order['inv_id'];

                $last_inv_id = (int) $last_inv_id;

                // Set New Invoice Number
                $inv_id = $last_inv_id + 1;
            } else {
                // Set Default Invoice Number
                $inv_id = "100001";
            }
            //echo $inv_id."<br/>";

            $_POST['Scholarship']['inv_id'] = $inv_id;

            $model->attributes = $_POST['Scholarship'];

            $image = CUploadedFile::getInstance($model, 'image');

            if ($image) {

                $genName = 'img_' . date('YmdHis');
                $saveName = $genName;

                while (file_exists($this->upload_path . $saveName . '.' . $image->getExtensionName())) {
                    $saveName = $genName . '-' . rand(0, 99);
                }

                $model->image = $saveName . '.' . $image->getExtensionName();
            }
            //Upload exam_file
            $file = CUploadedFile::getInstance($model, 'portfolio');
            if ($file) {

                $genName = 'portfolio_' . date('YmdHis');
                $saveName = $genName;

                while (file_exists($this->upload_path . $saveName . '.' . $file->getExtensionName())) {
                    $saveName = $genName . '-' . rand(0, 99);
                }

                $model->portfolio = $saveName . '.' . $file->getExtensionName();
            }

//                  echo "<br> ===> ";
//		  echo "<pre>";
//		  print_r($_POST);
//		  echo "</pre>";
            if ($model->save()) {
                if ($image) {
                    $image->saveAs($this->upload_path . $model->image);
                }
                if ($file) {
                    $file->saveAs($this->upload_path . $model->portfolio);
                }
//                            $this->refresh();
                $this->sendMailToCustomer($model); //send Email to customer


                Yii::app()->user->setFlash('success', 'ข้อมูลการสมัครของคุณถูกบันทึกเรียบร้อยแล้ว  ขอให้โชคดีทุกคนค่ะ');
                //$this->redirect(array('update','id'=>$model->scholar_enroll_id));// ไปที่หน้าจ่ายเงิน ตัดทิ้งถ้าไม่ต้องชำระ
                $this->redirect(array('finish',
                    'id' => $model->scholar_enroll_id
                ));
            }
        }
        $this->ActionIndex($id);// edit to not allow to register
         /*$this->render('create', array(
          'model' => $model,
          'scholar' => $scholar,
          'how_to_know_list' => $how_to_know_list
          )); */
    }

    public function actionFinish($id) {
        $model = $this->loadModel($id);
        $scholar = $this->loadScholarShipDetailModel($model->scholar_id);


        $this->render('finish', array(
            'model' => $model,
            'scholar' => $scholar
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionEdit($id) {
        $how_to_knows = HowToKnow::model()->findAll();
        $how_to_know_list = array();

        if (is_array($how_to_knows)) {
            foreach ($how_to_knows as $how_to_know) {
                $how_to_know_list[$how_to_know->id] = $how_to_know->name;
            }
            $how_to_know_list[0] = 'อื่นๆ โปรดระบุ';
        }
        $model = $this->loadModel($id);
        $scholar = $this->loadScholarShipDetailModel($model->scholar_id);

        if (isset($_POST['Scholarship'])) {

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
            $language = "";
            if (isset($_POST['Scholarship']['language'])) {
                $lang_arr = array();
                $lang_arr = $_POST['Scholarship']['language'];
                foreach ($lang_arr as $value) {
                    $language .= $sep . $value;
                    $sep = ",";
                }
            }

            $_POST['Scholarship']['language'] = $language;
            $_POST['Scholarship']['date_modified'] = date('Y-m-d H:i:s');

            $email = $_POST['Scholarship']['email'];
            if ($email != $model->email) {
                $check_email = $this->checkDuplicateEmail($email, $id);

                // echo $check_email;
                if ($check_email > 0) {
                    $_POST['Scholarship']['email'] = "";
                }
            }

            $model->attributes = $_POST['Scholarship'];
            $image = CUploadedFile::getInstance($model, 'image');

            if ($image) {

                $genName = 'img_' . date('YmdHis');
                $saveName = $genName;

                while (file_exists($this->upload_path . $saveName . '.' . $image->getExtensionName())) {
                    $saveName = $genName . '-' . rand(0, 99);
                }

                $model->image = $saveName . '.' . $image->getExtensionName();
            }
            //Upload exam_file
            $file = CUploadedFile::getInstance($model, 'portfolio');
            if ($file) {

                $genName = 'portfolio_' . date('YmdHis');
                $saveName = $genName;

                while (file_exists($this->upload_path . $saveName . '.' . $file->getExtensionName())) {
                    $saveName = $genName . '-' . rand(0, 99);
                }

                $model->portfolio = $saveName . '.' . $file->getExtensionName();
            }
            if ($model->save()) {
                if ($image) {
                    if (file_exists($this->upload_path . $record_image)) {
                        @unlink($this->upload_path . $record_image);
                    }
                    $image->saveAs($this->upload_path . $model->image);
                }
                if ($file) {
                    if (file_exists($this->upload_path . $record_portfolio)) {
                        @unlink($this->upload_path . $record_portfolio);
                    }
                    $file->saveAs($this->upload_path . $model->portfolio);
                }
                Yii::app()->user->setFlash('success', 'ข้อมูลการสมัครของคุณถูกบันทึกเรียบร้อยแล้ว  ขั้นตอนต่อไปคือการชำระค่าสมัครค่ะ');
                $this->redirect(array('update', 'id' => $model->scholar_enroll_id));
            }
        }
        $this->render('edit', array(
            'model' => $model,
            'scholar' => $scholar,
            'how_to_know_list' => $how_to_know_list
        ));
    }

    public function actionUpdate($id) {
        $how_to_knows = HowToKnow::model()->findAll();
        $how_to_know_list = array();

        if (is_array($how_to_knows)) {
            foreach ($how_to_knows as $how_to_know) {
                $how_to_know_list[$how_to_know->id] = $how_to_know->name;
            }
            $how_to_know_list[0] = 'อื่นๆ โปรดระบุ';
        }
        $model = $this->loadModel($id);
        $scholar = $this->loadScholarShipDetailModel($model->scholar_id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Scholarship'])) {
            $model->attributes = $_POST['Scholarship'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->scholar_enroll_id));
        }

        $this->render('update', array(
            'model' => $model,
            'scholar' => $scholar,
            'how_to_know_list' => $how_to_know_list
        ));
    }

    public function actionBank() {
        $inv_id = $_POST['inv'];
        $model = $this->loadModelByInvoice($inv_id);
//                  echo "<br> ===> ";
//		  echo "<pre>";
//		  print_r($_POST);
//		  echo "</pre>";
        $data = array();
        $data['payment_status'] = 3;
        $data['payment_method'] = 'Bank Transfer';
        $data['payment_amount'] = $_POST['amt'];
        $model->attributes = $data;
        $model->save();
        $this->render('bank_transfer', array('model' => $model,));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $model = $this->loadScholarShipDetailModel($id);

            if ($id == 1) {
                $this->render('index-3', array('model' => $model,));
            }//ค้างไว้ให้ดาวน์โหลด GiftVoucher
            else if ($id == 2) {
                $this->render('index-4', array('model' => $model,));
            }//สำหรับสมัครทุนจีน
            else if ($id == 3) {
                $this->render('index-4', array('model' => $model,));
            }//สำหรับสมัครทุนญี่ปุ่น
        } else {
                $this->redirect("http://www.es-ilc.org");
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Scholarship('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Scholarship']))
            $model->attributes = $_GET['Scholarship'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionResult() {


//
//            $_POST['result'] = '99100002';
//            $_POST["apCode"] = '33880';
//            $_POST["amt"] = '1.00';
//            $_POST["method"] = '06';
//            $_POST["fee"] = '0.00';
//            $_POST["confirm_cs"] = 'false';
//                  echo "<br> ===> ";
//		  echo "<pre>";
//		  print_r($_POST);
//		  echo "</pre>";

        if (isset($_POST['result'])) {
            $result = $_POST['result'];
            $inv_id = substr($result, 2, 6);
            $result = substr($result, 0, 2);

            //echo $inv_id;
            $model = $this->loadModelByInvoice($inv_id);
            $scholar = $this->loadScholarShipDetailModel($model->scholar_id);


            //$result = "02";
            $apCode = $_POST['apCode'];
            $amt = $_POST['amt'];
            $fee = $_POST['fee'];
            $method = $_POST['method'];
            $amount = $scholar->price;

            if ($method == "01") {
                $payment_method = "Paysbuy";
            } else if ($method == "02") {
                $payment_method = "Credit Card";
            } else if ($method == "06") {
                $payment_method = "Counter Service";
            }

            if (isset($_POST['confirm_cs'])) {
                $confirm_cs = strtolower(trim($_POST['confirm_cs']));
            }

            /* status result
              00=Success
              99=Fail
              02=Process
             */
            if ($result == "00") {
                if ($method == "06") {
                    if ($confirm_cs == "true") {
                        //echo "Success";
                        $text = "รายการของคุณเสร็จเรียบร้อยแล้วคะ";
                        $color = "#FF7E2F";

                        $data = array();
                        $data['payment_status'] = 2;
                        $data['payment_method'] = $payment_method;
                        $data['payment_amount'] = $amount;
                        $model->attributes = $data;
                        if ($model->save()) {
                            $this->sendMailToCustomer($model);
                        }
                    } else if ($confirm_cs == "false") {
                        if ($model->payment_status <> 2) {
                            //echo "Fail";
                            $text = "รายการของคุณไม่ได้ชำระเงินตามเวลาที่กำหนดค่ะ";
                            $color = "#FF6666";

                            $data = array();
                            $data['payment_status'] = 1;
                            $data['payment_method'] = $payment_method;
                            $data['payment_amount'] = $amount;
                            $model->attributes = $data;
                            $model->save();
                        }
                    } else {
                        //echo "Process";
                        $text = "รายการของคุณอยู่ระหว่างรอการชำระเงินค่ะ";
                        $color = "#FF7E2F";

                        $data = array();
                        $data['payment_status'] = 3;
                        $data['payment_method'] = $payment_method;
                        $data['payment_amount'] = $amount;
                        $model->attributes = $data;
                        $model->save();
                    }
                } else {
                    //echo "Success";
                    $text = "รายการของคุณเสร็จเรียบร้อยแล้วคะ";
                    $color = "#FF7E2F";

                    $data = array();
                    $data['payment_status'] = 2;
                    $data['payment_method'] = $payment_method;
                    $data['payment_amount'] = $amount;
                    $model->attributes = $data;
                    //$model->save();
                    if ($model->save()) {
                        $this->sendMailToCustomer($model);
                    }
                }
            } else if ($result == "99") {
                if ($model->payment_status <> 2) {
                    //echo "Fail";
                    $text = "ขออภัยค่ะ คุณทำรายการไม่สำเร็จ กรุณาทำรายการใหม่ค่ะ <br/><a href='" . Yii::app()->createUrl('scholarship/update', array('id' => $model->scholar_enroll_id)) . "'>ย้อนกลับ</a>";
                    $color = "#FF6666";

                    $data = array();
                    $data['payment_status'] = 1;
                    $data['payment_method'] = $payment_method;
                    $data['payment_amount'] = $amount;
                    $model->attributes = $data;
                    $model->save();
                }
            } else if ($result == "02") {
                //echo "Process";
                $text = "รายการของคุณอยู่ระหว่างรอการชำระเงินค่ะ";
                $color = "#FF7E2F";

                $data = array();
                $data['payment_status'] = 3;
                $data['payment_method'] = $payment_method;
                $data['payment_amount'] = $amount;
                $model->attributes = $data;
                $model->save();
            } else {
                if ($model->payment_status <> 2) {
                    //echo "Error";
                    $text = "เกิดความผิดพลาด กรุณาทำรายการใหม่ค่ะ <br/><a href='" . Yii::app()->createUrl('scholarship/update', array('id' => $model->scholar_enroll_id)) . "'>ย้อนกลับ</a>";
                    $color = "#FF6666";

                    $data = array();
                    $data['payment_status'] = 1;
                    $data['payment_method'] = $payment_method;
                    $data['payment_amount'] = $amount;
                    $model->attributes = $data;
                    $model->save();
                }
            }
            $this->render('result', array('model' => $model, 'text' => $text, 'color' => $color));
        }//end if $_POST['result']
        else {

            $this->redirect(array('index'));
        }
    }

    public function actionTransfer($id) {
        $model = new ScholarshipTransfer;

        $scholar_enroll = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['ScholarshipTransfer'])) {
            $_POST['ScholarshipTransfer']['status'] = 'N';
            $_POST['ScholarshipTransfer']['send_email'] = 'N';

            // echo "Save";
            $model->attributes = $_POST['ScholarshipTransfer'];
            $image = CUploadedFile::getInstance($model, 'image');

            if ($image) {

                $genName = 'slip_' . date('YmdHis');
                $saveName = $genName;

                while (file_exists($this->upload_path . $saveName . '.' . $image->getExtensionName())) {
                    $saveName = $genName . '-' . rand(0, 99);
                }

                $model->image = $saveName . '.' . $image->getExtensionName();
            }


            $data = array();
            $data = $_POST['ScholarshipTransfer'];
            $data['image'] = $model->image;

            if ($model->save()) {
                if ($image) {
                    $image->saveAs($this->upload_path . $model->image);
                }

                $send_mail = $this->sendMail($data);
                if ($send_mail) {

                    $row = array();

                    $row['payment_status'] = 4;
                    $scholar_enroll->attributes = $row;
                    $scholar_enroll->save();

                    Yii::app()->user->setFlash('complete', 'ข้อมูลของคุณถูกส่งไปยังเจ้าหน้าที่เรียบร้อยแล้วคะ<br/>เจ้าหน้าที่จะใช้เวลาตรวจสอบการชำระเงิน 1 วันทำการ และหลังจากปรับสถานะการชำระเงินแล้ว จะแจ้งให้ทราบผ่านทาง E-mail ค่ะ');
                    $this->redirect(array('scholarship/update', 'id' => $scholar_enroll->scholar_enroll_id));
                } else {
                    Yii::app()->user->setFlash('error', 'ไม่สามารถส่งข้อมูลได้กรุณาลองใหม่อีกครั้งค่ะ');
                    $this->refresh();
                }
            }
        }

        $this->render('transfer', array(
            'model' => $model,
            'scholar_enroll' => $scholar_enroll,
        ));
    }

    public function actionCheckstatus() {


        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $scholar_id = $_POST['scholar_id'];

            $status = $this->checkDuplicateEmail($email, $scholar_id);
            if ($scholar_id < 2) {
                $model = $this->getScholarDetailFromEmail($email, $scholar_id);
                //$this->redirect(array('update','id'=>$model->scholar_enroll_id));
                $this->render('check_status', array('model' => $model, 'id' => $model->scholar_enroll_id));
            } else {
                $exist = Scholarship::model()->exists('email = :email AND scholar_id = :scholar_id', array(':email' => $email, ':scholar_id' => $scholar_id));
                if ($exist) {
                    Yii::app()->user->setFlash('error', 'ไม่พบข้อมูลการสมัครของคุณค่ะ');
                } else {
                    Yii::app()->user->setFlash('success', 'คุณได้สมัครทุนนี้เรียบร้อยแล้วค่ะ');
                }

                $this->redirect(array('index', 'id' => $scholar_id));
            }
        }
    }

    public function actionSendslip() {


        if (isset($_POST['email2'])) {
            $email = $_POST['email2'];
            $scholar_id = $_POST['scholar_id2'];

            $status = $this->checkDuplicateEmail($email, $scholar_id);
            if ($status > 0) {
                $model = $this->getScholarDetailFromEmail($email, $scholar_id);
                $this->redirect(array('transfer', 'id' => $model->scholar_enroll_id));
            } else {
                Yii::app()->user->setFlash('error', 'ไม่พบข้อมูลการสมัครของคุณค่ะ');
                $this->redirect(array('index', 'id' => $scholar_id));
            }
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Scholarship::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadScholarShipDetailModel($id) {
        $model = ScholarshipDetail::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function checkDuplicateEmail($email, $scholar_id) {
        $criteria = new CDbCriteria();
        $criteria->select = '*';
        $criteria->condition = 'email="' . $email . '" AND scholar_id =' . $scholar_id;

        $model = Scholarship::model()->count($criteria);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function getScholarDetailFromEmail($email, $scholar_id) {
        $criteria = new CDbCriteria();
        $criteria->select = '*';
        $criteria->condition = 'email="' . $email . '" AND scholar_id =' . $scholar_id;

        $model = Scholarship::model()->find($criteria);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'scholarship-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function getTotalScholarshipOrder() {
        $model = Scholarship::model()->findAll();
        $total = count($model);
        return $total;
    }

    public function getScholarshipOrder($offset = 0, $limit = 1) {
        $command = Yii::app()->db->createCommand();

        $result = $command->select('*')->from('esto_scholarship_enroll')->order('inv_id desc')->limit($limit)->offset($offset)->queryRow();

        return $result;
    }

    public function loadModelByInvoice($inv_id) {
        $condition = array(
            'condition' => 'inv_id=:inv_id',
            'params' => array(':inv_id' => $inv_id),
        );

        $model = Scholarship::model()->find($condition);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function sendMail($data) {
        // recipients         
        $to = "contact@e-studio.co.th";
        $cc = "payment@e-studio.co.th";
        //$bcc  = "kanokwan@khroton.com";
        $from = trim($data['email']);

        // subject
        $subject = "แจ้งการโอนเงินค่าสมัครสอบทุนผ่านบัญชีธนาคาร :: ES-ILC";

        // message
        $message = '
            <html>
            <head>
              <title>แจ้งการโอนเงินผ่านบัญชีธนาคาร</title>
            </head>
            <body>
              <h3>แจ้งการโอนเงินผ่านบัญชีธนาคาร</h3>
              <table border="0" width="100%">
                <tr>
                    <td><b>Invoice No.</b> :</td>
                    <td>' . $data['inv_id'] . '</td>
                </tr>
                <tr>
                    <td><b>ชื่อผู้โอน</b> :</td>
                    <td>' . $data['name'] . '</td>
                </tr>
                <tr>
                    <td><b>E-mail</b> :</td>
                    <td>' . $data['email'] . '</td>
                </tr>
                <tr>
                    <td><b>เบอร์โทรศัพท์</b> :</td>
                    <td>' . $data['phone'] . '</td>
                </tr>
                <tr>
                    <td><b>จำนวนเงินที่โอน</b> :</td>
                    <td>' . number_format($data['amount'], 2) . ' บาท</td>
                </tr>
                <tr>
                    <td><b>โอนเข้าบัญชีธนาคาร</b> :</td>
                    <td>' . $data['bank'] . '</td>
                </tr>
                <tr>
                    <td><b>วันเวลาที่โอน</b> :</td>
                    <td>' . $data['date'] . '</td>
                </tr>
                <tr>
                    <td><b>รายละเอียดการชำระเงิน</b> :</td>
                    <td>' . $data['detail'] . '</td>
                </tr>';
        if ($data['image']) {
            $message .= '
                <tr>
                    <td valign="top"><b>หลักฐานการโอนเงิน</b> :</td>
                    <td><img src="http://www.e-pretest.com/uploads/scholarships/' . $data['image'] . '"/></td>
                </tr>';
        }
        $message .= '
              </table>
            </body>
            </html>
            ';

        // To send HTML mail, the Content-type header must be set
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        // Additional headers
        $headers .= 'To: ' . $to . "\r\n";
        $headers .= 'From: ' . $data['name'] . '<' . $from . '>' . "\r\n";
        $headers .= 'Cc: ' . $cc . "\r\n";
        //$headers .= 'Bcc: '.$bcc. "\r\n";
        // Mail it
        //$flgSend = @mail($to, $subject, $message, $headers);
        $flgSend = $this->sendEMail($to, $from, $data['name'] . '<' . $from . '>', $subject, $message);
        return $flgSend;
    }

    public function thai_date($time) {

        $thai_date_return = date("j", $time) . " " . $this->thai_month_arr[date("n", $time)] . " " . (date("Y", $time) + 543);
        return $thai_date_return;
    }

    public function sendMailToCustomer($data) {
        // recipients
        $to = trim($data->email);
        $from = "contact@e-studio.co.th";
        //$cc  = "kawiwan@hotmail.com";
        //$bcc  = "kanokwan@khroton.com";          
        // subject
        $subject = "ผลการสมัคร" . $data->scholarDetail->name . " : สำเร็จ";

        // message
        $message = '
            <html>
            <head>
              <title>ผลการสมัคร".$data->scholarDetail->name." : สำเร็จ</title>
            </head>
            <body>
              <p>เรียน คุณ' . $data->name_th . ' ' . $data->surename_th . '&nbsp;&nbsp;&nbsp;รหัสอ้างอิง : ' . $data->email . '</p>
              <br/>
              <p>อีเมล์ฉบับนี้ส่งมาเพื่อยืนยันการสมัคร' . $data->scholarDetail->name . '<br/>
              ' . $data->scholarDetail->desc . '</p>
              <br/>
              <p>รหัสอ้างอิงของผู้สมัคร คือ ' . $data->email . '</p>
              <br/>
              <p>ทางสถาบันฯจะประกาศผลผู้ได้รับทุนในวันที่ ' . $this->thai_date(strtotime($data->scholarDetail->announce_date)) . '<br/>
              โดยผู้สมัครสามารถติดตามผลการคัดเลือกได้ที่ <a href="http://www.es-ilc.org" target="_blank">www.ES-ILC.org</a></p>

              <br/>
              <p>อีเมล์ฉบับนี้เป็นอีเมล์ตอบรับอัตโนมัติ <u>ห้ามตอบกลับ</u><br/>
              หากมีคำถามสงสัย กรุณาติดต่อ contact@e-studio.co.th</p>

              <br/>
              <p>สถาบันภาษาและวัฒนธรรมนานาชาติเอ็ดดูเคชั่นสตูดิโอ<br/>
              Education Studio Institution of Languages and Cultures (ES-ILC)</p>';

        $message .= '
            </body>
            </html>
            ';

        // To send HTML mail, the Content-type header must be set
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        // Additional headers
        $headers .= 'To: ' . $to . "\r\n";
        $headers .= 'From: ES-ILC <' . $from . "> \r\n";
        //$headers .= 'Cc: '.$cc. "\r\n";
        //$headers .= 'Bcc: '.$bcc. "\r\n";
        // Mail it
        //$flgSend = @mail($to, $subject, $message, $headers);
        $flgSend = $this->sendEMail($to, $from, 'ES-ILC', $subject, $message);
        return $flgSend;
    }

    public function sendEMail($email_to, $email_from, $sender, $subject, $message) {
        $mail = new Mail();
        if (isset($email_to)) {
            $mail->protocol = 'smtp';
            $mail->parameter = "";
            $mail->hostname = "ssl://smtp.gmail.com";
            $mail->username = "contact@e-studio.co.th";
            $mail->password = "estu1q2w3e";
            $mail->port = "465";
            $mail->timeout = "5";
            $mail->setTo($email_to);
            $mail->setFrom($email_from);
            $mail->setSender($sender);
            $mail->setSubject($subject);
            $mail->setHtml($message);
            $mail->setText(html_entity_decode('', ENT_QUOTES, 'UTF-8'));
            $mail->send();
            return true;
        }
    }

}
