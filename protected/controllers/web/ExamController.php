<?php

class ExamController extends Controller {

    public $layout;
    public $mp3data;

    public function actionIndex() {
        $this->layout = '//layouts/exam';
        //check Login
        if (Yii::app()->user->id) {
            list($other1, $exam_id, $other2) = explode('$', $_GET['id']);

            $exam = new Exam;
            $exam_info = $exam->getExamDetailById($exam_id);

            $session = new Session;
            $session_list = $session->getSessionByExamId($exam_id);
            // print_r($session_list);exit();
            $session_detail = $session->getSessionByExamId1($exam_id);

            $this->render('index', array(
                'exam_info' => $exam_info,
                'session_list' => $session_list,
            ));
        } else if ($_GET['id'] == '$30') {
            // for testing only
            $exam_id = 30; // Can change
            $exam = new Exam;
            $exam_info = $exam->getExamDetailById($exam_id);
            $session = new Session;
            $session_list = $session->getSessionByExamId($exam_id);
            $this->render('index', array(
                'exam_info' => $exam_info,
                'session_list' => $session_list,
            ));
        } else {
            $this->redirect(Yii::app()->createUrl('site/login'));
        }
    }

    public function actionAjaxButton() {
        $this->render('ajaxbutton');
    }

    public function actionSelect() {
        $student_id = Yii::app()->user->id;
        $subject_id = $_GET['subject_id'];

        $exam = new Exam;
        $exam_info = $exam->getExamBySubjectId($subject_id);


        $text = '<table cellpadding="0" cellspacing="0" border="0" class="display" id="table_list_subject">
                        <thead>
                                <tr>
                                        <th width="48">สถานะ</th>
                                        <th width="80">วันที่สร้าง</th>
                                        <th>ชื่อชุดข้อสอบ</th>
                                        <th width="55">เครดิต</th>
                                </tr>
                        </thead>';
        $text .= '<tbody>';
        foreach ($exam_info as $Exam) {

            $testRecord = new TestRecord;
            $test = $testRecord->getTestRecordDetailByStudentIdExamId($student_id, $Exam['exam_id']);

            $status_test = $test['status'];
            $exam_id = $Exam['exam_id'];
            switch ($status_test) {
                case 1: $td = '<td class="mark_resume" title="กำลังทำ"><span>¨</span></td>';
                    break;
                case 2: $td = '<td class="mark_true" title="ทำแล้ว"><span>»</span></td>';
                    $go_to .="/answer";
                    break;
                default:$td = '<td class="mark_non" title="ยังไม่ได้ทำ"><span>«</span></td>';
                    break;
            }

            $text .= '<tr onClick="CheckandGo(\'' . $status_test . '\',\'' . $exam_id . '\')"> ';
            $text .= $td . '
                        <td class="date_added">' . date('d/m/Y', strtotime($Exam['date_added'])) . '</td>
                        <td class="subject">' . $Exam['name'] . '</td>
                        <td class="number">' . $Exam['credit_required'] . '</td>
                        </tr>';
        }
        $text .= '</tbody></table>';
        echo $text;
    }

    public function actionSave() {
        if (isset($_POST['ExamForm'])) {
            $exam_id = $_POST['ExamForm']['exam_id'];

            $this->saveExamForm();

            $this->redirect(Yii::app()->createUrl('exam/index', array('id' => "#02B13$" . $exam_id)));
        }
    }

