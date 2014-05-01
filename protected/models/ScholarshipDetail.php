<?php

/**
 * This is the model class for table "esto_scholarship_detail".
 *
 * The followings are the available columns in table 'esto_scholarship_detail':
 * @property integer $scholar_id
 * @property string $name
 * @property string $desc
 * @property string $period_start
 * @property string $period_end
 * @property integer $price
 * @property integer $status
 */
class ScholarshipDetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ScholarshipDetail the static model class
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
		return 'esto_scholarship_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, price, announce_date, status', 'required'),
			array('price, status', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('desc, period_start, period_end, announce_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('scholar_id, name, desc, period_start, period_end, price, status', 'safe', 'on'=>'search'),
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
			'scholar_id' => 'รหัสทุน',
			'name' => 'ชื่อทุน',
			'desc' => 'รายละเอียด',
			'period_start' => 'วันที่เริ่มรับสมัคร',
			'period_end' => 'วันสุดท้ายที่รับสมัคร',
			'price' => 'ราคา',
                        'announce_date' => 'วันที่ประกาศผลผู้มีสิทธิ์สัมภาษณ์',
			'status' => 'สถานะ',
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

		$criteria->compare('scholar_id',$this->scholar_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('period_start',$this->period_start,true);
		$criteria->compare('period_end',$this->period_end,true);
		$criteria->compare('price',$this->price);
                $criteria->compare('announce_date',$this->announce_date,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=> 20,)
		));
	}
}