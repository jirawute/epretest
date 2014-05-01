<?php

/**
 * This is the model class for table "esto_setting".
 *
 * The followings are the available columns in table 'esto_setting':
 * @property integer $setting_id
 * @property string $group
 * @property string $key
 * @property string $value
 * @property integer $serialized
 */
class Setting extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Setting the static model class
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
		return 'esto_setting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('setting_group, key, value, serialized', 'required'),
			array('serialized', 'numerical', 'integerOnly'=>true),
			array('setting_group', 'length', 'max'=>32),
			array('key', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('setting_id, setting_group, key, value, serialized', 'safe', 'on'=>'search'),
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
			'setting_id' => 'Setting',
			'group' => 'Group',
			'key' => 'Key',
			'value' => 'Value',
			'serialized' => 'Serialized',
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

		$criteria->compare('setting_id',$this->setting_id);
		$criteria->compare('group',$this->group,true);
		$criteria->compare('key',$this->key,true);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('serialized',$this->serialized);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}