<?php

class PaymentController extends AdminController
{
	public $accept_param = array();

	protected function beforeAction($action) {
		$this->accept_param = Yii::app()->params['payment_methods'];
		
		if(isset($_GET['method'])) {
			if(array_key_exists($_GET['method'], $this->accept_param)) return true;
			else throw new CHttpException(404,'The requested page does not exist.');
		}
		
		if(isset($_POST['method'])) {
			if(array_key_exists($_POST['method'], $this->accept_param)) return true;
			else throw new CHttpException(404,'The requested page does not exist.');
		}
	}

	public function actionIndex($method)
	{
		if(isset($_POST[$method])) {
			$criteria = new CDbCriteria();
			$criteria->condition = 'setting_group=:group';
			$criteria->params=array(':group'=>$method);
			
			Setting::model()->deleteAll($criteria);
		
			foreach($_POST[$method] as $key => $value) {
				$payment = new Setting;
				$payment->setting_group = $method;
				$payment->key = $key;
				$payment->value = $value;
				$payment->serialized = 0;
				$payment->save();
			}
			
			Yii::app()->user->setFlash('success', $this->accept_param[$method] . ' payment method has been saved.');
			
			$this->redirect(Yii::app()->createUrl('payment/index', array('method'=>$method)));
		}
	
		$models = $this->loadModel($method);
		
		$form_data = array();
		
		foreach($models as $model) {
			$form_data[$model->attributes['key']] = $model->attributes['value'];
		}
		
		$order_statuses = array();
		
		$order_status_models = OrderStatus::model()->findAll();
		
		foreach($order_status_models as $model) {
			$order_statuses[$model->order_status_id] = $model->name;
		}
		
		$this->render('index', array(
			'title'	=> $this->accept_param[$method],
			'method'=> $method,
			'form'	=> '_form_' . $method,
			'form_data'=> $form_data,
			'order_statuses'=>$order_statuses,
		));
	}
	
	public function loadModel($method)
	{
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->condition = 'setting_group=:group';
		$criteria->params=array(':group'=>$method);
		
		$model = Setting::model()->findAll($criteria);
		if($model === null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}