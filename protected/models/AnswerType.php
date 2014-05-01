<?php

/**
 * This is the model class for table "esto_answer_type".
 *
 * The followings are the available columns in table 'esto_answer_type':
 * @property integer $answer_type_id
 * @property string $answer_type_name
 * @property integer $answer_type_status
 */
class AnswerType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AnswerType the static model class
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
		return 'esto_answer_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('answer_type_name, answer_type_status', 'required'),
			array('answer_type_status', 'numerical', 'integerOnly'=>true),
			array('answer_type_name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('answer_type_id, answer_type_name, answer_type_status', 'safe', 'on'=>'search'),
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
			'answer_type_id' => 'Answer Type',
			'answer_type_name' => 'Answer Type Name',
			'answer_type_status' => 'Answer Type Status',
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

		$criteria->compare('answer_type_id',$this->answer_type_id);
		$criteria->compare('answer_type_name',$this->answer_type_name,true);
		$criteria->compare('answer_type_status',$this->answer_type_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}