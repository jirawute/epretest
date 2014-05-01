<?php
class WebStudent extends CWebUser
{
	private $_model;

	public $username;

	public function getStudentInfo() {
		$info = array();

		$student = $this->loadStudent(Yii::app()->user->id);

		if($student !== null) {
			if($student->user !== null) {
				$info = $student->user->attributes;
			}
		}

		return $info;
	}
	


	// Load student model.
	protected function loadStudent($id=null)
	{
		if($this->_model === null) {
			if($id !== null) {
				$this->_model = Student::model()->findByPk($id);
			}
		}

		return $this->_model;
	}
}
?>