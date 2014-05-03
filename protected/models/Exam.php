<?php

/**
 * This is the model class for table "esto_exam".
 *
 * The followings are the available columns in table 'esto_exam':
 * @property integer $exam_id
 * @property integer $type_id
 * @property integer $subject_id
 * @property integer $level_id
 * @property string $name
 * @property string $quiz_intro
 * @property integer $credit_required
 * @property integer $time_limited
 * @property string $exam_file
 * @property string $answer_file
 * @property string $score_total
 * @property string $score_avg
 * @property string $score_max
 * @property string $date_added
 * @property integer $sort_order
 * @property integer $status
 * @property integer $voice_file
 *
 * The followings are the available model relations:
 * @property Type $type
 * @property Subject $subject
 * @property Level $level
 * @property Session[] $sessions
 * @property TestRecord[] $testRecords
 */
class Exam extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Exam the static model class
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
		return 'esto_exam';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('credit_required, score_total,type_id, subject_id, level_id, name, quiz_intro, status', 'required'),
			array('type_id, subject_id, level_id, credit_required, time_limited, sort_order, status', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('score_total, score_avg, score_max', 'length', 'max'=>7),
			array('date_added', 'safe'),
			array('exam_file,answer_file', 'file', 'types'=>'pdf', 'maxSize'=>1024 * 1024 * 10, 'tooLarge'=>'File has to be smaller than 10MB','allowEmpty'=>true) ,
			array('voice_file', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('exam_id, type_id, subject_id, level_id, name, quiz_intro, credit_required, time_limited, exam_file, answer_file, score_total, score_avg, score_max, date_added, sort_order, status, voice_file', 'safe', 'on'=>'search'),
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
			'subject' => array(self::BELONGS_TO, 'Subject', 'subject_id'),
			'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
			'sessions' => array(self::HAS_MANY, 'Session', 'exam_id'),
			'testRecords' => array(self::HAS_MANY, 'TestRecord', 'exam_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'exam_id' => 'Exam ID',
			'type_id' => 'Type',
			'subject_id' => 'Subject',
			'level_id' => 'Level',
			'name' => 'Name',
			'quiz_intro' => 'Quiz Intro',
			'credit_required' => 'Credit Required',
			'time_limited' => 'Time Limited',
			'exam_file' => 'Exam File',
			'score_total' => 'Score Total',
			'score_avg' => 'Score Avg',
			'score_max' => 'Score Max',
			'date_added' => 'Date Added',
			'sort_order' => 'Sort Order',
			'status' => 'Status',
                        'voice_file' => 'Listening Exam',
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

		$criteria->compare('exam_id',$this->exam_id);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('subject_id',$this->subject_id);
		$criteria->compare('level_id',$this->level_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('quiz_intro',$this->quiz_intro,true);
		$criteria->compare('credit_required',$this->credit_required);
		$criteria->compare('time_limited',$this->time_limited);
		$criteria->compare('exam_file',$this->exam_file,true);
		$criteria->compare('score_total',$this->score_total,true);
		$criteria->compare('score_avg',$this->score_avg,true);
		$criteria->compare('score_max',$this->score_max,true);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('sort_order',$this->sort_order);
		$criteria->compare('status',$this->status);
                $criteria->compare('voice_file',$this->voice_file);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=> 20,)
                        )
		);
	}

        public function getTotalExamBySubjectId($id) {
		$command = Yii::app()->db->createCommand();
		$result = $command->select('COUNT(*) as total')->from('esto_exam')->where('status>=:status AND subject_id=:subject_id', array(':status'=>1,':subject_id'=>$id))->queryRow();
		return $result['total'];
	}

        public function getExamBySubjectId($subject_id) {
		$command = Yii::app()->db->createCommand();
                
		$result = $command->select('*')->from('esto_exam')->where('status>=:status AND subject_id = :subject_id', array(':status'=>1,':subject_id'=>$subject_id))->order('sort_order')->queryAll();
		
                return $result;
	}

        public function getExamDetailById($id){
                $command = Yii::app()->db->createCommand();
                $result = $command->select('ex.*, s.name as subject_name, t.exam_type')
                                  ->from('esto_exam ex')
                                  ->leftjoin('esto_subject s', 's.subject_id=ex.subject_id')
                                  ->leftjoin('esto_type t', 't.type_id=ex.type_id')
                                  ->where('exam_id=:exam_id', array(':exam_id'=>$id))
                                  ->queryRow();
              return $result;
        }
}