<?php
require_once('mail.php');
class TransferController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

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
                $model = $this->loadModel($id);
                $data = $this->getOrderAndStudentByInvoice($model->inv_id);
//                  echo "<br> ===> ";
//		  echo "<pre>";
//		  print_r($data);
//		  echo "</pre>";

                $this->render('view',array(
			'model'=>$model,'data'=>$data,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Transfer;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Transfer']))
		{
			$model->attributes=$_POST['Transfer'];
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Transfer']))
		{
			$model->attributes=$_POST['Transfer'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('view',array(
			'model'=>$model,'data'=>$data,
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
		/*$dataProvider=new CActiveDataProvider('Transfer');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
                $model=new Transfer('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Transfer']))
			$model->attributes=$_GET['Transfer'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Transfer('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Transfer']))
			$model->attributes=$_GET['Transfer'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

        public function actionTopup()
	{

                /*echo "<br> ===> ";
                echo "<pre>";
                print_r($_POST);
                echo "</pre>";*/
                $id = $_POST['trans_id'];
                $new_credit = $_POST['credit']+$_POST['old_credit'];
                $student_id = $_POST['student_id'];
                $model=$this->loadModel($id);
                $inv_id = $model->inv_id;
                

                /*echo "<br> ===> ";
                echo "<pre>";
                print_r($_POST);
                echo "</pre>";*/

                //Update New Credit
                $connection = yii::app()->db;
                $sql = "UPDATE esto_student SET credit = '".$new_credit."' WHERE student_id=".$student_id;
                $command=$connection->createCommand($sql);
                $result = $command->execute();

                $data = $this->loadStudentModel($student_id);
                if($result){
                    //Send Email
                    $send_mail = $this->sendMailToCustomer($data);
                     if($send_mail){
                         //Update Status , Send Email Status in Transfer
                          $sql2 = "UPDATE esto_transfer SET status = 'Y',send_email = 'Y' WHERE id=".$id;
                          $command2=$connection->createCommand($sql2);
                          $result2 = $command2->execute();

                           //Update Order Status ID
                          $sql3 = "UPDATE esto_order SET order_status_id = '2' WHERE inv_id='".$inv_id."'";
                          $command3=$connection->createCommand($sql3);
                          $result3 = $command3->execute();

                          
                     }

                     $this->redirect(array('index'));

                }else{
                    $this->render('view',array(
			'model'=>$model,
                    ));
                }
                
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
        public function getOrderAndStudentByInvoice($inv_id){
           // echo $inv_id;
               $rows = Yii::app()->db->createCommand()
                        ->select('order.*,student.firstname,student.lastname,student.credit AS old_credit')
                        ->from('esto_order order')
                        ->leftjoin('esto_student student', 'student.student_id=order.student_id')
                        ->where('order.inv_id="'.$inv_id.'"' )
                        ->queryRow();
//                  echo "<br> ===> ";
//		  echo "<pre>";
//		  print_r($rows);
//		  echo "</pre>";
               return $rows;

        }
	public function loadModel($id)
	{
                $model=Transfer::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


        public function loadStudentModel($id)
	{
		$model=Student::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='transfer-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
         public function sendMailToCustomer($data)
	{
            // recipients
            $to  = $data->email;
            //$to = "payment@e-studio.co.th";
            $bcc  = "endrophine_nok@hotmail.com";
            $from = "payment@e-studio.co.th";

            // subject
            $subject = "แจ้งการเติมเครดิตให้กับบัญชีผู้ใช้ของคุณ :: e-pretest.com";

            // message
            $message = '
            <html>
            <head>
              <title>แจ้งการเติมเครดิตให้กับบัญชีผู้ใช้ของคุณ</title>
            </head>
            <body>
              <h3>แจ้งการเติมเครดิตให้กับบัญชีผู้ใช้ของคุณ</h3>
              <p>เจ้าหน้าที่ได้ทำการเติมเครดิตให้กับบัญชีผู้ใช้ของคุณ <b>'.$data->username.'</b> เรียบร้อยแล้วคะ</p>
              <p>จำนวนเครดิตของคุณในขณะนี้ คือ <b>'.$data->credit.'</b> เครดิต</p>';

            $message .= '
            </body>
            </html>
            ';

            // To send HTML mail, the Content-type header must be set
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

            // Additional headers
            $headers .= 'To: ' .$to."\r\n";
            $headers .= 'From: e-pretest <'.$from."> \r\n";
            $headers .= 'Bcc: '.$bcc. "\r\n";


            // Mail it
            //$flgSend = @mail($to, $subject, $message, $headers);
            //Change function send email
            $flgSend = $this->sendMail($to,'contact@e-studio.co.th','E-pretest.com',$subject,$message);

            return $flgSend;
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
