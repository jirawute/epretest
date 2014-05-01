<?php

/**
 * This is the model class for table "esto_testing".
 *
 * The followings are the available columns in table 'esto_testing':
 * @property integer $test_record_id
 * @property integer $answer_id
 * @property string $selected
 *
 * The followings are the available model relations:
 * @property Answer $answer
 */
class Testing extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Testing the static model class
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
		return 'esto_testing';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('test_record_id, test_number, answer_id, selected', 'required'),
			array('test_record_id, test_number, answer_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('test_record_id, test_number, answer_id, selected', 'safe', 'on'=>'search'),
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
			'answer' => array(self::BELONGS_TO, 'Answer', 'answer_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'test_record_id' => 'Test Record',
                        'test_number' => 'Number',
			'answer_id' => 'Answer',
			'selected' => 'Selected',
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
                $criteria->compare('test_number',$this->test_number);
		$criteria->compare('answer_id',$this->answer_id);
		$criteria->compare('selected',$this->selected,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        public function getTotalTestingRecord($test_record_id,$test_number){
            $command = Yii::app()->db->createCommand();
            $result = $command->select('COUNT(*) as total')->from('esto_testing')->where('test_record_id=:test_record_id AND test_number=:test_number', array(':test_record_id'=>$test_record_id,':test_number'=>$test_number))->queryRow();
            return $result['total'];
        }
        public function getSelectedByRecord($test_record_id,$i){
            $command = Yii::app()->db->createCommand();
            $result = $command->select('*')->from('esto_testing')->where('test_record_id=:id AND test_number=:num', array(':id'=>$test_record_id,':num'=>$i))->queryRow();
            return $result['selected'];
        }

        public function getAllTestingRecord($test_record_id,$test_number){
            $command = Yii::app()->db->createCommand();
            $result = $command->select('test.*,ans.answer')
                              ->from('esto_testing test')
                              ->leftjoin('esto_answer ans', 'ans.answer_id=test.answer_id')
                              ->where('test_record_id=:test_record_id AND test_number=:test_number', array(':test_record_id'=>$test_record_id,':test_number'=>$test_number))
                              ->queryRow();
            return $result;
        }

       public function summaryTestingScore($test_record_id){
           $command = Yii::app()->db->createCommand();
           $result = $command->select('SUM(test_score) as sum_score')->from('esto_testing')->where('test_record_id=:test_record_id', array(':test_record_id'=>$test_record_id))->queryRow();
           return $result['sum_score'];

       }
       
       public function countTestingSelected($test_record_id){
           //$command = Yii::app()->db->createCommand();
           //$result = $command->select('COUNT(*) as total')->from('esto_testing')->where('test_record_id=:test_record_id AND selected=:notnull', array(':test_record_id'=>$test_record_id))->queryRow();
           //return $result['total'];
           $sql = "SELECT * FROM esto_testing WHERE test_record_id='$test_record_id' AND selected<>NULL ";
           $num_rows = mysql_num_rows($sql);//Yii::app()->db->createCommand($sql)->rowCount();
           return $num_rows;
       }//mysql_num_rows($query);
       
       
        public function getCountTestingRecordByID($test_record_id){
            $command = Yii::app()->db->createCommand();
            //$result = $command->select('COUNT(*) as num_row')->from('esto_testing')->where('test_record_id=:test_record_id AND selected=:selected', array(':test_record_id'=>$test_record_id,':selected'=>NULL))->queryRow();
            $result = $command->select('COUNT(*) as num_row')->from('esto_testing')->where('test_record_id=:test_record_id', array(':test_record_id'=>$test_record_id))->queryRow();
            return $result['num_row'];
        }
        
//       public function getCountByUserID($uid)
//        {
//            $count = $this->count(array(
//                'condition'=>'user_id = :uid',
//                'params'=>array(
//                    ':uid'=>$uid,
//                ),
//            ));
//            return $count;
//        }
}