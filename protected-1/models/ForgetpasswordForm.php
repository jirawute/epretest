<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ForgetpasswordForm extends CFormModel
{
	public $email;
	public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('email', 'required','message'=>'กรุณากรอก {attribute}'),
			// email has to be a valid email address
			array('email', 'email','message'=>'รูปแบบอีเมล์ไม่ถูกต้อง'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
                        'email'=>'อีเมล์ (ที่ใช้ลงทะเบียน)',
		);
	}
}