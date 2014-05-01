<?php

/**
 * This is the model class for table "esto_school".
 *
 * The followings are the available columns in table 'esto_school':
 * @property integer $school_id
 * @property string $name
 * @property string $short_name
 * @property string $district
 * @property integer $edu_region
 * @property string $region
 * @property string $level
 * @property integer $num_student
 */
class School extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return School the static model class
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
		return 'esto_school';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, short_name, level', 'required'),
			array('edu_region, num_student', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('short_name, district, region, level', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('school_id, name, short_name, district, edu_region, region, level, num_student', 'safe', 'on'=>'search'),
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
			'school_id' => 'School',
			'name' => 'Name',
			'short_name' => 'Short Name',
			'district' => 'District',
			'edu_region' => 'Edu Region',
			'region' => 'Region',
			'level' => 'Level',
			'num_student' => 'Num Student',
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

		$criteria->compare('school_id',$this->school_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('short_name',$this->short_name,true);
		$criteria->compare('district',$this->district,true);
		$criteria->compare('edu_region',$this->edu_region);
		$criteria->compare('region',$this->region,true);
		$criteria->compare('level',$this->level,true);
		$criteria->compare('num_student',$this->num_student);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}