<?php
require_once('mail.php');
class ScholarshipTransferController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';
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
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
                $this->layout='//layouts/column2';
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
		$model=new ScholarshipTransfer;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['ScholarshipTransfer']))
		{
			$model->attributes=$_POST['ScholarshipTransfer'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
//                echo "<br> ===> ";
//                echo "<pre>";
//                print_r($_POST);
//                echo "</pre>";
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ScholarshipTransfer']))
		{
                        $inv_id =  $_POST['ScholarshipTransfer']['inv_id'];
                        //echo $inv_id;

                        $scholarship_id = $this->getScholarshipIdByInvoiceNo($inv_id);
                        //echo $scholarship_id;

                        $data = array();
                        $scholar = $this->loadModelScholarship($scholarship_id);
                        //echo $email;

                        $data['payment_status']=2;
                        $scholar->attributes = $data;
                        $scholar->save();

                        $_POST['ScholarshipTransfer']['status'] = 'Y';
			$model->attributes=$_POST['ScholarshipTransfer'];
//                        Yii::app()->user->setFlash('success','อัพเดตสถานะการชำระเงินและส่งอีเมล์เรียบร้อยแล้วค่ะ');
//                        $this->refresh();


			if($model->save()){
                                $send_mail = $this->sendMailToCustomer($scholar);
                                if($send_mail){
                                    $_POST['ScholarshipTransfer']['send_email'] = 'Y';
                                    $model->attributes=$_POST['ScholarshipTransfer'];
                                    $model->save();
                                    Yii::app()->user->setFlash('success','อัพเดตสถานะการชำระเงินและส่งอีเมล์เรียบร้อยแล้วค่ะ');
                                    $this->redirect(array('view','id'=>$model->id));
                                    //$this->refresh();
                                }else{
                                    $_POST['ScholarshipTransfer']['send_email'] = 'N';
                                    $model->attributes=$_POST['ScholarshipTransfer'];
                                    $model->save();
                                    Yii::app()->user->setFlash('error','ไม่สามารถส่งอีเมล์ได้ค่ะ');
                                    $this->redirect(array('view','id'=>$model->id));

                                }
                        }
		}

		$this->render('view',array(
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
//		$dataProvider=new CActiveDataProvider('ScholarshipTransfer');
//		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
//		));

            	$model=new ScholarshipTransfer('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ScholarshipTransfer']))
			$model->attributes=$_GET['ScholarshipTransfer'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ScholarshipTransfer('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ScholarshipTransfer']))
			$model->attributes=$_GET['ScholarshipTransfer'];

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
		$model=ScholarshipTransfer::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

        public function loadModelScholarship($id)
	{
		$model=Scholarship::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

        public function getScholarshipIdByInvoiceNo($inv_id)
	{
                $criteria=new CDbCriteria();
		$criteria->select='*';
		$criteria->condition='inv_id="'.$inv_id.'"';

		$model=Scholarship::model()->find($criteria);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model->scholar_enroll_id;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='scholarship-transfer-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

        public function sendMailToCustomer($data)
	{
            // recipients
            $to  = trim($data->email);
            //$to = "payment@e-studio.co.th";
            //$cc  = "kawiwan@hotmail.com";
            //$bcc  = "kanokwan@khroton.com";          
           

            $from = "contact@e-studio.co.th";

            // subject
            $subject = "ผลการสมัคร".$data->scholarDetail->name." : สำเร็จ";

            // message
            $message = '
            <html>
            <head>
              <title>ผลการสมัคร".$data->scholarDetail->name." : สำเร็จ</title>
            </head>
            <body>
              <p>เรียน คุณ'.$data->name_th.' '.$data->surename_th.'&nbsp;&nbsp;&nbsp;รหัสอ้างอิง : '.$data->email.'</p>
              <br/>
              <p>อีเมล์ฉบับนี้ส่งมาเพื่อยืนยันการสมัคร'.$data->scholarDetail->name.'<br/>
              '.$data->scholarDetail->desc.'</p>
              <br/>
              <p>รหัสอ้างอิงของผู้สมัคร คือ '.$data->email.'</p>
              <br/>
              <p>ทางสถาบันฯจะประกาศผลผู้มีสิทธิ์สัมภาษณ์ในวันที่ '.$this->thai_date(strtotime($data->scholarDetail-> announce_date)).'<br/>
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
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

            // Additional headers
            $headers .= 'To: ' .$to."\r\n";
            $headers .= 'From: ES-ILC <'.$from."> \r\n";
            //$headers .= 'Cc: '.$cc. "\r\n";
            //$headers .= 'Bcc: '.$bcc. "\r\n";


            // Mail it
            //$flgSend = @mail($to, $subject, $message, $headers);
            $flgSend = $this->sendMail($to,'contact@e-studio.co.th','ES-ILC',$subject,$message);
            return $flgSend;
	}

        public function thai_date($time){

            $thai_date_return = date("j",$time)." ".$this->thai_month_arr[date("n",$time)]." ".(date("Y",$time)+543);
            return $thai_date_return;
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


