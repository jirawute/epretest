<?php

class CouponController extends AdminController
{
	public function actionIndex()
	{
		if(isset($_POST['coupon_submit'])) {
			$criteria = new CDbCriteria();
			$criteria->condition = 'setting_group=:group';
			$criteria->params=array(':group'=>'coupon');
			
			Setting::model()->deleteAll($criteria);
			
			if(isset($_POST['coupon'])) {
				$size = count($_POST['coupon']);
	
				$i = 1;
				
				foreach($_POST['coupon'] as $key) {
					$value = array(
						'code' => $key['code'],
						'point'=> $key['point'],
						'status'=>  $key['status'],
					);
					
					$serialized_value = serialize($value);
					
					$credit = new Setting;
					$credit->setting_group = 'coupon';
					$credit->key = 'coupon_' . $i;
					$credit->value = $serialized_value;
					$credit->serialized = 1;
					$credit->save();
					
					$i++;
				}
			}
			
			Yii::app()->user->setFlash('success', 'Coupon has been saved.');
			
			$this->redirect(Yii::app()->createUrl('coupon/index'));
		}
	
		$models = $this->loadModel('coupon');
		
		$coupons = array();
		
		$size = count($models);
		
		foreach($models as $model) {
			$data = unserialize($model->value);
		
			$coupons[] = array(
				'code' => $data['code'],
				'point'=> $data['point'],
				'status'=>  $data['status'],
			);
		}
		
		$this->render('index',array(
			'coupons' => $coupons,
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