    // actionSubmit not edit
    public function actionSubmit() {
        //print_r($_POST['ExamForm']);exit();
        $this->layout = '//layouts/answer';
        if (isset($_POST['ExamForm'])) {
            $exam_id = $_POST['ExamForm']['exam_id'];
            $test_record_id = $this->saveExamForm();
        } else {
            $this->redirect(Yii::app()->createUrl('student/view'));
        }
        $model = $this->loadTestRecord($test_record_id);

        $session = new Session;
        $session_group = $session->getSessionByExamId($exam_id);
        $testing = new Testing;
        $total_score = $testing->summaryTestingScore($test_record_id);
        $_POST['ExamForm']['score'] = $total_score;
        $_POST['ExamForm']['status'] = 2;
        $model->attributes = $_POST['ExamForm'];
        if ($model->save()) {
            $exam = new Exam;
            $exam_info = $exam->getExamDetailById($exam_id);
            $this->render('result', array('exam_info' => $exam_info, 'session_list' => $session_group, 'test_record_id' => $test_record_id));
        } else {
            print_r($exam_info);
            var_dump($model->getErrors());
            exit();
        }
    }

    public function actionTimeout() {
        $student_id = Yii::app()->user->id;
        $exam_id = $_GET['id'];
        $test_record_id = TestRecord::model()->getIdByStudentIdExamId($student_id, $exam_id);
        $model = $this->loadTestRecord($test_record_id);
        $model->status = 2;
        if ($model->save()) {
            $exam = new Exam;
            $exam_info = $exam->getExamDetailById($exam_id);
            $this->render('result', array('exam_info' => $exam_info, 'session_list' => $session_group, 'test_record_id' => $test_record_id));
        }
        $this->redirect(Yii::app()->createUrl('exam/answer', array('id' => $exam_id)));
    }

    public function actionAnswer($id) {
        if (Yii::app()->user->id) {
            $this->layout = '//layouts/answer';
            $exam = new Exam;

            $student_id = Yii::app()->user->id;
            $exam_id = $_GET['id'];
            $test_record_id = TestRecord::model()->getIdByStudentIdExamId($student_id, $exam_id);
            $exam_info = $exam->getExamDetailById($exam_id);
            if ($test_record_id == null) {//Never done this test before
                $this->redirect(Yii::app()->createUrl('student/view', array('msg' => "ขออภัย! ไม่พบรายการทำข้อสอบชุดดังกล่าว")));
            } else if ($exam_info['status'] != 1) {//Exam is disable or hide answer
                $this->redirect(Yii::app()->createUrl('student/view', array('msg' => "ข้อสอบชุดดังกล่าวยังไม่อนุญาติให้ดูเฉลยค่ะ")));
            }
            $session = new Session;
            $session_group = $session->getSessionByExamId($exam_id);


            $this->render('result', array('exam_info' => $exam_info, 'session_list' => $session_group, 'test_record_id' => $test_record_id));
        } else {
            $this->redirect(Yii::app()->createUrl('site/login'));
        }
    }

    public function actionCheckRecord() {
        if (Yii::app()->user->id) {
            $student_id = Yii::app()->user->id;
            $exam_id = $_GET['exam_id'];

            $testRecord = new TestRecord;
            $Total = $testRecord->getTestRecordByStudentIdExamId($student_id, $exam_id);
            echo $Total;
        }
    }

    public function actionCheckStatus($exam_id) {
        if (Yii::app()->user->id) {
            $student_id = Yii::app()->user->id;

            $testRecord = new TestRecord;
            $Total = $testRecord->getTestRecordByStudentIdExamId($student_id, $exam_id);
            echo $Total;
        }
    }

    public function actionUsecredit() {
        $status = "N";

        if (Yii::app()->user->id) {
            $student_id = Yii::app()->user->id;
            $credit_require = $_GET['credit'];
            $exam_id = $_GET['id'];


            $student = new Student;
            $old_credit = $student->getCreditStudentById($student_id);

            $credit = $old_credit - $credit_require;

            if ($credit >= 0) {
                $status = "Y";
                $student->updateNewCredit($credit, $student_id);
                $testRecord = new TestRecord;
                $testRecord->saveFirstLogTestRecord($exam_id, $student_id);
            }
        }

        echo $status;
    }

