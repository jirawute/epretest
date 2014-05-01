<?php

/**
 * This is the model class for table "esto_student".
 *
 * The followings are the available columns in table 'esto_student':
 * @property integer $student_id
 * @property string $id_number
 * @property string $firstname
 * @property string $lastname
 * @property string $school
 * @property integer $level_id
 * @property string $email
 * @property string $address
 * @property string $birthday
 * @property string $subject
 * @property string $faculty
 * @property string $phone
 * @property string $image
 * @property integer $credit
 * @property string $username
 * @property string $password
 *
 * The followings are the available model relations:
 * @property Order[] $orders
 * @property Level $level
 * @property TestRecord[] $testRecords
 */
class Student extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Student the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'esto_student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('firstname,email, username,password', 'required','message'=>'กรุณากรอก {attribute}'),	// lastname, address, school, level_id, 
			array('id_number', 'length', 'max'=>13),
                        array('credit,status', 'numerical', 'integerOnly'=>true),
			array('firstname, lastname', 'length', 'max'=>42),
                        array('sid', 'length', 'max'=>32),
			array('address, subject, faculty, school, email_friends', 'length', 'max'=>255),
			array('email', 'length', 'max'=>96),
                        array('email', 'email','message'=>'รูปแบบอีเมล์ไม่ถูกต้อง'),
			array('phone', 'length', 'max'=>15),
                        array('username', 'length', 'max'=>255),
                        array('password', 'length', 'max'=>20),
                        array('id_number,username,email', 'unique','message'=>'{attribute} นี้มีผู้ใช้งานแล้ว'),
                        array('birthday','safe'),
                        array('image', 'file', 'types'=>'jpg, jpeg, gif, png', 'allowEmpty'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('student_id, id_number, firstname, lastname, school, level_id, email, phone, image, credit,status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'orders' => array(self::HAS_MANY, 'Order', 'student_id'),
			'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
			'testRecords' => array(self::HAS_MANY, 'TestRecord', 'student_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'student_id' => 'ID',
			'id_number' => 'รหัสประจำตัวประชาชน',
			'firstname' => 'ชื่อ',
			'lastname' => 'นามสกุล',
			'school' => 'โรงเรียน',
                        'birthday' => 'วันเกิด',
			'level_id' => 'ระดับชั้น',
			'email' => 'อีเมล์',
                        'address' => 'ที่อยู่',
			'phone' => 'โทรศัพท์',
			'image' => 'รูปประจำตัว',
			'credit' => 'เครดิต',
                        'subject' => 'วิชาที่สนใจ',
                        'faculty' => 'คณะที่สนใจ',
                        'username' => 'ชื่อผู้ใช้',
                        'password' => 'รหัสผ่าน',
                        'status' => 'สถานะ',
                        'email_friends' => 'อีเมล์เพื่อน',
                        'sid' => 'Verify Code',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('id_number',$this->id_number,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('school',$this->school,true);
		$criteria->compare('level_id',$this->level_id);
		$criteria->compare('email',$this->email,true);
                $criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('image',$this->image,true);
                $criteria->compare('credit',$this->credit);
                $criteria->compare('subject',$this->subject,true);
                $criteria->compare('faculty',$this->faculty,true);
                $criteria->compare('username',$this->username,true);
                $criteria->compare('status',$this->status);
                $criteria->compare('email_friends',$this->email_friends,true);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=> 20,)
		));
	}
        public function getStudentById($id) {
		$command = Yii::app()->db->createCommand();
		$result = $command->select('*')->from('esto_student')->where('student_id='.$id)->queryAll();
		return $result;
	}

        public function getCreditStudentById($id) {
		$command = Yii::app()->db->createCommand();
		$result = $command->select('credit')->from('esto_student')->where('student_id='.$id)->queryRow();
		return $result['credit'];
	}
        
        public function updateNewCredit($credit,$student_id) {
            
               $command = Yii::app()->db->createCommand();
               $result = $command->update('esto_student', array(
                                                'credit'=>$credit,
                                            ), 'student_id=:student_id', array(':student_id'=>$student_id));

	       if($result>0){
                   $row = 'Y';

               }else{
                   $row = 'N';
               }
               return $row;
	}


}