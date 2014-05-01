<?php

/**
 * This is the model class for table "esto_transfer".
 *
 * The followings are the available columns in table 'esto_transfer':
 * @property integer $id
 * @property string $inv_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property integer $amount
 * @property string $bank
 * @property string $date
 * @property string $detail
 * @property string $images
 * @property string $status
 * @property string $send_email
 */
class Transfer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Transfer the static model class
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
		return 'esto_transfer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('inv_id, name, email, phone, bank, amount, date, images', 'required', 'message'=>'กรุณาใส่ข้อมูลให้ครบถ้วน'),
			array('amount', 'numerical', 'integerOnly'=>true),
			array('inv_id', 'length', 'max'=>9),
			array('name, email, date', 'length', 'max'=>255),
                        array('images', 'file', 'types'=>'jpg, jpeg, gif, png', 'allowEmpty'=>true),
			array('phone', 'length', 'max'=>20),
			array('bank', 'length', 'max'=>50),
			array('status, send_email', 'length', 'max'=>1),
			array('detail', 'safe'),
                        array('email', 'email'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, inv_id, name, email, phone, amount, bank, date, detail, images, status, send_email', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'inv_id' => 'เลขที่สั่งซื้อ',
			'name' => 'ชื่อผู้โอน',
			'email' => 'E-mail',
			'phone' => 'เบอร์โทรศัพท์',
			'amount' => 'จำนวนเงินที่โอน',
			'bank' => 'โอนเข้าบัญชีธนาคาร',
			'date' => 'วันที่โอน',
			'detail' => 'รายละเอียดการสั่งซื้อ',
			'images' => 'อัพโหลดหลักฐานการโอนเงิน',
			'status' => 'สถานะ',
			'send_email' => 'ส่ง Email',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('inv_id',$this->inv_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('bank',$this->bank,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('detail',$this->detail,true);
		$criteria->compare('images',$this->images,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('send_email',$this->send_email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}