    public function actionUpcredit() {
        $student_id = Yii::app()->user->id;
        $up_credit = $_GET['credit'];
        $test_record_id = $_GET['id'];
        $student = new Student;
        $old_credit = $student->getCreditStudentById($student_id);

        $credit = $old_credit + $up_credit;

        $student->updateNewCredit($credit, $student_id);

        $model = TestRecord::model()->loadTestRecord($test_record_id);
        $model->elapse_time = $up_credit; //elapse currently used to identify if this test record is rewarded or not
        $model->save();
        // exit();
        $this->redirect(Yii::app()->createUrl('student/view'));
    }

    public function loadTestRecord($id) {
        $model = TestRecord::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadSessionById($id) {
        $model = Session::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function saveExamForm() {//get ExamForm and save
        $exam_id = $_POST['ExamForm']['exam_id'];
        $student_id = $_POST['ExamForm']['student_id'];

        $testRecord = new TestRecord;
        $test_record_id = $testRecord->getIdByStudentIdExamId($student_id, $exam_id);

        $model = $this->loadTestRecord($test_record_id);

        /////////////////Answer Type 4//////////////////
        if (isset($_POST['session_type4'])) {
            if ($_POST['session_type4'] == 4) {
                foreach ($_POST['ans1'] as $key4 => $v4) {
                    $_POST['ans'][$key4] = $_POST['ans1'][$key4] . "." . $_POST['ans2'][$key4];
                }//end foreach
            }
        }
        /////////////////Answer Type 5//////////////////
        if (isset($_POST['session_type5'])) {
            if (isset($_POST['ansA'])) {

                foreach ($_POST['ansA'] as $key5 => $v5) {
                    if (isset($_POST['ansA'][$key5])) {
                        $ansA[$key5] = $_POST['ansA'][$key5];
                    } else {
                        $ansA[$key5] = 'A0';
                    }
                    if (isset($_POST['ansB'][$key5])) {
                        $ansB[$key5] = $_POST['ansB'][$key5];
                    } else {
                        $ansB[$key5] = 'B0';
                    }
                    $_POST['ans'][$key5] = $ansA[$key5] . $ansB[$key5];
                }//end foreach
            }
            if (isset($_POST['ansB'])) {

                foreach ($_POST['ansB'] as $key5 => $v5) {
                    if (isset($_POST['ansA'][$key5])) {
                        $ansA[$key5] = $_POST['ansA'][$key5];
                    } else {
                        $ansA[$key5] = 'A0';
                    }
                    if (isset($_POST['ansB'][$key5])) {
                        $ansB[$key5] = $_POST['ansB'][$key5];
                    } else {
                        $ansB[$key5] = 'B0';
                    }
                    $_POST['ans'][$key5] = $ansA[$key5] . $ansB[$key5];
                }//end foreach
            }
        }
        /////////////////Answer Type 6/////////////////
        if (isset($_POST['session_type6'])) {
            if (isset($_POST['ans6A'])) {

                foreach ($_POST['ans6A'] as $key6 => $v6) {
                    if (isset($_POST['ans6A'][$key6])) {
                        $ans6A[$key6] = $_POST['ans6A'][$key6];
                    }
                    if (isset($_POST['ans6B'][$key6])) {
                        $ans6B[$key6] = $_POST['ans6B'][$key6];
                    }
                    if (isset($_POST['ans6C'][$key6])) {
                        $ans6C[$key6] = $_POST['ans6C'][$key6];
                    }
                    if (isset($_POST['ans6D'][$key6])) {
                        $ans6D[$key6] = $_POST['ans6D'][$key6];
                    }
                    $_POST['ans'][$key6] = $ans6A[$key6] . $ans6B[$key6] . $ans6C[$key6] . $ans6D[$key6];
                }
            }
            if (isset($_POST['ans6B'])) {

                foreach ($_POST['ans6B'] as $key6 => $v6) {
                    if (isset($_POST['ans6A'][$key6])) {
                        $ans6A[$key6] = $_POST['ans6A'][$key6];
                    }
                    if (isset($_POST['ans6B'][$key6])) {
                        $ans6B[$key6] = $_POST['ans6B'][$key6];
                    }
                    if (isset($_POST['ans6C'][$key6])) {
                        $ans6C[$key6] = $_POST['ans6C'][$key6];
                    }
                    if (isset($_POST['ans6D'][$key6])) {
                        $ans6D[$key6] = $_POST['ans6D'][$key6];
                    }
                    $_POST['ans'][$key6] = $ans6A[$key6] . $ans6B[$key6] . $ans6C[$key6] . $ans6D[$key6];
                }
            }
            if (isset($_POST['ans6C'])) {

                foreach ($_POST['ans6C'] as $key6 => $v6) {
                    if (isset($_POST['ans6A'][$key6])) {
                        $ans6A[$key6] = $_POST['ans6A'][$key6];
                    }
                    if (isset($_POST['ans6B'][$key6])) {
                        $ans6B[$key6] = $_POST['ans6B'][$key6];
                    }
                    if (isset($_POST['ans6C'][$key6])) {
                        $ans6C[$key6] = $_POST['ans6C'][$key6];
                    }
                    if (isset($_POST['ans6D'][$key6])) {
                        $ans6D[$key6] = $_POST['ans6D'][$key6];
                    }
                    $_POST['ans'][$key6] = $ans6A[$key6] . $ans6B[$key6] . $ans6C[$key6] . $ans6D[$key6];
                }
            }
            if (isset($_POST['ans6D'])) {

                foreach ($_POST['ans6D'] as $key6 => $v6) {
                    if (isset($_POST['ans6A'][$key6])) {
                        $ans6A[$key6] = $_POST['ans6A'][$key6];
                    }
                    if (isset($_POST['ans6B'][$key6])) {
                        $ans6B[$key6] = $_POST['ans6B'][$key6];
                    }
                    if (isset($_POST['ans6C'][$key6])) {
                        $ans6C[$key6] = $_POST['ans6C'][$key6];
                    }
                    if (isset($_POST['ans6D'][$key6])) {
                        $ans6D[$key6] = $_POST['ans6D'][$key6];
                    }
                    $_POST['ans'][$key6] = $ans6A[$key6] . $ans6B[$key6] . $ans6C[$key6] . $ans6D[$key6];
                }
            }
        }
        /////////////////Answer Type 7//////////////////
        if (isset($_POST['session_type7'])) {


            if (isset($_POST['ans_1']) || isset($_POST['ans_2']) || isset($_POST['ans_3']) || isset($_POST['ans_4'])) {
                foreach ($_POST['ans_1'] as $key7 => $v7) {
                    //คำตอบที่1
                    if (isset($_POST['ans_1_1'][$key7]) && isset($_POST['ans_1_2'][$key7]) && isset($_POST['ans_1_3'][$key7])) {
                        $_POST['ans_1'][$key7] = $_POST['ans_1_1'][$key7] . $_POST['ans_1_2'][$key7] . $_POST['ans_1_3'][$key7];
                    } else {
                        $_POST['ans_1'][$key7] = '---';
                    }
                    //คำตอบที่2
                    if (isset($_POST['ans_2_1'][$key7]) && isset($_POST['ans_2_2'][$key7]) && isset($_POST['ans_2_3'][$key7])) {
                        $_POST['ans_2'][$key7] = $_POST['ans_2_1'][$key7] . $_POST['ans_2_2'][$key7] . $_POST['ans_2_3'][$key7];
                    } else {
                        $_POST['ans_2'][$key7] = '---';
                    }
                    //คำตอบที่3
                    if (isset($_POST['ans_3_1'][$key7]) && isset($_POST['ans_3_2'][$key7]) && isset($_POST['ans_3_3'][$key7])) {
                        $_POST['ans_3'][$key7] = $_POST['ans_3_1'][$key7] . $_POST['ans_3_2'][$key7] . $_POST['ans_3_3'][$key7];
                    } else {
                        $_POST['ans_3'][$key7] = '---';
                    }
                    //คำตอบที่4
                    if (isset($_POST['ans_4_1'][$key7]) && isset($_POST['ans_4_2'][$key7]) && isset($_POST['ans_4_3'][$key7])) {
                        $_POST['ans_4'][$key7] = $_POST['ans_4_1'][$key7] . $_POST['ans_4_2'][$key7] . $_POST['ans_4_3'][$key7];
                    } else {
                        $_POST['ans_4'][$key7] = '---';
                    }


                    //รวมคำตอบ
                    $_POST['ans'][$key7] = $_POST['ans_1'][$key7] . $_POST['ans_2'][$key7] . $_POST['ans_3'][$key7] . $_POST['ans_4'][$key7];
                }//end foreach
            }//end if isset
        }//end type 7

        if (isset($_POST['ans'])) {
            $selected = $_POST['ans'];
            $session_id_list = $_POST['session_id'];

            $this->SaveTesting($exam_id, $student_id, $selected, $session_id_list);
        }

        return $test_record_id;
    }

    public function saveTesting($exam_id, $student_id, $select, $session_id_list) {
        $model = new Answer;
        $testRecord = new TestRecord;
        $testing = new Testing;

        $test_record_id = $testRecord->getIdByStudentIdExamId($student_id, $exam_id);
        $data = array();
        foreach ($select as $key => $value) {
            $session_id = $session_id_list[$key];
            $session = $this->loadSessionById($session_id);

            $answer_type_id = $session->answer_type_id;
            $answer = $model->getAnswerDetail($session_id, $key);
            //ตรวจคำตอบแบบที่7 - หรับหรับแบบอื่นๆ แค่เช็คว่าตรงกัน
            if ($answer_type_id == 7) {
                $score = $this->Cal_Ans7($answer['answer'], $value,$answer['score_item']);
            } else {

                if (trim($answer['answer']) == trim($value)) {
                    $score = $answer['score_item'];
                } else {
                    $score = 0;
                }
            }

            $data[$key]['test_record_id'] = $test_record_id;
            $data[$key]['test_number'] = $key;
            $data[$key]['answer_id'] = $answer['answer_id'];
            $data[$key]['selected'] = $value;
            $data[$key]['test_score'] = $score;

            $sql = array();

            $num_rec = $testing->getTotalTestingRecord($test_record_id, $key);
///////////////////////////////////////////////////////////////////////////////////////////////////////
            $count_selected_choice = $num_rec;
///////////////////////////////////////////////////////////////////////////////////////////////////////
            if ($num_rec > 0) {
                $sql[$key] = "UPDATE esto_testing SET answer_id='" . $answer['answer_id'] . "',selected = '" . $value . "',test_score = '" . $score . "'
                                      WHERE test_record_id='" . $test_record_id . "' AND test_number='" . $key . "'";
            } else {
                $sql[$key] = "INSERT INTO esto_testing (test_record_id,test_number,answer_id,selected,test_score)
                           VALUES ('" . $test_record_id . "','" . $key . "','" . $answer['answer_id'] . "','" . $value . "','" . $score . "')";
            }

            $command = yii::app()->db->createCommand($sql[$key]);
            $result = $command->execute();
        }

        //exit;
    }

    private function Cal_Ans7($answer, $value,$score_item) {
$value=trim($value,'-');
        $selected = array();
        for ($i = 0; $i * 3 < strlen($value); $i++) {
            $selected[$i] = substr($value, $i * 3, 3);
            for ($j = $i - 1; $j >= 0; $j--) {
                if ($selected[$i] == $selected[$j])
                    return 0;
            } // ห้ามมีคำตอบซ้ำกัน ถ้าซ้ำกันให้ =0
        }

        $score = 0;

        foreach ($selected as $v) {
            if ($v != NULL) {
                $pos = strpos($answer, $v);
                if ($pos === false) {
                   $score -=3; //decrease 3 if wrong
                } else {
                    $score +=$score_item;
                }
                //echo $v."_".$pos."_" .$score_i."||";
            }
        }
        return max($score, 0);
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}