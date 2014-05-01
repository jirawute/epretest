<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class StudentIdentity extends CUserIdentity
{
	private $student_id;

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
		$user = Student::model()->find('(username = ? OR email =?) AND password = ? AND status=1', array($this->username,$this->username, $this->password));

		if($user === null) {
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		} else {
			$this->student_id = $user->student_id;
			$this->username = $user->username;

			$auth=Yii::app()->authManager;

			Yii::app()->authManager->save();
				

			$this->errorCode=self::ERROR_NONE;
		}

		return $this->errorCode==self::ERROR_NONE;
	}

	public function getId() {
		return $this->student_id;
	}
}