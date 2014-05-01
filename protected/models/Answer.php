<?php

/**
 * This is the model class for table "esto_answer".
 *
 * The followings are the available columns in table 'esto_answer':
 * @property integer $answer_id
 * @property integer $session_id
 * @property string $answer
 * @property string $score_item
 *
 * The followings are the available model relations:
 * @property Session $session
 * @property Testing[] $testings
 */
class Answer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Answer the static model class
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
		return 'esto_answer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('session_id, answer_number, answer, score_item', 'required'),
			array('session_id, answer_number', 'numerical', 'integerOnly'=>true),
			array('score_item', 'length', 'max'=>7),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('answer_id, session_id, answer_number, answer, score_item', 'safe', 'on'=>'search'),
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
			'session' => array(self::BELONGS_TO, 'Session', 'session_id'),
			'testings' => array(self::HAS_MANY, 'Testing', 'answer_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'answer_id' => 'Answer ID',
                        'answer_number' => 'ข้อที่',
			'session_id' => 'Session ID',
			'answer' => 'คำเฉลย',
			'score_item' => 'คะแนน/ข้อ',
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

		$criteria->compare('answer_id',$this->answer_id);
                $criteria->compare('answer_number',$this->answer_number);
		$criteria->compare('session_id',$this->session_id);
		$criteria->compare('answer',$this->answer,true);
		$criteria->compare('score_item',$this->score_item,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=> 20,)
		));
	}

        public function getAnswerDetail($session_id,$number){
            	$command = Yii::app()->db->createCommand();
		$result = $command->select('*')->from('esto_answer')->where('answer_number=:answer_number AND session_id=:session_id',array(':answer_number'=>$number,':session_id'=>$session_id))->queryRow();
                return $result;

       }
       public function getAnswerBySession($session_id,$number){
            	$command = Yii::app()->db->createCommand();
		$result = $command->select('*')->from('esto_answer')->where('answer_number=:answer_number AND session_id=:session_id',array(':answer_number'=>$number,':session_id'=>$session_id))->queryRow();
                return $result['answer'];

       }
}