<?php
require_once('mail.php');
class SiteController extends Controller
{        
	public $label = array();
	
	public $layout;

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		$this->layout = '//layouts/information_view';
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
                        // ADD THIS:
                        'crugeconnector'=>array('class'=>'CrugeConnectorAction'),

		);
	}
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// Get information data
		$info_criteria=new CDbCriteria();
		$info_criteria->select='*';
		$info_criteria->condition='status=:status';
		$info_criteria->params=array(':status'=>1);
		$info_criteria->order='date_added desc';
		$info_criteria->limit=4;

		$informations = Information::model()->findAll($info_criteria);

		
		// Top Banner
		$tb_criteria = new CDbCriteria();
		$tb_criteria->select = '*';
		$tb_criteria->condition = 'status=:status AND t.group=:group';
		$tb_criteria->params=array(':status'=>1,':group'=>'Top');
		$tb_criteria->order='sort_order';
		
		$top_banners = Banner::model()->findAll($tb_criteria);
		
		// Bottom Banner
		$bb_criteria = new CDbCriteria();
		$bb_criteria->select = '*';
		$bb_criteria->condition = 'status=:status AND t.group=:group';
		$bb_criteria->params=array(':status'=>1,':group'=>'Bottom');
		$bb_criteria->order='sort_order';

		$bottom_banners = Banner::model()->findAll($bb_criteria);

                // Level
		$level_criteria = new CDbCriteria();
		$level_criteria->select = '*';
		$level_criteria->condition = 'status=:status';
		$level_criteria->params=array(':status'=>1);
		$level_criteria->order='sort_order, level_id';


		$levels = Level::model()->findAll($level_criteria);
	
		$this->render('index', array(
			'informations'	=> $informations,
			'top_banners'	=> $top_banners,
			'bottom_banners'=> $bottom_banners,
                        'levels'=> $levels,
		));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error==Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

        public function actionForgetpassword()
	{
                $this->layout = '//layouts/column2';
                $model=new ForgetpasswordForm;
		if(isset($_POST['ForgetpasswordForm']))
		{
			$model->attributes=$_POST['ForgetpasswordForm'];
			if($model->validate())
			{
                            $email = $_POST['ForgetpasswordForm']['email'];
                            $chk_email = $this->checkValidateEmail($email);
                            if($chk_email>0){
                                $student = Student::model()->find("email = '".$email."'");

                                $length = 10;
                                $chars = array_merge(range(0,9), range('a','z'));
                                shuffle($chars);
                                $password = implode(array_slice($chars, 0, $length));

                                $this->setNewPassword($student->student_id,$password);
                                $student = $this->loadModel($student->student_id);
                                $to = $email;
                                $from = "epretest@e-studio.co.th";
                                $message = '<html>
                                            <head>
                                              <title>แจ้งรหัสผ่านใหม่ของเว็บไซต์ e-pretest.com</title>
                                            </head>
                                            <body>';
                                $message .= '<p>สวัสดีค่ะ คุณ '.$student->firstname.' <br />
                                            <br />
                                            คุณสามารถเข้าสู่ระบบสมาชิกด้วยข้อมูลใหม่ดังนี้<br />
                                            หน้าล็อกอิน: http://www.e-pretest.com/index.php?r=site/checklogin<br />
                                            --------------------------------------------------------------------<br />
                                            ชื่อผู้ใช้และรหัสผ่านของคุณสำหรับใช้เข้าสู่ระบบ คือ<br />
                                            --------------------------------------------------------------------<br />
                                            ชื่อผู้ใช้ : '.$student->username.'<br />
                                            รหัสผ่านใหม่ : '.$student->password.'<br />
                                            --------------------------------------------------------------------<br />
                                            <br />

                                            <br />
                                            </p>
                                            <p><br />
                                            ขอแสดงความนับถือ<br />
                                            <br />
                                            ขอให้มีความสุขกับบริการของ e-pretest นะคะ<br />
                                            <br />
                                            <a href="http://www.e-pretest.com" target="_blank">http://www.e-pretest.com</a>
                                            </p>'   ;
                                $message .=   '</body>
                                          </html>';
                                $name='=?UTF-8?B?'.base64_encode($student->firstname).'?=';
				$subject='=?UTF-8?B?'.base64_encode('แจ้งรหัสผ่านใหม่ของเว็บไซต์ e-pretest.com').'?=';
				$headers="MIME-Version: 1.0\r\n".
					 "Content-type: text/html; charset=UTF-8\r\n".
                                         "From: e-pretest <epretest@e-studio.co.th>\r\n".
                                         "Reply-To: epretest@e-studio.co.th\r\n";
//                                echo $body;
//                                exit;
//                                sendMail($email_to,$email_from, $sender, $subject, $message) 
                                //mail($to,$subject,$body,$headers);
				$flgSend = $this->sendMail($to,$from,'E-pretest.com',$subject,$message);
                                if($flgSend){
                                    Yii::app()->user->setFlash('forgetpass','ระบบได้ทำการส่งรหัสผ่านใหม่ไปยังอีเมล์ของคุณเรียบร้อยแล้วคะ');
                                    $this->refresh();
                                }else{
                                    Yii::app()->user->setFlash('forgetpass','ระบบไม่สามารถส่งรหัสผ่านใหม่ไปยังอีเมล์ของคุณได้');
                                    $this->refresh();
                                }
                                
                            }else{
                                Yii::app()->user->setFlash('forgetpass','ขออภัยค่ะ ไม่พบอีเมล์นี้ในระบบ<br/>กรุณาตรวจสอบอีเมล์ของคุณใหม่อีกครั้งคะ');
				$this->refresh();
                            }

			}
		}
		$this->render('forgetpassword',array('model'=>$model));
        }


        public function validate() {
            if($_POST['password_confirm']==''){
                $password_confirm = 1;
                return false;
            }else if($_POST['password_confirm']!=$_POST['SignupForm']['password']){
                $password_not_match = 1;
                return false;
            } else {
                return true;
            }
        }

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		// Define label
		$this->label['heading_title'] = 'เข้าสู่ระบบ';	
		$this->label['entry_username'] = 'ชื่อผู้ใช้';
		$this->label['entry_password'] = 'รหัสผ่าน';
		$this->label['entry_remember'] = 'บันทึกการใช้งานของฉัน';		
		$this->label['button_login'] = 'เข้าสู่ระบบ';
	
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				//$this->redirect(Yii::app()->user->returnUrl);
                                $this->redirect(Yii::app()->createUrl('student/view'));

		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
        
        
        public function actionCheckLogin()
	{
                // Define label
		$this->label['heading_title'] = 'เข้าสู่ระบบ';
		$this->label['entry_username'] = 'ชื่อผู้ใช้';
		$this->label['entry_password'] = 'รหัสผ่าน';
		$this->label['entry_remember'] = 'บันทึกการใช้งานของฉัน';
		$this->label['button_login'] = 'เข้าสู่ระบบ';
		$model=new LoginForm;
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
                            //$this->redirect(Yii::app()->user->returnUrl);
                            $this->redirect(Yii::app()->createUrl('student/view'));
                        }else{
                            $this->render('login',array('model'=>$model));
                        }				

		}else{
                     $this->render('login',array('model'=>$model));

                }

	}

        public function loadModel($id)
	{
		$model=Student::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

        public function checkValidateEmail($email){
            $command = Yii::app()->db->createCommand();
            $result = $command->select('COUNT(*) as total')->from('esto_student')->where('email=:email ', array(':email'=>$email))->queryRow();
            return $result['total'];

        }

        public function setNewPassword($student_id,$password){

           $command = Yii::app()->db->createCommand();
           $result = $command->update('esto_student', array(
                                            'password'=>$password,
                                        ), 'student_id=:student_id', array(':student_id'=>$student_id));
           return $result;

        }
        
                
        public function sendMail($email_to,$email_from, $sender, $subject, $message) {
            $mail = new Mail();
            if (isset($email_to)) {
                $mail->protocol = 'smtp';
                $mail->parameter = "";
                $mail->hostname = "ssl://smtp.gmail.com";
                $mail->username = "epretest@e-studio.co.th";
                $mail->password = "epretest1q2w3e";            
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