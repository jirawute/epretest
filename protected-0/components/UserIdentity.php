<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $user_id;

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{	
		$user = User::model()->with(array('userGroup'))->find('username = ? AND password = ? AND status=1', array($this->username, $this->password));
		
		if($user === null) {
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		} else {
			$this->user_id = $user->user_id;
			$this->username = $user->username;
			
			$auth=Yii::app()->authManager;
			
			if(!$auth->isAssigned($user->userGroup->role,$this->user_id)) {
				if($auth->assign($user->userGroup->role,$this->user_id)) {
					Yii::app()->authManager->save();
				}
			}
			
			$this->errorCode=self::ERROR_NONE;
		}
		
		return $this->errorCode==self::ERROR_NONE;
	}
	
	public function getId() {
		return $this->user_id;
	}
}