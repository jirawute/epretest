<?php

/**
 * This is the model class for table "esto_order".
 *
 * The followings are the available columns in table 'esto_order':
 * @property integer $order_id
 * @property string $inv_id
 * @property integer $student_id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $payment_method
 * @property string $total
 * @property integer $order_status_id
 * @property string $date_added
 * @property string $date_modified
 * @property string $ip
 *
 * The followings are the available model relations:
 * @property OrderStatus $orderStatus
 * @property Student $student
 */
class Order extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Order the static model class
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
		return 'esto_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('student_id, inv_id, firstname, lastname, email, payment_method, order_status_id, total, ip', 'required'),
			array('student_id, order_status_id, credit', 'numerical', 'integerOnly'=>true),
			array('inv_id', 'length', 'max'=>9),
                        array('firstname, lastname', 'length', 'max'=>42),
			array('email', 'length', 'max'=>96),
			array('payment_method', 'length', 'max'=>128),
			array('total, ip', 'length', 'max'=>15),
			array('date_added, date_modified', 'safe'),
                        array('inv_id', 'unique'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('order_id, inv_id, student_id, firstname, lastname, email, payment_method, total, order_status_id, date_added, date_modified, ip', 'safe', 'on'=>'search'),
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
			'orderStatus' => array(self::BELONGS_TO, 'OrderStatus', 'order_status_id', 'joinType'=>'INNER JOIN'),
			'student' => array(self::BELONGS_TO, 'Student', 'student_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'order_id' => 'ลำดับที่',
                        'inv_id' => 'รหัสอ้างอิง',
			'student_id' => 'รหัสนักเรียน',
			'firstname' => 'ชื่อ',
			'lastname' => 'สกุล',
			'email' => 'อีเมล์',
			'payment_method' => 'วิธีการชำระเงิน',
			'total' => 'ยอดเงิน',
                        'credit' => 'คิดเป็นเครดิต',
			'order_status_id' => 'สถานะ',
			'date_added' => 'วันที่ทำรายการ',
			'date_modified' => 'ถูกแก้ไขเมื่อ',
			'ip' => 'Ip',
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

		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('student_id',$this->student_id);
                $criteria->compare('inv_id',$this->inv_id);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('payment_method',$this->payment_method,true);
		$criteria->compare('total',$this->total,true);
                $criteria->compare('credit',$this->credit);
		$criteria->compare('order_status_id',$this->order_status_id);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('ip',$this->ip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=> 20,)
		));
	}

        public function getLastestOrder($limit=1) {

                return $this->getOrder(0,$limit);
	}

        public function getOrder($offset=0, $limit=10) {
		$command = Yii::app()->db->createCommand();

		$result = $command->select('*')->from('esto_order')->order('inv_id desc')->limit($limit)->offset($offset)->queryAll();

		return $result;
	}
        public function getTotalOrder() {
		$command = Yii::app()->db->createCommand();

		$result = $command->select('COUNT(*) as total')->from('esto_order')->queryRow();

		return $result['total'];
	}
        public function getTotalCredit($student_id) {
		$command = Yii::app()->db->createCommand();

		$result = $command->select('SUM(credit) as total_credit')->from('esto_order')->where('student_id="'.$student_id.'"')->queryRow();

		return $result['total_credit'];
	}
        public function getTotalPaid($student_id) {
		$command = Yii::app()->db->createCommand();

		$result = $command->select('SUM(total) as total_paid')->from('esto_order')->where('student_id="'.$student_id.'"')->queryRow();

		return $result['total_paid'];
	}
        
        
        public function getOrderByStudentID($student_id) {
		$command = Yii::app()->db->createCommand();

		$result = $command->select('*')->from('esto_order')->where('student_id="'.$student_id.'"')->order('date_added desc')->queryAll();

		return $result;
	}
        public function getOrderByInvoice($inv_id) {
		$command = Yii::app()->db->createCommand();
		$result = $command->select('*')->from('esto_order')->where('inv_id="'.$inv_id.'"')->queryRow();
		return $result;
	}
}