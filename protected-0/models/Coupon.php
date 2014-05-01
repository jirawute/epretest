<?php

/**
 * This is the model class for table "esto_coupon".
 *
 * The followings are the available columns in table 'esto_coupon':
 * @property integer $coupon_id
 * @property string $number
 * @property integer $credit
 * @property integer $status
 * @property integer $student_id
 */
class Coupon extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Coupon the static model class
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
		return 'esto_coupon';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('number, credit, status', 'required'),
			array('credit, status, student_id', 'numerical', 'integerOnly'=>true),
			array('number', 'length', 'max'=>6),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('coupon_id, number, credit, status, student_id', 'safe', 'on'=>'search'),
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
			'coupon_id' => 'Coupon',
			'number' => 'Number',
			'credit' => 'Credit',
			'status' => 'Status',
			'student_id' => 'Student',
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

		$criteria->compare('coupon_id',$this->coupon_id);
		$criteria->compare('number',$this->number,true);
		$criteria->compare('credit',$this->credit);
		$criteria->compare('status',$this->status);
		$criteria->compare('student_id',$this->student_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}