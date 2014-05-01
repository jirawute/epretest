<?php

/**
 * This is the model class for table "esto_banner".
 *
 * The followings are the available columns in table 'esto_banner':
 * @property integer $banner_id
 * @property string $group
 * @property string $title
 * @property string $description
 * @property string $link
 * @property string $image
 * @property integer $sort_order
 * @property integer $status
 */
class Banner extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Banner the static model class
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
		return 'esto_banner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('group, title, description, status', 'required'),
			array('sort_order, status', 'numerical', 'integerOnly'=>true),
			array('group', 'length', 'max'=>64),
			array('title', 'length', 'max'=>128),
			array('link', 'length', 'max'=>255),
			array('image', 'file', 'types'=>'jpg, jpeg, gif, png', 'allowEmpty'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('banner_id, group, title, description, link, image, sort_order, status', 'safe', 'on'=>'search'),
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
			'banner_id' => 'Banner',
			'group' => 'Position',
			'title' => 'Title',
			'description' => 'Description',
			'link' => 'Link',
			'image' => 'Image',
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

		$criteria->compare('banner_id',$this->banner_id);
		$criteria->compare('group',$this->group,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('sort_order',$this->sort_order);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=> 20,)
		));
	}
}