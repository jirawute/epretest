<?php

/**
 * This is the model class for table "esto_subject".
 *
 * The followings are the available columns in table 'esto_subject':
 * @property integer $subject_id
 * @property string $name
 * @property integer $type_id
 * @property integer $level_id
 * @property integer $sort_order
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Exam[] $exams
 */
class Subject extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Subject the static model class
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
		return 'esto_subject';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, status, type_id, level_id', 'required'),
			array('sort_order, status, type_id, level_id, show_new', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('subject_id, name, sort_order, status, type_id, level_id', 'safe', 'on'=>'search'),
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
                        'type' => array(self::BELONGS_TO, 'Type', 'type_id'),
                        'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
			'exams' => array(self::HAS_MANY, 'Exam', 'subject_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'subject_id' => 'Subject',
			'name' => 'Name',
                        'type_id' => 'Type',
                        'level_id' => 'Level',
			'sort_order' => 'Sort Order',
                        'show_new' => 'Show Icon',
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

		$criteria->compare('subject_id',$this->subject_id);
		$criteria->compare('name',$this->name,true);
                $criteria->compare('type_id',$this->type_id);
	        $criteria->compare('level_id',$this->level_id);
		$criteria->compare('sort_order',$this->sort_order);
                $criteria->compare('show_new',$this->show_new);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=> 20,)
                        )
               );
	}
}