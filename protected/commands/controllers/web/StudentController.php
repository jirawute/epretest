<?php
require_once('mail.php');
class StudentController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $label = array();
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
    public $upload_path;

    public function init() {
        $this->upload_path = Yii::app()->basePath . '/../uploads/student/';
    }

    public function actions()
    {
            $this->layout = '//layouts/information_view';
            return array(
                    // ADD THIS:
                    'crugeconnector'=>array('class'=>'CrugeConnectorAction'),

            );
    }

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView() {

        if (Yii::app()->user->id) {
            $id = Yii::app()->user->id;
            $model = $this->loadModel($id);

            if (isset($_GET['level'])) {
                $level_id = $_GET['level'];

            } else {
                $level_id = $model->level_id;
            }

            $level_info = Level::model()->findByPk($level_id);

            if (isset($_GET['subject'])) {
                $subject_id = $_GET['subject'];
            } else {
                $subject_id = 0;
            }

            //echo $level_id;
            $subject = Yii::app()->db->createCommand()
                    ->select('s.name, t.exam_type')
                    ->from('esto_subject s')
                    ->join('esto_type t', 's.type_id=t.type_id')
                    ->where('subject_id=:subject_id', array(':subject_id' => $subject_id))
                    ->queryRow();


            $type_criteria = new CDbCriteria();
            $type_criteria->select = '*';
            $type_criteria->condition = 'status=:status AND level_id=:level_id AND exam_type=:exam_type';
            $type_criteria->params = array(':status' => 1, ':level_id' => $level_id, ':exam_type' => 'Exam');
            $type_criteria->order = 'sort_order';
            $TypesExam = Type::model()->findAll($type_criteria);

            $level_criteria = new CDbCriteria();
            $level_criteria->select = '*';
            $level_criteria->condition = 'status=:status';
            $level_criteria->params = array(':status' => 1);
            $level_criteria->order = 'sort_order DESC, level_id DESC';
            $level_all = Level::model()->findAll($level_criteria);


            $ex_criteria = new CDbCriteria();
            $ex_criteria->select = '*';
            $ex_criteria->condition = 'status=:status AND level_id=:level_id AND exam_type=:exam_type';
            $ex_criteria->params = array(':status' => 1, ':level_id' => $level_id, ':exam_type' => 'Exercise');
            $ex_criteria->order = 'sort_order';
            $TypesExercise = Type::model()->findAll($ex_criteria);

            $test = new TestRecord();
            $TestRecord = $test->getLastTestRecordByStudentID($id);

            //$test_static = $test->getTestRecordDetailByExamId($exam_id);

            foreach ($TestRecord as $key => $test) {
                //echo $test['exam_id']."<br/>";
                $exam_id = $test['exam_id'];
                $TestRecord[$key]['date_attended'] = $this->thai_date(strtotime($test['date_attended']));

                $test = new TestRecord();
                $test_static = $test->getTestRecordDetailByExamId($exam_id);

                $TestRecord[$key]['exam_avg'] = $test_static['score_avg'];
            }

//                   echo "<pre>", print_r($TestRecord), "</pre>";
//                   exit;
//                    $test_criteria = new CDbCriteria();
//                    $test_criteria->select = '*';
//                    $test_criteria->condition = 'student_id=:student_id';
//                    $test_criteria->params=array(':student_id'=>$id);
//                    $test_criteria->order='date_attended desc';
//                    $test_criteria->offset='0';
//                    $test_criteria->limit='3';
//                    $TestRecord= TestRecord::model()->findAll($test_criteria);

            $this->render('view', array(
                'model' => $model,
                'TypesExam' => $TypesExam,
                'TypesExercise' => $TypesExercise,
                'level_id' => $level_id,
                'level_info' => $level_info,
                'level_all' => $level_all,
                'subject_id' => $subject_id,
                'subject' => $subject,
                'TestRecord' => $TestRecord,
            ));
        } else {
            $this->redirect(Yii::app()->createUrl('site/login'));
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {

        $password_confirm = 0;
        $password_not_match = 0;

        $option_levels = $this->levelOption();
        $option_schools =$this->schoolOption();
        // Define label
        $this->label['firstname'] = 'ชื่อ';
        $this->label['lastname'] = 'นามสกุล';
        $this->label['username'] = 'ชื่อผู้ใช้งาน';
        $this->label['password'] = 'รหัสผ่าน';
        $this->label['button_login'] = 'สมัครสมาชิก';
        $this->label['confirm_pass_label'] = 'กรุณายืนยันรหัสผ่าน';
        $this->label['pass_not_match_label'] = 'รหัสผ่านไม่ตรงกัน';

        $model = new SignupForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'student-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['SignupForm'])) {
            $length = 32;
            $chars = array_merge(range(0, 9), range('a', 'z'));
            shuffle($chars);
            $sid = implode(array_slice($chars, 0, $length));

            $_POST['SignupForm']['sid'] = $sid;
            $_POST['SignupForm']['id_number'] = '0000000000000';
            $_POST['SignupForm']['school'] = '';
            $_POST['SignupForm']['phone'] = '';
            $_POST['SignupForm']['image'] = '';
            $_POST['SignupForm']['credit'] = 0;
            $_POST['SignupForm']['status'] = 1;

            if ($_POST['password_confirm'] == '') {
                $password_confirm = 1;
            } else if ($_POST['password_confirm'] != $_POST['SignupForm']['password']) {
                $password_not_match = 1;
            } else {
                $model->attributes = $_POST['SignupForm'];
                if ($model->save()) {
                    $to = $model->email;
                    $body = '<html>
                                            <head>
                                              <title>ยืนยั​นการสมัครเป็​นสมาชิกเว็​บไซต์ e-pretest.com</title>
                                            </head>
                                            <body>';
                    $body .= '<p>สวัสดีค่ะ คุณ ' . $model->firstname . ' <br />
                                            <br />
                                            ขอขอบคุณที่คุณสมัครเป็นสมาชิกกับเว็บไซต์ e-pretest.com<br />
                                            --------------------------------------------------------------------<br />
                                            ชื่อผู้ใช้และรหัสผ่านของคุณสำหรับใช้เข้าสู่ระบบ คือ<br />
                                            --------------------------------------------------------------------<br />
                                            ชื่อผู้ใช้ : ' . $model->username . '<br />
                                            รหัสผ่าน : ' . $model->password . '<br />
                                            --------------------------------------------------------------------<br />
                                            <u>หมายเหตุ</u> : คุณต้องยืนยันการสมัครสมาชิกก่อน ถึงจะสามารถล็อกอินเข้าสู่ระบบได้ค่ะ
                                            <br /><br />
                                            กรุณาคลิกที่ลิงค์ด้านล่างเพื่อยืนยันการสมัครของคุณภายใน 7 วัน หลังจากได้รับอีเมล์นี้นะคะ<br />
                                            <br />
                                            <a href="http://www.e-pretest.com/index.php?r=student/verify&code=' . $model->sid . '&id=' . $model->student_id . '" target="_blank">http://www.e-pretest.com/index.php?r=student/verify&code=' . $model->sid . '&id=' . $model->student_id . '</a><br />
                                            <br />
                                            หากคุณไม่สามารถคลิกที่ลิงค์นี้ได้ กรุณาคัดลองลิงค์ด้านบนไปวางที่เว็บบราวเซอร์ของคุณค่ะ
                                            <br />
                                            </p>
                                            <p><br />
                                            ขอแสดงความนับถือ<br />
                                            <br />
                                            ขอให้มีความสุขกับบริการของ e-pretest นะคะ<br />
                                            <br />
                                            <a href="http://www.e-pretest.com" target="_blank">http://www.e-pretest.com</a>
                                            </p>';
                    $body .= '</body>
                                          </html>';
                    $name = '=?UTF-8?B?' . base64_encode($model->firstname) . '?=';
                    $subject = '=?UTF-8?B?' . base64_encode('กรุณายืนยั​นการสมัครเป็​นสมาชิกเว็​บไซต์ e-pretest.com') . '?=';
                    $headers = "MIME-Version: 1.0\r\n" .
                            "Content-type: text/html; charset=UTF-8\r\n" .
                            "From: e-pretest <epretest@e-studio.co.th>\r\n" .
                            "Reply-To: epretest@e-studio.co.th\r\n";


                    //mail($to, $subject, $body, $headers);
                    //Change function send email
                    $flgSend = $this->sendMail($to,'epretest@e-studio.co.th','E-pretest.com',$subject,$body);
                    if($flgSend){
                         Yii::app()->user->setFlash('create', '<h2>สมัครสมาชิกเรียบร้อยแล้วค่ะ</h2><h3>');//ระบบจะส่งลิงค์ยืนยันการสมัครไปที่อีเมล์ของคุณที่ได้ทำการสมัครไว้ ภายใน 24 ชั่วโมงค่ะ<br/>กรุณาตรวจสอบอีเมล์ของคุณ และกดลิงค์เพื่อยืนยันการสมัครสมาชิก</h3><p>หากไม่ได้รับอีเมล์ยืนยัน กรุณาตรวจสอบที่เมล์ขยะ (Junk Mail, Spam) ของคุณค่ะ</p>');
                        $this->redirect(array('student/create', 'id' => $model->student_id));
                    }else{
                        Yii::app()->user->setFlash('create','ระบบไม่สามารถส่งอีเมล์ไปยังอีเมล์ของคุณได้');
                        $this->refresh();
                    }
                   
                }
            }
        }
        // display the login form
        $this->render('create', array(
            'model' => $model,
            'password_confirm' => $password_confirm,
            'password_not_match' => $password_not_match,
            'option_levels' => $option_levels,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate() {
        $password_confirm = 0;
        $password_not_match = 0;

        $this->label['confirm_pass_label'] = 'กรุณายืนยันรหัสผ่าน';
        $this->label['pass_not_match_label'] = 'รหัสผ่านไม่ตรงกัน';

        if (!Yii::app()->user->id) {
            $this->redirect(Yii::app()->createUrl('site/login'));
        } else {
            $id = Yii::app()->user->id;
            $model = $this->loadModel($id);

            $id_number = array();
            for ($i = 0; $i < 13; $i++) {
                $id_number[$i] = substr($model->id_number, $i, 1);
            }

            $model->id_number = $id_number;

//            $option_schools =array("1","2");
            if (isset($_POST['Student'])) {

                // Define image's location
                $imageLocation = Yii::app()->basePath . "/../uploads/student/";

                // query table where ID = currnet ID
                $studentInfo = Student::model()->find("student_id = " . $model->student_id);
                $imageInfo = CUploadedFile::getInstance($model, 'image');
                // if patientPic(image) field in table is not empty
                // delete images
                if ($imageInfo && !empty($studentInfo->image)) {

                    if (is_dir($imageLocation . $studentInfo->image)) {
                        unlink($imageLocation . $studentInfo->image);
                    }
                }
                // get fileuploaded info
                $imageInfo = CUploadedFile::getInstance($model, 'image');
                if ($imageInfo) {
                    // Adding yearmonthdate_time to file name
                    $imageName = "Student_" . $model->student_id . '.' . $imageInfo->getExtensionName();
                    // ready to update database with new filename
                    $model->image = $imageName;
                    $_POST['Student']['image'] = $imageName;
                } else {
                    $_POST['Student']['image'] = $model->image;
                }

                if (isset($_POST['number1'])) {
                    $_POST['Student']['id_number'] = $_POST['number1'] . $_POST['number2'] . $_POST['number3'] . $_POST['number4'] . $_POST['number5'] . $_POST['number6'] . $_POST['number7'] . $_POST['number8'] . $_POST['number9'] . $_POST['number10'] . $_POST['number11'] . $_POST['number12'] . $_POST['number13'];
                } else {
                    $_POST['Student']['id_number'] = '0000000000000';
                }
                list($d, $m, $y) = explode("/", $_POST['Student']['birthday']);
                $birthday = ($y - 543) . "-" . $m . "-" . $d;
                $_POST['Student']['birthday'] = $birthday;

//                          echo "<br> ===> ";
//                          echo "<pre>";
//                          print_r($_POST['Student']);
//                          echo "</pre>";
//                          exit;

                if (($_POST['new_password']) && ($_POST['password_retype'] == '')) {
                    $password_confirm = 1;
                } else if ($_POST['new_password'] != $_POST['password_retype']) {
                    $password_not_match = 1;
                } else {

                    if ($_POST['new_password']) {
                        $_POST['Student']['password'] = $_POST['new_password'];
                    }

                    $model->attributes = $_POST['Student'];
                    //$model->save();
                    if ($model->save()) {
                        // can't use $imageName since it only contain file name
                        // saveAs need $imageInfo -> tempName
                        if ($imageInfo) {
                            $imageInfo->saveAs($imageLocation . $imageName);
                        }
                        Yii::app()->user->setFlash('update', 'แก้ไขข้อมูลเรียบร้อยแล้วค่ะ');
                        $this->refresh();
                        //$this->redirect(array('view'));
                    }
                }
            }
          
            $this->render('update', array(
                'model' => $model,
                'option_schools' => $this->schoolOption(),
                'option_levels' => $this->levelOption(),
                'password_confirm' => $password_confirm,
                'password_not_match' => $password_not_match,
            ));
        }//end if
    }
    
    public function actionLoginSuccess($key){

        
        $loginData = Yii::app()->crugeconnector->getStoredData();
        // loginData: remote user information in JSON format.

        $info = $loginData;
        $decode = json_decode($info, true);

        $password_confirm = 0;
        $password_not_match = 0;

        $option_levels = $this->levelOption();
        $option_schools =$this->schoolOption();
        // Define label
        $this->label['firstname'] = 'ชื่อ';
        $this->label['lastname'] = 'นามสกุล';
        $this->label['username'] = 'ชื่อผู้ใช้งาน';
        $this->label['password'] = 'รหัสผ่าน';
        $this->label['button_login'] = 'สมัครสมาชิก';
        $this->label['confirm_pass_label'] = 'กรุณายืนยันรหัสผ่าน';
        $this->label['pass_not_match_label'] = 'รหัสผ่านไม่ตรงกัน';

        $model = new SignupForm;
        
        $data = array();
        $data['firstname'] = $decode['first_name'];
        $data['lastname'] = $decode['last_name'];
        $data['email'] = $decode['email'];
       // $data['username'] = $decode['username'];
        $data['username'] = $decode['email'];

        
        $model->attributes = $data;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'student-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

                // collect user input data
        if (isset($_POST['SignupForm'])) {
            $length = 32;
            $chars = array_merge(range(0, 9), range('a', 'z'));
            shuffle($chars);
            $sid = implode(array_slice($chars, 0, $length));

            $_POST['SignupForm']['sid'] = $sid;
            $_POST['SignupForm']['id_number'] = '0000000000000';
            $_POST['SignupForm']['school'] = '';
            $_POST['SignupForm']['phone'] = '';
            $_POST['SignupForm']['image'] = '';
            $_POST['SignupForm']['credit'] = 0;
            $_POST['SignupForm']['status'] = 1;

            if ($_POST['password_confirm'] == '') {
                $password_confirm = 1;
            } else if ($_POST['password_confirm'] != $_POST['SignupForm']['password']) {
                $password_not_match = 1;
            } else {
                $model->attributes = $_POST['SignupForm'];
                if ($model->save()) {
                    $to = $model->email;
                    $body = '<html>
                                            <head>
                                              <title>แจ้งข้อมูลการสมัครเป็​นสมาชิกเว็​บไซต์ e-pretest.com</title>
                                            </head>
                                            <body>';
                    $body .= '<p>สวัสดีค่ะ คุณ ' . $model->firstname . ' <br />
                                            <br />
                                            ขอขอบคุณที่คุณสมัครเป็นสมาชิกกับเว็บไซต์ e-pretest.com<br />
                                            --------------------------------------------------------------------<br />
                                            ชื่อผู้ใช้และรหัสผ่านของคุณสำหรับใช้เข้าสู่ระบบ คือ<br />
                                            --------------------------------------------------------------------<br />
                                            ชื่อผู้ใช้ : ' . $model->username . '<br />
                                            รหัสผ่าน : ' . $model->password . '<br />
                                            --------------------------------------------------------------------<br />
  
                                            <br />
                                            </p>
                                            <p><br />
                                            ขอแสดงความนับถือ<br />
                                            <br />
                                            ขอให้มีความสุขกับบริการของ e-pretest นะคะ<br />
                                            <br />
                                            <a href="http://www.e-pretest.com" target="_blank">http://www.e-pretest.com</a>
                                            </p>';
                    $body .= '</body>
                                          </html>';
                    $name = '=?UTF-8?B?' . base64_encode($model->firstname) . '?=';
                    $subject = '=?UTF-8?B?' . base64_encode('แจ้งข้อมูลการสมัครเป็​นสมาชิกเว็​บไซต์ e-pretest.com') . '?=';
                    $headers = "MIME-Version: 1.0\r\n" .
                            "Content-type: text/html; charset=UTF-8\r\n" .
                            "From: e-pretest <epretest@e-studio.co.th>\r\n" .
                            "Reply-To: epretest@e-studio.co.th\r\n";


                    //mail($to, $subject, $body, $headers);
                    //Change Function Send Email
                    $flgSend = $this->sendMail($to,'epretest@e-studio.co.th','E-pretest.com',$subject,$body);
                    if($flgSend){
                        Yii::app()->user->setFlash('create', '<h2>สมัครสมาชิกเรียบร้อยแล้วค่ะ</h2><h3>คุณสามารถล็อกอินเข้าสู่ระบบสมาชิก  ตามชื่อผู้ใช้และรหัสผ่านของคุณได้ทันที<br/> โดยไม่ต้องยืนยันการสมัครสมาชิกผ่านอีเมล์ค่ะ<br/>ขอบคุณที่ไว้ใจ E-Pretest ขออวยพรให้ทุกท่านประสบความสำเร็จในการสอบทุกระดับค่ะ</p>');
                        $this->redirect(array('student/create', 'id' => $model->student_id));
                    }else{
                        Yii::app()->user->setFlash('create','ระบบไม่สามารถส่งอีเมล์ไปยังอีเมล์ของคุณได้');
                        $this->refresh();
                    }

                }
            }
        }
            $this->render('create', array(
            'model' => $model,
            'password_confirm' => $password_confirm,
            'password_not_match' => $password_not_match,
            'option_levels' => $option_levels,

        ));
    }

    public function actionLoginError($key, $message=''){
        //$this->renderText('<h1>Login Error</h1><p>'.$message.'</p>');
        $this->render('login_error');
    }
    public function actionFb() {
        $password_confirm = 0;
        $password_not_match = 0;

        $option_levels = $this->levelOption();
        $option_schools =$this->schoolOption();
        // Define label
        $this->label['firstname'] = 'ชื่อ';
        $this->label['lastname'] = 'นามสกุล';
        $this->label['username'] = 'ชื่อผู้ใช้งาน';
        $this->label['password'] = 'รหัสผ่าน';
        $this->label['button_login'] = 'สมัครสมาชิก';
        $this->label['confirm_pass_label'] = 'กรุณายืนยันรหัสผ่าน';
        $this->label['pass_not_match_label'] = 'รหัสผ่านไม่ตรงกัน';

        $model = new SignupForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'student-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['SignupForm'])) {
            $length = 32;
            $chars = array_merge(range(0, 9), range('a', 'z'));
            shuffle($chars);
            $sid = implode(array_slice($chars, 0, $length));

            $_POST['SignupForm']['sid'] = $sid;
            $_POST['SignupForm']['id_number'] = '0000000000000';
            $_POST['SignupForm']['school'] = '';
            $_POST['SignupForm']['phone'] = '';
            $_POST['SignupForm']['image'] = '';
            $_POST['SignupForm']['credit'] = 0;
            $_POST['SignupForm']['status'] = 1;

            if ($_POST['password_confirm'] == '') {
                $password_confirm = 1;
            } else if ($_POST['password_confirm'] != $_POST['SignupForm']['password']) {
                $password_not_match = 1;
            } else {
                $model->attributes = $_POST['SignupForm'];
                if ($model->save()) {
                    $to = $model->email;
                    $body = '<html>
                                            <head>
                                              <title>ยืนยั​นการสมัครเป็​นสมาชิกเว็​บไซต์ e-pretest.com</title>
                                            </head>
                                            <body>';
                    $body .= '<p>สวัสดีค่ะ คุณ ' . $model->firstname . ' <br />
                                            <br />
                                            ขอขอบคุณที่คุณสมัครเป็นสมาชิกกับเว็บไซต์ e-pretest.com<br />
                                            --------------------------------------------------------------------<br />
                                            ชื่อผู้ใช้และรหัสผ่านของคุณสำหรับใช้เข้าสู่ระบบ คือ<br />
                                            --------------------------------------------------------------------<br />
                                            ชื่อผู้ใช้ : ' . $model->username . '<br />
                                            รหัสผ่าน : ' . $model->password . '<br />
                                            --------------------------------------------------------------------<br />
                                            <u>หมายเหตุ</u> : คุณต้องยืนยันการสมัครสมาชิกก่อน ถึงจะสามารถล็อกอินเข้าสู่ระบบได้ค่ะ
                                            <br /><br />
                                            กรุณาคลิกที่ลิงค์ด้านล่างเพื่อยืนยันการสมัครของคุณภายใน 7 วัน หลังจากได้รับอีเมล์นี้นะคะ<br />
                                            <br />
                                            <a href="http://www.e-pretest.com/index.php?r=student/verify&code=' . $model->sid . '&id=' . $model->student_id . '" target="_blank">http://www.e-pretest.com/index.php?r=student/verify&code=' . $model->sid . '&id=' . $model->student_id . '</a><br />
                                            <br />
                                            หากคุณไม่สามารถคลิกที่ลิงค์นี้ได้ กรุณาคัดลองลิงค์ด้านบนไปวางที่เว็บบราวเซอร์ของคุณค่ะ
                                            <br />
                                            </p>
                                            <p><br />
                                            ขอแสดงความนับถือ<br />
                                            <br />
                                            ขอให้มีความสุขกับบริการของ e-pretest นะคะ<br />
                                            <br />
                                            <a href="http://www.e-pretest.com" target="_blank">http://www.e-pretest.com</a>
                                            </p>';
                    $body .= '</body>
                                          </html>';
                    $name = '=?UTF-8?B?' . base64_encode($model->firstname) . '?=';
                    $subject = '=?UTF-8?B?' . base64_encode('กรุณายืนยั​นการสมัครเป็​นสมาชิกเว็​บไซต์ e-pretest.com') . '?=';
                    $headers = "MIME-Version: 1.0\r\n" .
                            "Content-type: text/html; charset=UTF-8\r\n" .
                            "From: e-pretest <epretest@e-studio.co.th>\r\n" .
                            "Reply-To: epretest@e-studio.co.th\r\n";


                    //mail($to, $subject, $body, $headers);
                    //Change function send email
                    $flgSend = $this->sendMail($to,'epretest@e-studio.co.th','E-pretest.com',$subject,$body);
                    if($flgSend){                        
                        Yii::app()->user->setFlash('create', '<h2>สมัครสมาชิกเรียบร้อยแล้วค่ะ</h2><h3>ระบบจะส่งลิงค์ยืนยันการสมัครไปที่อีเมล์ของคุณที่ได้ทำการสมัครไว้ ภายใน 24 ชั่วโมงค่ะ<br/>กรุณาตรวจสอบอีเมล์ของคุณ และกดลิงค์เพื่อยืนยันการสมัครสมาชิก</h3><p>หากไม่ได้รับอีเมล์ยืนยัน กรุณาตรวจสอบที่เมล์ขยะ (Junk Mail, Spam) ของคุณค่ะ</p>');
                        $this->redirect(array('student/create', 'id' => $model->student_id));
                    }else{
                        Yii::app()->user->setFlash('create','ระบบไม่สามารถส่งอีเมล์ไปยังอีเมล์ของคุณได้');
                        $this->refresh();
                    }
                }
            }
        }
        // display the login form
        $this->render('fb', array(
            'model' => $model,
            'password_confirm' => $password_confirm,
            'password_not_match' => $password_not_match,
            'option_levels' => $option_levels,
        ));
    }

//end function

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
        /* $dataProvider=new CActiveDataProvider('Student');
          $this->render('index',array(
          'dataProvider'=>$dataProvider,
          )); */
        if (Yii::app()->user->id) {
            $id = Yii::app()->user->id;
            $this->render('view', array(
                'model' => $this->loadModel($id),
            ));
        } else {
            $this->redirect(Yii::app()->createUrl('site/index'));
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Student('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Student']))
            $model->attributes = $_GET['Student'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionHistory() {
        if (Yii::app()->user->id) {
            $id = Yii::app()->user->id;


            $test = new TestRecord;
            $history = $test->getTestRecordByStudentID($id);

            foreach ($history as $key => $val) {
                $history[$key]['date_attended'] = $this->thai_date(strtotime($val['date_attended']));

                $exam_id = $val['exam_id'];
                $test = new TestRecord();
                $test_static = $test->getTestRecordDetailByExamId($exam_id);

                $history[$key]['exam_avg'] = $test_static['score_avg'];
            }


            $this->render('history', array(
                'model' => $this->loadModel($id),
                'history' => $history
            ));
        } else {
            $this->redirect(Yii::app()->createUrl('site/login'));
        }
    }

    public function actionViewAll() {
        if (isset($_GET['level_id'])) {
            $level_id = $_GET['level_id'];
        } else {
            $id = Yii::app()->user->id;
            $student = Student::model()->findByPk($id);
            $level_id = $student->level_id;
        }

        $level = Level::model()->findByPk($level_id);

        $type_criteria = new CDbCriteria();
        $type_criteria->select = '*';
        $type_criteria->condition = 'status=:status AND level_id=:level_id AND exam_type=:exam_type';
        $type_criteria->params = array(':status' => 1, ':level_id' => $level_id, ':exam_type' => 'Exam');
        $type_criteria->order = 'sort_order';
        $types_exam = Type::model()->findAll($type_criteria);

        $type_criteria2 = new CDbCriteria();
        $type_criteria2->select = '*';
        $type_criteria2->condition = 'status=:status AND level_id=:level_id AND exam_type=:exam_type';
        $type_criteria2->params = array(':status' => 1, ':level_id' => $level_id, ':exam_type' => 'Exercise');
        $type_criteria2->order = 'sort_order';
        $types_ex = Type::model()->findAll($type_criteria2);
        $this->render('viewall', array(
            'types_exam' => $types_exam,
            'types_ex' => $types_ex,
            'level' => $level
        ));
    }

    public function actionSelect() {
        $exam_id = $_GET['exam_id'];
        $TestRecord = new TestRecord;
        $TestAll = $TestRecord->getTotalTestRecordByExamId($exam_id);


        $text = '<table cellpadding="0" cellspacing="0" border="0" class="display" id="table_list_name">
                                <thead>
                                        <tr>
                                                <th width="200">ชื่อ - นามสกุล</th>
                                                <th width="108">โรงเรียน</th>
                                                <th width="55">คะแนนที่ได้</th>
                                        </tr>
                                </thead>';
        $text .= '<tbody>';
        foreach ($TestAll as $Test) {
            $score = explode('.', $Test['score']);

            foreach ($score as $value) {
                
            }
            if ($value == '00') {
                $score = number_format($Test['score']);
            } else {
                $score = $Test['score'];
            }


            $text .= '<tr>
                        <td class="name">' . $Test['firstname'] . ' ' . $Test['lastname'] . '</td>
                        <td class="school">' . $Test['school'] . '</td>
                        <td class="point">' . $score . '</td>
                        </tr>';
        }
        $text .= '</tbody>
                    </table>';
        echo $text;
    }

    public function actionShowExam() {
        $subject_id = $_GET['subject_id'];
        $exam = new Exam;
        $exam_info = $exam->getExamBySubjectId($subject_id);
        $text = '';
        foreach ($exam_info as $ex) {
            $exam_detail = $exam->getExamDetailById($ex['exam_id']);
//                          echo "<br> ===> ";
//                          echo "<pre>";
//                          print_r($exam_detail);
//                          echo "</pre>";
            $text .= "<li id=\"exam_li\" style=\"float:left;\"><a onclick=\"showStudent('" . $ex['exam_id'] . "','" . $ex['name'] . "')\">  &nbsp;» " . $ex['name'] . "</a></li>";
        }
        echo $text;
    }

    public function actionSignUp() {
        $this->render('signup');
    }

    public function actionExtra() {

        $password_confirm = 0;
        $password_not_match = 0;

        $this->label['confirm_pass_label'] = 'กรุณายืนยันรหัสผ่าน';
        $this->label['pass_not_match_label'] = 'รหัสผ่านไม่ตรงกัน';

        $option_levels = $this->levelOption();
        $option_schools = $this->schoolOption();
        $model = new Student;
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'student-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['Student'])) {

            $length = 32;
            $chars = array_merge(range(0, 9), range('a', 'z'));
            shuffle($chars);
            $sid = implode(array_slice($chars, 0, $length));
            $_POST['Student']['sid'] = $sid;
            $_POST['Student']['credit'] = 0;


            if (isset($_POST['number1'])) {
                $_POST['Student']['id_number'] = $_POST['number1'] . $_POST['number2'] . $_POST['number3'] . $_POST['number4'] . $_POST['number5'] . $_POST['number6'] . $_POST['number7'] . $_POST['number8'] . $_POST['number9'] . $_POST['number10'] . $_POST['number11'] . $_POST['number12'] . $_POST['number13'];
            } else {
                $_POST['Student']['id_number'] = '0000000000000';
            }
            list($d, $m, $y) = explode("/", $_POST['Student']['birthday']);
            $birthday = ($y - 543) . "-" . $m . "-" . $d;
            $_POST['Student']['birthday'] = $birthday;


            if ($_POST['password_confirm'] == '') {
                $password_confirm = 1;
            } else if ($_POST['password_confirm'] != $_POST['Student']['password']) {
                $password_not_match = 1;
            } else {
                $model->attributes = $_POST['Student'];
                $image = CUploadedFile::getInstance($model, 'image');

                //exit;
                if ($model->save()) {
                    if ($image) {
                        $genName = 'Student_' . $model->student_id;
                        $saveName = $genName;

                        while (file_exists($this->upload_path . $saveName . '.' . $image->getExtensionName())) {
                            $saveName = $genName;
                        }

                        $model->image = $saveName . '.' . $image->getExtensionName();
                        $image->saveAs($this->upload_path . $model->image);
                        $model->save();
                    }
                    $to = $model->email;
                    $body = '<html>
                                            <head>
                                              <title>ยืนยั​นการสมัครเป็​นสมาชิกเว็​บไซต์ e-pretest.com</title>
                                            </head>
                                            <body>';
                    $body .= '<p>สวัสดีค่ะ คุณ ' . $model->firstname . ' <br />
                                            <br />
                                            ขอขอบคุณที่คุณสมัครเป็นสมาชิกกับเว็บไซต์ e-pretest.com<br />
                                            --------------------------------------------------------------------<br />
                                            ชื่อผู้ใช้และรหัสผ่านของคุณสำหรับใช้เข้าสู่ระบบ คือ<br />
                                            --------------------------------------------------------------------<br />
                                            ชื่อผู้ใช้ : ' . $model->username . '<br />
                                            รหัสผ่าน : ' . $model->password . '<br />
                                            --------------------------------------------------------------------<br />
                                            <u>หมายเหตุ</u> : คุณต้องยืนยันการสมัครสมาชิกก่อน ถึงจะสามารถล็อกอินเข้าสู่ระบบได้ค่ะ
                                            <br /><br />
                                            กรุณาคลิกที่ลิงค์ด้านล่างเพื่อยืนยันการสมัครของคุณภายใน 7 วัน หลังจากได้รับอีเมล์นี้นะคะ<br />
                                            <br />
                                            <a href="http://www.e-pretest.com/index.php?r=student/verify&code=' . $model->sid . '&id=' . $model->student_id . '" target="_blank">http://www.e-pretest.com/index.php?r=student/verify&code=' . $model->sid . '&id=' . $model->student_id . '</a><br />
                                            <br />
                                            หากคุณไม่สามารถคลิกที่ลิงค์นี้ได้ กรุณาคัดลองลิงค์ด้านบนไปวางที่เว็บบราวเซอร์ของคุณค่ะ
                                            <br />
                                            </p>
                                            <p><br />
                                            ขอแสดงความนับถือ<br />
                                            <br />
                                            ขอให้มีความสุขกับบริการของ e-pretest นะคะ<br />
                                            <br />
                                            <a href="http://www.e-pretest.com" target="_blank">http://www.e-pretest.com</a>
                                            </p>';
                    $body .= '</body>
                                          </html>';
                    $name = '=?UTF-8?B?' . base64_encode($model->firstname) . '?=';
                    $subject = '=?UTF-8?B?' . base64_encode('กรุณายืนยั​นการสมัครเป็​นสมาชิกเว็​บไซต์ e-pretest.com') . '?=';
                    $headers = "MIME-Version: 1.0\r\n" .
                            "Content-type: text/html; charset=UTF-8\r\n" .
                            "From: e-pretest <epretest@e-studio.co.th>\r\n" .
                            "Reply-To: epretest@e-studio.co.th\r\n";


                    //mail($to, $subject, $body, $headers);
                    //Change function send email
                    $flgSend = $this->sendMail($to,'epretest@e-studio.co.th','E-pretest.com',$subject,$body);
                    if($flgSend){                        
                        Yii::app()->user->setFlash('create', '<h2>สมัครสมาชิกเรียบร้อยแล้วค่ะ</h2><h3>ระบบจะส่งลิงค์ยืนยันการสมัครไปที่อีเมล์ของคุณที่ได้ทำการสมัครไว้ ภายใน 24 ชั่วโมงค่ะ<br/>กรุณาตรวจสอบอีเมล์ของคุณ และกดลิงค์เพื่อยืนยันการสมัครสมาชิก</h3><p>หากไม่ได้รับอีเมล์ยืนยัน กรุณาตรวจสอบที่เมล์ขยะ (Junk Mail, Spam) ของคุณค่ะ</p>');
                        $this->redirect(array('student/extra', 'id' => $model->student_id));
                    }else{
                        Yii::app()->user->setFlash('create','ระบบไม่สามารถส่งอีเมล์ไปยังอีเมล์ของคุณได้');
                        $this->refresh();
                    }                    

                }
            }
        }
        // display the login form
        $this->render('extra', array(
            'model' => $model,
            'password_confirm' => $password_confirm,
            'password_not_match' => $password_not_match,
            'option_levels' => $option_levels,
            'option_schools' => $option_schools,
        ));
    }

    public function actionSendEmailFriend() {

        if (isset($_POST['friend_email']) && isset($_POST['student_id'])) {
            $sep = "";
            $email_list = $_POST['friend_email'];
            $email_friends = "";
            foreach ($email_list as $key => $email) {
                if ($email) {
                    $email_friends .= $sep . $email;
                    $sep = ",";
                }
            }
            $student_id = $_POST['student_id'];
            $status = $this->saveEmailFriendStudent($email_friends, $student_id);
            // display page
            $this->render('success');
        } else {
            $this->redirect(array('student/extra'));
        }
    }

    public function actionVerify() {

        if (isset($_GET['code']) && isset($_GET['id'])) {
            $sid = $_GET['code'];
            $student_id = $_GET['id'];
            $status = $this->verifyStatusForStudent($sid, $student_id);
            if ($status) {
                $verify = 1;
            } else {
                $model = $this->loadModel($student_id);
                if($model->status==1 && $model->sid==$sid){
                    $verify = 1;
                }else{
                    $verify = 0;
                }
            }
        } else {
            $verify = 0;
        }
        $this->render('verify', array('verify' => $verify));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Student::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function verifyStatusForStudent($sid, $student_id) {
        $command = Yii::app()->db->createCommand();
        $result = $command->update('esto_student', array(
            'status' => 1,
                ), 'student_id=:student_id AND sid =:sid', array(':student_id' => $student_id, ':sid' => $sid));
        return $result;
    }

    public function saveEmailFriendStudent($email_friends, $student_id) {
        $command = Yii::app()->db->createCommand();
        $result = $command->update('esto_student', array(
            'email_friends' => $email_friends,
                ), 'student_id=:student_id', array(':student_id' => $student_id));
        return $result;
    }

    public function levelOption() {
        $condition = array(
            'condition' => 'status=:status',
            'params' => array(':status' => 1),
            'order' => 'level_id DESC',
        );
        $levels = Level::model()->findAll($condition);

        $option_levels = array();

        if (is_array($levels)) {
            foreach ($levels as $level) {
                $option_levels[$level->level_id] = $level->name;
            }
            return $option_levels;
        }
    }

    public function schoolOption() {
        $condition = array(
            'order' => 'name',
        );
        $schools = School::model()->findAll($condition);

        $option_schools = array();

        if (is_array($schools)) {
            foreach ($schools as $school) {
                array_push($option_schools,$school->name);                
            }
            return $option_schools;
        }
    }

    public function thai_date($time) {
        $thai_date_return = date("j", $time) . " " . $this->thai_month_arr[date("n", $time)] . " " . (date("Y", $time) + 543);
        $thai_date_return.= " " . date("H:i", $time) . " น.";
        return $thai_date_return;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'student-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    public function sendMail($email_to,$email_from, $sender, $subject, $message) {
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
