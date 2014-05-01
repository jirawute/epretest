<?php

/**
 * This is the model class for table "esto_type".
 *
 * The followings are the available columns in table 'esto_type':
 * @property integer $type_id
 * @property string $name
 * @property integer $sort_order
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Exam[] $exams
 */
class Type extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Type the static model class
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
		return 'esto_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, exam_type, level_id, status', 'required'),
			array('sort_order, level_id, status', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('type_id, name, exam_type, level_id, sort_order, status', 'safe', 'on'=>'search'),
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
			'exams' => array(self::HAS_MANY, 'Exam', 'type_id'),
                        'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'type_id' => 'ID',
			'name' => 'Name',
                        'exam_type' => 'Exam Type',
                        'level_id' => 'Level',
			'sort_order' => 'Sort Order',
			'status' => 'Status',
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

		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('name',$this->name,true);
                $criteria->compare('exam_type',$this->exam_type,true);
                $criteria->compare('level_id',$this->level_id);
		$criteria->compare('sort_order',$this->sort_order);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                         'pagination'=>array('pageSize'=> 20,)
                ));
	}
}