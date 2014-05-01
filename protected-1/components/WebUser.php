<?php
class WebUser extends CWebUser
{
	private $_model;
	
	public $username;
		
	public function getStudentInfo() {
		$info = array();
		
		$user = $this->loadUser(Yii::app()->user->id);
		
		if($user !== null) {
			if($user->student !== null) {
				$info = $user->student->attributes;
			}
		}
		
		return $info;
	}
	
	public function getGroupInfo() {
		$info = array();
		
		$user = $this->loadUser(Yii::app()->user->id);
		
		if($user !== null) {
			if($user->user_group !== null) {
				$info = $user->userGroup->attributes;
			}
		}

		return $info;
	}
	
	public function setUserInfo() {
		$user = $this->loadUser(Yii::app()->user->id);
		
		if($user !== null) {
			if($user->user_group !== null) {
				$this->group = $user->userGroup->name;
				$this->role = $user->userGroup->role;
			}
		}
	}
	
	public function getGroup() {
		$user = $this->loadUser(Yii::app()->user->id);
		
		if($user !== null) {
			if($user->user_group !== null) {
				return $user->userGroup->name;
			}
		}

		return '';
	}
	
	public function getRole() {
		$user = $this->loadUser(Yii::app()->user->id);
		
		if($user !== null) {
			if($user->user_group !== null) {
				return $user->userGroup->role;
			}
		}

		return '';
	}
	
	// Load user model.
	protected function loadUser($id=null)
	{
		if($this->_model === null) {
			if($id !== null) {
				$this->_model = User::model()->with(array('userGroup','student'))->findByPk($id);
			}
		}
		
		return $this->_model;
	}
}
?>