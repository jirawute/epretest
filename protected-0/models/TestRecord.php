<?php

/**
 * This is the model class for table "esto_test_record".
 *
 * The followings are the available columns in table 'esto_test_record':
 * @property integer $test_record_id
 * @property integer $exam_id
 * @property integer $student_id
 * @property string $score
 * @property string $date_attended
 * @property integer $elapse_time
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Student $student
 * @property Exam $exam
 */
class TestRecord extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TestRecord the static model class
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
		return 'esto_test_record';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('exam_id, student_id, elapse_time, status', 'required'),
			array('exam_id, student_id, elapse_time, status', 'numerical', 'integerOnly'=>true),
			array('score', 'length', 'max'=>7),
			array('date_attended', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('test_record_id, exam_id, student_id, score, date_attended, elapse_time, status', 'safe', 'on'=>'search'),
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
			'student' => array(self::BELONGS_TO, 'Student', 'student_id'),
			'exam' => array(self::BELONGS_TO, 'Exam', 'exam_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'test_record_id' => 'Test Record ID',
			'exam_id' => 'Exam ID',
			'student_id' => 'Student ID',
			'score' => 'คะแนนที่ได้',
			'date_attended' => 'วันที่เริ่มทำข้อสอบ',
			'elapse_time' => 'เวลาที่เหลือ',
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

		$criteria->compare('test_record_id',$this->test_record_id);
		$criteria->compare('exam_id',$this->exam_id);
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('score',$this->score,true);
		$criteria->compare('date_attended',$this->date_attended,true);
		$criteria->compare('elapse_time',$this->elapse_time);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=> 20,)
		));
	}

        public function getTestRecordByStudentIdExamId($student_id,$exam_id){
            $command = Yii::app()->db->createCommand();
            $result = $command->select('COUNT(*) as total')->from('esto_test_record')->where('student_id=:student_id AND exam_id=:exam_id', array(':student_id'=>$student_id,':exam_id'=>$exam_id))->queryRow();
            return $result['total'];
        }

        public function getIdByStudentIdExamId($student_id,$exam_id){
            $command = Yii::app()->db->createCommand();
            $result = $command->select('test_record_id')->from('esto_test_record')->where('student_id=:student_id AND exam_id=:exam_id', array(':student_id'=>$student_id,':exam_id'=>$exam_id))->queryRow();
            return $result['test_record_id'];
        }

        public function getTestRecordDetailByStudentIdExamId($student_id,$exam_id){
            $command = Yii::app()->db->createCommand();
            $result = $command->select('*')->from('esto_test_record')->where('student_id=:student_id AND exam_id=:exam_id', array(':student_id'=>$student_id,':exam_id'=>$exam_id))->queryRow();
            return $result;
        }

        public function getTestRecordDetailByExamId($exam_id){
            $command = Yii::app()->db->createCommand();
            $result = $command->select('AVG(score) as score_avg, MAX(score) as score_max, count(score) as student_total,student_id')
                              ->from('esto_test_record')
                              ->where('exam_id=:exam_id AND status=:status', array(':exam_id'=>$exam_id,':status'=>2))
                              ->group('exam_id')
                              ->order('score desc')
                              ->queryRow();
            return $result;
        }

        public function getAllTestRecordByExamId($exam_id){
            $command = Yii::app()->db->createCommand();
            $result = $command->select('*')
                              ->from('esto_test_record')
                              ->where('exam_id=:exam_id AND status=:status', array(':exam_id'=>$exam_id,':status'=>2))
                              ->order('score desc')
                              ->queryAll();
            return $result;
        }

        public function loadTestRecord($id)
	{
                $model=TestRecord::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        public function getTopStudentByLevel($level_id){
                $command = Yii::app()->db->createCommand();
                $result = $command->select('std.*,SUM(test.score) as total')
                                  ->from('esto_test_record test')
                                  ->leftjoin('esto_exam ex', 'ex.exam_id=test.exam_id')
                                  ->leftjoin('esto_student std', 'std.student_id=test.student_id')
                                  ->where('std.level_id=:level_id AND test.status=:status', array(':level_id'=>$level_id,':status'=>2))
                                  ->group('test.student_id')
                                  ->order('total desc')
                                 // ->offset(0)
                                 // ->limit(1)
                                  ->queryRow();
              return $result;
        }
        public function getTotalTestRecordByExamId($exam_id){
                $command = Yii::app()->db->createCommand();
                $result = $command->select('std.*,test.*')
                                  ->from('esto_test_record test')
                                  ->leftjoin('esto_exam ex', 'ex.exam_id=test.exam_id')
                                  ->leftjoin('esto_student std', 'std.student_id=test.student_id')
                                  ->where('test.exam_id=:exam_id AND test.status=:status', array(':exam_id'=>$exam_id,':status'=>2))
                                  //->group('test.student_id')
                                  ->order('test.score desc')
                                  ->queryAll();
               return $result;
        }

        public function getTestRecordByStudentID($student_id){
                $command = Yii::app()->db->createCommand();
                $result = $command->select('type.name as type_name, sub.name as sub_name,ex.*,test.*')
                                  ->from('esto_test_record test')
                                  ->leftjoin('esto_exam ex', 'ex.exam_id=test.exam_id')
                                  ->leftjoin('esto_student std', 'std.student_id=test.student_id')
                                  ->leftjoin('esto_subject sub', 'sub.subject_id=ex.subject_id')
                                  ->leftjoin('esto_type type', 'type.type_id=ex.type_id')
                                  ->where('test.student_id=:student_id AND test.status=:status', array(':student_id'=>$student_id,':status'=>2))
                                  ->order('date_attended desc')
                                  ->queryAll();
              return $result;
        }

       public function getLastTestRecordByStudentID($student_id){
                $command = Yii::app()->db->createCommand();
                $result = $command->select('type.name as type_name, sub.name as sub_name,ex.*,test.*')
                                  ->from('esto_test_record test')
                                  ->leftjoin('esto_exam ex', 'ex.exam_id=test.exam_id')
                                  ->leftjoin('esto_student std', 'std.student_id=test.student_id')
                                  ->leftjoin('esto_subject sub', 'sub.subject_id=ex.subject_id')
                                  ->leftjoin('esto_type type', 'type.type_id=ex.type_id')
                                  ->where('test.student_id=:student_id AND test.status=:status', array(':student_id'=>$student_id,':status'=>2))
                                  ->order('date_attended desc')
                                  ->offset(0)
                                  ->limit(3)
                                  ->queryAll();
              return $result;
        }

        public function saveFirstLogTestRecord($exam_id,$student_id){
             $command = Yii::app()->db->createCommand();
             $result = $command->insert('esto_test_record', array(
                                            'exam_id'=>$exam_id,
                                            'student_id'=>$student_id,
                                            'score'=>0,
                                            'date_attended'=>date('Y-m-d H:i:s'),
                                            'elapse_time'=>0,
                                            'status'=>3,
                                            //status 3= ซื้อแล้วยังไม่ได้ทำ
                                        ));
             return $result;
        }
}