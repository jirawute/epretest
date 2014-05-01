<?php

/**
 * This is the model class for table "esto_session".
 *
 * The followings are the available columns in table 'esto_session':
 * @property integer $session_id
 * @property integer $exam_id
 * @property string $session_name
 * @property integer $answer_type_id
 * @property integer $session_order
 * @property integer $session_total
 * @property integer $session_start
 * @property integer $session_end
 * @property string $session_score_total
 * @property integer $session_status
 *
 * The followings are the available model relations:
 * @property EstoAnswer[] $estoAnswers
 * @property EstoExam $exam
 */
class Session extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Session the static model class
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
		return 'esto_session';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('exam_id, session_name, answer_type_id, session_order, session_total, session_start, session_end, session_score_total, session_status', 'required'),
			array('exam_id, answer_type_id, session_order, session_total, session_start, session_end, session_status', 'numerical', 'integerOnly'=>true),
			array('session_order', 'length', 'max'=>2),
                        array('session_name', 'length', 'max'=>255),
			array('session_score_total', 'length', 'max'=>7),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('session_id, exam_id, session_name, answer_type_id, session_order, session_total, session_start, session_end, session_score_total, session_status', 'safe', 'on'=>'search'),
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
			'estoAnswers' => array(self::HAS_MANY, 'EstoAnswer', 'session_id'),
			'exam' => array(self::BELONGS_TO, 'Exam', 'exam_id'),
                        'answer_type' => array(self::BELONGS_TO, 'AnswerType', 'answer_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'session_id' => 'Session ID',
			'exam_id' => 'ชุดข้อสอบ',
			'session_name' => 'คำชี้แจง/คำสั่ง',
			'answer_type_id' => 'ประเภท',
			'session_order' => 'ตอนที่',
			'session_total' => 'จำนวน',
			'session_start' => 'เริ่มข้อที่',
			'session_end' => 'ถึงข้อที่',
			'session_score_total' => 'คะแนนรวม',
			'session_status' => 'สถานะ',
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

		$criteria->compare('session_id',$this->session_id);
		$criteria->compare('exam_id',$this->exam_id);
		$criteria->compare('session_name',$this->session_name,true);
		$criteria->compare('answer_type_id',$this->answer_type_id);
		$criteria->compare('session_order',$this->session_order);
		$criteria->compare('session_total',$this->session_total);
		$criteria->compare('session_start',$this->session_start);
		$criteria->compare('session_end',$this->session_end);
		$criteria->compare('session_score_total',$this->session_score_total,true);
		$criteria->compare('session_status',$this->session_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=> 20,)
		));
	}

        public function getSessionByExamId($id)
        {
            $command = Yii::app()->db->createCommand();
           // $row = array();
            $result = $command->select('*')
                                  ->from('esto_session s')
                                  ->where('exam_id=:exam_id', array(':exam_id'=>$id))
                                  ->order('session_order')
                                  //->limit($limit)->offset($offset)
                                  ->queryAll();          

            return $result;
        }

        public function getSessionDeatailById($session_id)
        {
            $command = Yii::app()->db->createCommand();
            $result = $command->select('*')
                                  ->from('esto_session s')
                                  ->where('session_id=:session_id', array(':session_id'=>$session_id))
                                  ->queryRow();

            return $result;
        }
}