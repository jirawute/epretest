<?php

class CreditPointController extends AdminController
{
	public function actionIndex()
	{
		if(isset($_POST['credit_point'])) {
			$criteria = new CDbCriteria();
			$criteria->condition = 'setting_group=:group';
			$criteria->params=array(':group'=>'credit_point');
			
			Setting::model()->deleteAll($criteria);
			
			$size = count($_POST['credit_point']);

			$i = 1;
			
			foreach($_POST['credit_point'] as $key) {
				$value = array(
					'point' => $key['point'],
					'price' =>  $key['price'],
					'status'=>  $key['status'],
					'sort_order'=>  $key['sort_order'],
				);
				
				$serialized_value = serialize($value);
				
				$credit = new Setting;
				$credit->setting_group = 'credit_point';
				$credit->key = 'credit_point_' . $i;
				$credit->value = $serialized_value;
				$credit->serialized = 1;
				$credit->save();
				
				$i++;
			}
			
			Yii::app()->user->setFlash('success', 'Credit point has been saved.');
			
			$this->redirect(Yii::app()->createUrl('creditPoint/index'));
		}
	
		$models = $this->loadModel('credit_point');
		
		$credit_points = array();
		
		$size = count($models);
		
		foreach($models as $model) {
			$data = unserialize($model->value);
		
			$credit_points[] = array(
				'point' => $data['point'],
				'price' => $data['price'],
				'status'=> $data['status'],
				'sort_order'=> $data['sort_order'],
			);
		}
		
		$this->render('index',array(
			'credit_points' => $credit_points,
			'row' => ($size+1),
		));
	}
	
	public function loadModel($method)
	{
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->condition = 'setting_group=:group';
		$criteria->params=array(':group'=>$method);
		$criteria->order='t.key';
		
		$model = Setting::model()->findAll($criteria);
		if($model === null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}