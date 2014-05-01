<?php

/**
 * This is the model class for table "esto_information".
 *
 * The followings are the available columns in table 'esto_information':
 * @property integer $information_id
 * @property integer $user_id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $date_added
 * @property integer $sort_order
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $user
 */
class Information extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Information the static model class
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
		return 'esto_information';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, title, description, status', 'required'),
			array('user_id, sort_order, status', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('date_added', 'safe'),
			array('image', 'file', 'types'=>'jpg, jpeg, gif, png', 'allowEmpty'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('information_id, user_id, title, description, image, date_added, sort_order, status', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'information_id' => 'Information',
			'user_id' => 'User',
			'title' => 'Title',
			'description' => 'Description',
			'image' => 'Image',
			'date_added' => 'Date Added',
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

		$criteria->compare('information_id',$this->information_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('sort_order',$this->sort_order);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getLatestInformations($limit=4) {
		return $this->getInformations(0,$limit);
	}
	
	public function getInformations($offset=0, $limit=10) {
		$command = Yii::app()->db->createCommand();
		
		$result = $command->select('*')->from('esto_information')->where('status=1')->order('date_added desc')->limit($limit)->offset($offset)->queryAll();
			
		return $result;
	}
	
	public function getTotalInformations() {
		$command = Yii::app()->db->createCommand();
		
		$result = $command->select('COUNT(*) as total')->from('esto_information')->where('status=1')->queryRow();
		
		return $result['total'];
	}
}