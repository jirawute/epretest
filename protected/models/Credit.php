<?php

/**
 * This is the model class for table "esto_credit".
 *
 * The followings are the available columns in table 'esto_credit':
 * @property integer $credit_id
 * @property integer $credit_point
 * @property integer $credit_amount
 * @property string $credit_desc
 * @property integer $credit_order
 * @property integer $credit_status
 */
class Credit extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Credit the static model class
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
		return 'esto_credit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('credit_point, credit_amount, credit_desc', 'required'),
			array('credit_point, credit_amount, credit_order, credit_status', 'numerical', 'integerOnly'=>true),
			array('credit_desc', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('credit_id, credit_point, credit_amount, credit_desc, credit_order, credit_status', 'safe', 'on'=>'search'),
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
			'credit_id' => 'ID',
			'credit_point' => 'Credits',
			'credit_amount' => 'Prices',
			'credit_desc' => 'Description',
			'credit_order' => 'Sort Order',
			'credit_status' => 'Status',
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

		$criteria->compare('credit_id',$this->credit_id);
		$criteria->compare('credit_point',$this->credit_point);
		$criteria->compare('credit_amount',$this->credit_amount);
		$criteria->compare('credit_desc',$this->credit_desc,true);
		$criteria->compare('credit_order',$this->credit_order);
		$criteria->compare('credit_status',$this->credit_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}