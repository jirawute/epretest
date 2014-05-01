<?php

class SettingController extends AdminController
{
	public function actionIndex()
	{
		if(isset($_POST['Setting'])) {
			echo "Post";
		}
	
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->condition = 'setting_group=:group';
		$criteria->params=array(':group'=>'config');
		
		$models = Setting::model()->findAll($criteria);
		
		$config = array();
		
		foreach($models as $model) {
			//echo "<pre>",print_r($model->attributes),"</pre>";
			$config[$model->attributes['key']] = $model->attributes['value'];
		}
		
		$this->render('admin', array('config'=>$config));
	}
}