<?php
class ExamController extends Controller
{

        public $layout;
        public function actionIndex()
	{
                $this->layout = '//layouts/exam';
                //check Login
                if(Yii::app()->user->id){
                    if(isset($_GET['id'])){
                        $exam_id = $_GET['id'];
                    }else{
                        $exam_id = 0;
                    }

                    $exam = new Exam;
                    $exam_info = $exam->getExamDetailById($exam_id);


                    $session = new Session;
                    $session_list = $session->getSessionByExamId($exam_id);

                   // echo "<pre>", print_r($session_list), "</pre>";

                    $this->render('index',array('exam_info'=>$exam_info,'session_list'=>$session_list));

                }else{
                    $this->redirect(Yii::app()->createUrl('site/login'));
                }
		
	}
        public function actionSelect()
	{
            $student_id = Yii::app()->user->id;
            $subject_id = $_GET['subject_id'];            
            $level_id = $_GET['level_id'];
            $exam = new Exam;
            $exam_info = $exam->getExamBySubjectId($level_id,$subject_id);
            
                
            $text = '<table cellpadding="0" cellspacing="0" border="0" class="display" id="table_list_subject">
                        <thead>
                                <tr>
                                        <th width="48">สถานะ</th>
                                        <th width="80">วันที่สร้าง</th>
                                        <th>ชื่อชุดข้อสอบ</th>
                                        <th width="55">เครดิต</th>
                                </tr>
                        </thead>';
            $text .=   '<tbody>';
            foreach($exam_info  as $Exam) {

            $testRecord =new TestRecord;
            $test = $testRecord->getTestRecordDetailByStudentIdExamId($student_id, $Exam['exam_id']);

            $status_test = $test['status'];
            $exam_id = $Exam['exam_id'];

            if($status_test==2){
                $td = '<td class="mark_true" title="ทำแล้ว"><span>»</span></td>';
            }else if ($status_test==1){
                $td = '<td class="mark_resume" title="ยังทำไม่เสร็จ"><span>¨</span></td>';
            }else if ($status_test==3){
                $td = '<td class="mark_false" title="ยังไม่ได้ทำ"><span>«</span></td>';
            }else{
                $td = '<td class="mark_non" title="ยังไม่ได้ซื้อ"><span>⤫</span></td>';
            }
            

            $text .=   '<tr onclick="CheckStatusTest(\''.$status_test.'\',\''.$exam_id.'\');">
                        '.$td.'
                        <td class="date_added">'.date('d/m/Y',strtotime($Exam['date_added'])).'</td>
                        <td class="subject">'.$Exam['name'].'</td>
                        <td class="number">'.$Exam['credit_required'].'</td>
                        </tr>';
                     }
           $text .= '</tbody>
                    </table>';
           echo $text;              
	}

        public function actionSave()
	{
             $exam_id = $_POST['ExamForm']['exam_id'];
             $student_id = $_POST['ExamForm']['student_id'];

             $testRecord = new TestRecord;
             $test_record_id = $testRecord->getIdByStudentIdExamId($student_id,$exam_id);

             $model = $this->loadTestRecord($test_record_id);
            
             $session_list = array();
             $session_list =$_POST['session_id'];
             /////////////////Answer Type 4//////////////////
             if(isset($_POST['session_type4'])){
                if($_POST['session_type4']==4){
                    foreach($_POST['ans1'] as $key4=>$v4){
                        $_POST['ans'][$key4]= $_POST['ans1'][$key4].".".$_POST['ans2'][$key4];
                    }//end foreach
                }
             }
             /////////////////Answer Type 5//////////////////
             if(isset($_POST['session_type5'])){
                    if(isset($_POST['ansA'])){

                          foreach($_POST['ansA'] as $key5=>$v5){
                              if(isset($_POST['ansA'][$key5])) {
                                  $ansA[$key5] = $_POST['ansA'][$key5];
                              }else{
                                  $ansA[$key5] ='A0';
                              }
                              if(isset($_POST['ansB'][$key5])) {
                                  $ansB[$key5] = $_POST['ansB'][$key5];
                              }else{
                                  $ansB[$key5] ='B0';
                              }
                            $_POST['ans'][$key5]= $ansA[$key5].$ansB[$key5];
                          }//end foreach
                    }
                    if(isset($_POST['ansB'])){

                          foreach($_POST['ansB'] as $key5=>$v5){
                              if(isset($_POST['ansA'][$key5])) {
                                  $ansA[$key5] = $_POST['ansA'][$key5];
                              }else{
                                  $ansA[$key5] ='A0';
                              }
                              if(isset($_POST['ansB'][$key5])) {
                                  $ansB[$key5] = $_POST['ansB'][$key5];
                              }else{
                                  $ansB[$key5] ='B0';
                              }
                            $_POST['ans'][$key5]= $ansA[$key5].$ansB[$key5];
                          }//end foreach
                    }
             }
             /////////////////Answer Type 6//////////////////
             if(isset($_POST['session_type6'])){
                        if(isset($_POST['ans6A'])){

                              foreach($_POST['ans6A'] as $key6=>$v6){
                                  if(isset($_POST['ans6A'][$key6])) {
                                      $ans6A[$key6] = $_POST['ans6A'][$key6];
                                  }else{
                                      $ans6A[$key6] ='A0';
                                  }
                                  if(isset($_POST['ans6B'][$key6])) {
                                      $ans6B[$key6] = $_POST['ans6B'][$key6];
                                  }else{
                                      $ans6B[$key6] ='B0';
                                  }
                                  if(isset($_POST['ans6C'][$key6])) {
                                      $ans6C[$key6] = $_POST['ans6C'][$key6];
                                  }else{
                                      $ans6C[$key6] ='C0';
                                  }
                                  if(isset($_POST['ans6D'][$key6])) {
                                      $ans6D[$key6] = $_POST['ans6D'][$key6];
                                  }else{
                                      $ans6D[$key6] ='D0';
                                  }
                                $_POST['ans'][$key6]= $ans6A[$key6].$ans6B[$key6].$ans6C[$key6].$ans6D[$key6];
                              }
                        }
                        if(isset($_POST['ans6B'])){

                             foreach($_POST['ans6B'] as $key6=>$v6){
                                  if(isset($_POST['ans6A'][$key6])) {
                                      $ans6A[$key6] = $_POST['ans6A'][$key6];
                                  }else{
                                      $ans6A[$key6] ='A0';
                                  }
                                  if(isset($_POST['ans6B'][$key6])) {
                                      $ans6B[$key6] = $_POST['ans6B'][$key6];
                                  }else{
                                      $ans6B[$key6] ='B0';
                                  }
                                  if(isset($_POST['ans6C'][$key6])) {
                                      $ans6C[$key6] = $_POST['ans6C'][$key6];
                                  }else{
                                      $ans6C[$key6] ='C0';
                                  }
                                  if(isset($_POST['ans6D'][$key6])) {
                                      $ans6D[$key6] = $_POST['ans6D'][$key6];
                                  }else{
                                      $ans6D[$key6] ='D0';
                                  }
                                $_POST['ans'][$key6]= $ans6A[$key6].$ans6B[$key6].$ans6C[$key6].$ans6D[$key6];
                              }
                        }
                        if(isset($_POST['ans6C'])){

                             foreach($_POST['ans6C'] as $key6=>$v6){
                                  if(isset($_POST['ans6A'][$key6])) {
                                      $ans6A[$key6] = $_POST['ans6A'][$key6];
                                  }else{
                                      $ans6A[$key6] ='A0';
                                  }
                                  if(isset($_POST['ans6B'][$key6])) {
                                      $ans6B[$key6] = $_POST['ans6B'][$key6];
                                  }else{
                                      $ans6B[$key6] ='B0';
                                  }
                                  if(isset($_POST['ans6C'][$key6])) {
                                      $ans6C[$key6] = $_POST['ans6C'][$key6];
                                  }else{
                                      $ans6C[$key6] ='C0';
                                  }
                                  if(isset($_POST['ans6D'][$key6])) {
                                      $ans6D[$key6] = $_POST['ans6D'][$key6];
                                  }else{
                                      $ans6D[$key6] ='D0';
                                  }
                                $_POST['ans'][$key6]= $ans6A[$key6].$ans6B[$key6].$ans6C[$key6].$ans6D[$key6];
                              }
                        }
                        if(isset($_POST['ans6D'])){

                             foreach($_POST['ans6D'] as $key6=>$v6){
                                  if(isset($_POST['ans6A'][$key6])) {
                                      $ans6A[$key6] = $_POST['ans6A'][$key6];
                                  }else{
                                      $ans6A[$key6] ='A0';
                                  }
                                  if(isset($_POST['ans6B'][$key6])) {
                                      $ans6B[$key6] = $_POST['ans6B'][$key6];
                                  }else{
                                      $ans6B[$key6] ='B0';
                                  }
                                  if(isset($_POST['ans6C'][$key6])) {
                                      $ans6C[$key6] = $_POST['ans6C'][$key6];
                                  }else{
                                      $ans6C[$key6] ='C0';
                                  }
                                  if(isset($_POST['ans6D'][$key6])) {
                                      $ans6D[$key6] = $_POST['ans6D'][$key6];
                                  }else{
                                      $ans6D[$key6] ='D0';
                                  }
                                $_POST['ans'][$key6]= $ans6A[$key6].$ans6B[$key6].$ans6C[$key6].$ans6D[$key6];
                              }
                        }
                 }
                 /////////////////Answer Type 7//////////////////
                 if(isset($_POST['session_type7'])){

                    
                     if(isset($_POST['ans_1'])&&isset($_POST['ans_2'])&&isset($_POST['ans_3'])&&isset($_POST['ans_4'])){
                         foreach($_POST['ans_1'] as $key7=>$v7){
                             //คำตอบที่1
                             if(isset($_POST['ans_1_1'][$key7])&&isset($_POST['ans_1_2'][$key7])&&isset($_POST['ans_1_3'][$key7])){
                                 $_POST['ans_1'][$key7] = $_POST['ans_1_1'][$key7].$_POST['ans_1_2'][$key7].$_POST['ans_1_3'][$key7];
                             }else{
                                 $_POST['ans_1'][$key7] = '---';
                             }
                            //คำตอบที่2
                            if(isset($_POST['ans_2_1'][$key7])&&isset($_POST['ans_2_2'][$key7])&&isset($_POST['ans_2_3'][$key7])){
                                $_POST['ans_2'][$key7] = $_POST['ans_2_1'][$key7].$_POST['ans_2_2'][$key7].$_POST['ans_2_3'][$key7];
                            }else{
                                $_POST['ans_2'][$key7] = '---';
                            }
                            //คำตอบที่3
                            if(isset($_POST['ans_3_1'][$key7])&&isset($_POST['ans_3_2'][$key7])&&isset($_POST['ans_3_3'][$key7])){
                                $_POST['ans_3'][$key7] = $_POST['ans_3_1'][$key7].$_POST['ans_3_2'][$key7].$_POST['ans_3_3'][$key7];
                            }else{
                                $_POST['ans_3'][$key7] = '---';
                            }
                            //คำตอบที่4
                            if(isset($_POST['ans_4_1'][$key7])&&isset($_POST['ans_4_2'][$key7])&&isset($_POST['ans_4_3'][$key7])){
                                $_POST['ans_4'][$key7] = $_POST['ans_4_1'][$key7].$_POST['ans_4_2'][$key7].$_POST['ans_4_3'][$key7];
                            }else{
                                $_POST['ans_4'][$key7] = '---';
                            }


                            //รวมคำตอบ
                            $_POST['ans'][$key7] = $_POST['ans_1'][$key7].$_POST['ans_2'][$key7].$_POST['ans_3'][$key7].$_POST['ans_4'][$key7];$_POST['ans_1'][$key7] ;

                         }//end foreach

                     }//end if isset

                 }
//
//                          echo "<br> ===> ";
//                          echo "<pre>";
//                          print_r($_POST['ans']);
//                          echo "</pre>";
//
//                exit;

             if(isset($_POST['ans'])){


                   $select = array();
                   $select = $_POST['ans'];


                   $session_id_list = $_POST['session_id'];
                   $this->SevaAnswer($exam_id,$student_id,$select,$session_id_list);
             }
             $testing = new Testing;
             $total_score = $testing->summaryTestingScore($test_record_id);
             $_POST['ExamForm']['date_attended'] = date('Y-m-d H:i:s');
             $_POST['ExamForm']['score'] = $total_score;
             $_POST['ExamForm']['elapse_time'] = $model->elapse_time +5;
             $model->attributes = $_POST['ExamForm'];
             $model->save();

             $this->redirect(Yii::app()->createUrl('exam/index', array('id'=>$exam_id)));
            
        }

        public function actionSubmit($id)
	{

             $this->layout = '//layouts/answer';

             if(isset($_POST['ExamForm'])){
                 $exam_id = $_POST['ExamForm']['exam_id'];
                 $student_id = $_POST['ExamForm']['student_id'];

                 $testRecord = new TestRecord;
                 $test_record_id = $testRecord->getIdByStudentIdExamId($student_id,$exam_id);

                 $model = $this->loadTestRecord($test_record_id);

                 $session_list = array();
                 $session_list =$_POST['session_id'];
                 /////////////////Answer Type 4//////////////////
                 if(isset($_POST['session_type4'])){
                    if($_POST['session_type4']==4){
                        foreach($_POST['ans1'] as $key4=>$v4)
                        $_POST['ans'][$key4]= $_POST['ans1'][$key4].".".$_POST['ans2'][$key4];
                    }
                 }
                 /////////////////Answer Type 5//////////////////
                 if(isset($_POST['session_type5'])){
                        if(isset($_POST['ansA'])){

                              foreach($_POST['ansA'] as $key5=>$v5){
                                  if(isset($_POST['ansA'][$key5])) {
                                      $ansA[$key5] = $_POST['ansA'][$key5];
                                  }else{
                                      $ansA[$key5] ='A0';
                                  }
                                  if(isset($_POST['ansB'][$key5])) {
                                      $ansB[$key5] = $_POST['ansB'][$key5];
                                  }else{
                                      $ansB[$key5] ='B0';
                                  }
                                $_POST['ans'][$key5]= $ansA[$key5].$ansB[$key5];
                              }
                        }
                        if(isset($_POST['ansB'])){

                              foreach($_POST['ansB'] as $key5=>$v5){
                                  if(isset($_POST['ansA'][$key5])) {
                                      $ansA[$key5] = $_POST['ansA'][$key5];
                                  }else{
                                      $ansA[$key5] ='A0';
                                  }
                                  if(isset($_POST['ansB'][$key5])) {
                                      $ansB[$key5] = $_POST['ansB'][$key5];
                                  }else{
                                      $ansB[$key5] ='B0';
                                  }
                                $_POST['ans'][$key5]= $ansA[$key5].$ansB[$key5];
                              }
                        }
                 }
                 /////////////////Answer Type 6//////////////////
                 if(isset($_POST['session_type6'])){
                        if(isset($_POST['ans6A'])){

                              foreach($_POST['ans6A'] as $key6=>$v6){
                                  if(isset($_POST['ans6A'][$key6])) {
                                      $ans6A[$key6] = $_POST['ans6A'][$key6];
                                  }else{
                                      $ans6A[$key6] ='A0';
                                  }
                                  if(isset($_POST['ans6B'][$key6])) {
                                      $ans6B[$key6] = $_POST['ans6B'][$key6];
                                  }else{
                                      $ans6B[$key6] ='B0';
                                  }
                                  if(isset($_POST['ans6C'][$key6])) {
                                      $ans6C[$key6] = $_POST['ans6C'][$key6];
                                  }else{
                                      $ans6C[$key6] ='C0';
                                  }
                                  if(isset($_POST['ans6D'][$key6])) {
                                      $ans6D[$key6] = $_POST['ans6D'][$key6];
                                  }else{
                                      $ans6D[$key6] ='D0';
                                  }
                                $_POST['ans'][$key6]= $ans6A[$key6].$ans6B[$key6].$ans6C[$key6].$ans6D[$key6];
                              }
                        }
                        if(isset($_POST['ans6B'])){

                             foreach($_POST['ans6B'] as $key6=>$v6){
                                  if(isset($_POST['ans6A'][$key6])) {
                                      $ans6A[$key6] = $_POST['ans6A'][$key6];
                                  }else{
                                      $ans6A[$key6] ='A0';
                                  }
                                  if(isset($_POST['ans6B'][$key6])) {
                                      $ans6B[$key6] = $_POST['ans6B'][$key6];
                                  }else{
                                      $ans6B[$key6] ='B0';
                                  }
                                  if(isset($_POST['ans6C'][$key6])) {
                                      $ans6C[$key6] = $_POST['ans6C'][$key6];
                                  }else{
                                      $ans6C[$key6] ='C0';
                                  }
                                  if(isset($_POST['ans6D'][$key6])) {
                                      $ans6D[$key6] = $_POST['ans6D'][$key6];
                                  }else{
                                      $ans6D[$key6] ='D0';
                                  }
                                $_POST['ans'][$key6]= $ans6A[$key6].$ans6B[$key6].$ans6C[$key6].$ans6D[$key6];
                              }
                        }
                        if(isset($_POST['ans6C'])){

                             foreach($_POST['ans6C'] as $key6=>$v6){
                                  if(isset($_POST['ans6A'][$key6])) {
                                      $ans6A[$key6] = $_POST['ans6A'][$key6];
                                  }else{
                                      $ans6A[$key6] ='A0';
                                  }
                                  if(isset($_POST['ans6B'][$key6])) {
                                      $ans6B[$key6] = $_POST['ans6B'][$key6];
                                  }else{
                                      $ans6B[$key6] ='B0';
                                  }
                                  if(isset($_POST['ans6C'][$key6])) {
                                      $ans6C[$key6] = $_POST['ans6C'][$key6];
                                  }else{
                                      $ans6C[$key6] ='C0';
                                  }
                                  if(isset($_POST['ans6D'][$key6])) {
                                      $ans6D[$key6] = $_POST['ans6D'][$key6];
                                  }else{
                                      $ans6D[$key6] ='D0';
                                  }
                                $_POST['ans'][$key6]= $ans6A[$key6].$ans6B[$key6].$ans6C[$key6].$ans6D[$key6];
                              }
                        }
                        if(isset($_POST['ans6D'])){

                             foreach($_POST['ans6D'] as $key6=>$v6){
                                  if(isset($_POST['ans6A'][$key6])) {
                                      $ans6A[$key6] = $_POST['ans6A'][$key6];
                                  }else{
                                      $ans6A[$key6] ='A0';
                                  }
                                  if(isset($_POST['ans6B'][$key6])) {
                                      $ans6B[$key6] = $_POST['ans6B'][$key6];
                                  }else{
                                      $ans6B[$key6] ='B0';
                                  }
                                  if(isset($_POST['ans6C'][$key6])) {
                                      $ans6C[$key6] = $_POST['ans6C'][$key6];
                                  }else{
                                      $ans6C[$key6] ='C0';
                                  }
                                  if(isset($_POST['ans6D'][$key6])) {
                                      $ans6D[$key6] = $_POST['ans6D'][$key6];
                                  }else{
                                      $ans6D[$key6] ='D0';
                                  }
                                $_POST['ans'][$key6]= $ans6A[$key6].$ans6B[$key6].$ans6C[$key6].$ans6D[$key6];
                              }
                        }
                 }
                 /////////////////Answer Type 7//////////////////
                 if(isset($_POST['session_type7'])){


                     if(isset($_POST['ans_1'])&&isset($_POST['ans_2'])&&isset($_POST['ans_3'])&&isset($_POST['ans_4'])){
                         foreach($_POST['ans_1'] as $key7=>$v7){
                             //คำตอบที่1
                             if(isset($_POST['ans_1_1'][$key7])&&isset($_POST['ans_1_2'][$key7])&&isset($_POST['ans_1_3'][$key7])){
                                 $_POST['ans_1'][$key7] = $_POST['ans_1_1'][$key7].$_POST['ans_1_2'][$key7].$_POST['ans_1_3'][$key7];
                             }else{
                                 $_POST['ans_1'][$key7] = '---';
                             }
                            //คำตอบที่2
                            if(isset($_POST['ans_2_1'][$key7])&&isset($_POST['ans_2_2'][$key7])&&isset($_POST['ans_2_3'][$key7])){
                                $_POST['ans_2'][$key7] = $_POST['ans_2_1'][$key7].$_POST['ans_2_2'][$key7].$_POST['ans_2_3'][$key7];
                            }else{
                                $_POST['ans_2'][$key7] = '---';
                            }
                            //คำตอบที่3
                            if(isset($_POST['ans_3_1'][$key7])&&isset($_POST['ans_3_2'][$key7])&&isset($_POST['ans_3_3'][$key7])){
                                $_POST['ans_3'][$key7] = $_POST['ans_3_1'][$key7].$_POST['ans_3_2'][$key7].$_POST['ans_3_3'][$key7];
                            }else{
                                $_POST['ans_3'][$key7] = '---';
                            }
                            //คำตอบที่4
                            if(isset($_POST['ans_4_1'][$key7])&&isset($_POST['ans_4_2'][$key7])&&isset($_POST['ans_4_3'][$key7])){
                                $_POST['ans_4'][$key7] = $_POST['ans_4_1'][$key7].$_POST['ans_4_2'][$key7].$_POST['ans_4_3'][$key7];
                            }else{
                                $_POST['ans_4'][$key7] = '---';
                            }


                            //รวมคำตอบ
                            $_POST['ans'][$key7] = $_POST['ans_1'][$key7].$_POST['ans_2'][$key7].$_POST['ans_3'][$key7].$_POST['ans_4'][$key7];$_POST['ans_1'][$key7] ;

                         }//end foreach

                     }//end if isset

                 }

//                          echo "<br> ===> ";
//                          echo "<pre>";
//                          print_r($_POST['ans']);
//                          echo "</pre>";
//
//                exit;


                 if(isset($_POST['ans'])){
                       $select = array();
                       $select = $_POST['ans'];
                       $session_id_list = $_POST['session_id'];
                       $this->SevaAnswer($exam_id,$student_id,$select,$session_id_list);
                 }
                 $testing = new Testing;
                 $total_score = $testing->summaryTestingScore($test_record_id);
                 $_POST['ExamForm']['date_attended'] = date('Y-m-d H:i:s');
                 $_POST['ExamForm']['score'] = $total_score;
                 $_POST['ExamForm']['elapse_time'] = $model->elapse_time;
                 $_POST['ExamForm']['status'] = 2;
                 $model->attributes = $_POST['ExamForm'];
                 $model->save();

                 $exam = new Exam;
                 $exam_info = $exam->getExamDetailById($id);


                 $session = new Session;
                 $session_group = $session->getSessionByExamId($id);

                 $this->render('result',array('exam_info'=>$exam_info,'session_list'=>$session_group,'test_status'=>2));
             }else{
                  $this->redirect(Yii::app()->createUrl('exam/index', array('id'=>$id)));
             }

        }

        public function actionAnswer($id){
            if(Yii::app()->user->id){
                $this->layout = '//layouts/answer';
                $exam = new Exam;
                $exam_info = $exam->getExamDetailById($id);


                $session = new Session;
                $session_group = $session->getSessionByExamId($id);

                $this->render('result',array('exam_info'=>$exam_info,'session_list'=>$session_group,'test_status'=>2));
            }else{
                $this->redirect(Yii::app()->createUrl('site/login'));
            }
        }

        public function actionChecktest(){
            if(Yii::app()->user->id){
                $student_id = Yii::app()->user->id;
                $exam_id = $_GET['exam_id'];

                $testRecord = new TestRecord;
                $Total = $testRecord->getTestRecordByStudentIdExamId($student_id,$exam_id);
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
                $status="Y";
                $student->updateNewCredit($credit, $student_id);
                $testRecord = new TestRecord;
                $testRecord->saveFirstLogTestRecord($exam_id, $student_id);
                
            }
        }

        echo $status;
    }

       public function actionDecreaseTime($id){
             $model = $this->loadTestRecord($id);
             if($model->status ==1 || $model->status ==3){
                $data = array();
                $data['elapse_time'] = $model->elapse_time +5;
                $data['status'] = 1;
                $model->attributes = $data;
                $model->save();
                $elapse_time = $model->elapse_time +5;
             echo $elapse_time;
             }
             
        }
	public function loadTestRecord($id)
	{
                $model=TestRecord::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

        public function loadSessionById($id)
	{
                $model=Session::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

        public function SevaAnswer($exam_id,$student_id,$select,$session_id_list)
        {
                 $model = new Answer;
                 $testRecord = new TestRecord;
                 $testing = new Testing;

                 $test_record_id = $testRecord->getIdByStudentIdExamId($student_id,$exam_id);
                 $data = array();
                 foreach($select as $key=>$value){


                   $session_id = $session_id_list[$key];
                   $session = $this->loadSessionById($session_id);

                   $answer_type_id = $session->answer_type_id;
                   $answer = $model->getAnswerDetail($session_id,$key);
                   //ตรวจคำตอบแบบที่7


                   if($answer_type_id==7){
                        $ans = array();
                        $ans[1] = substr($value,0,3);
                        $ans[2] = substr($value,3,3);
                        $ans[3] = substr($value,6,3);
                        $ans[4] = substr($value,9,3);
                        // ห้ามมีคำตอบซ้ำกัน ถ้าซ้ำกันให้ =0
                        if($ans[1]==$ans[2] || $ans[1]==$ans[3] || $ans[1]==$ans[4] || $ans[2]==$ans[3] || $ans[2]==$ans[4] || $ans[3]==$ans[4]){
                            $score = 0;
                        }else{

                            $score_total = 0;
                            $score_i = 0;

                            //echo "Answer => ".$answer['answer']."<br/>";
                            foreach($ans as $v){
                                if($v !=NULL){
                                $pos = strpos($answer['answer'], $v);
                                if ($pos === false) {
                                    $score_i = -$answer['score_item']; //score per answer
                                }
                                else{
                                    $score_i = $answer['score_item'];
                                }
                                //echo $v."_".$pos."_" .$score_i."||";//decrease 3 if wrong
                                }
                                $score_total +=$score_i;
                            }
                            $score = max($score_total,0);
                            //echo "<br/> Score: ".$score."<br/>";
                        }
                        
//                        echo "<br/> Score: ".$score;
//                        echo "<br/>Total Score: ".max($score,0);
//                        exit;
                       
                   }else{
                  
                        if(trim($answer['answer'])==trim($value)){
                            $score = $answer['score_item'];
                        }else{
                            $score = 0;
                        }
                   }

                    $data[$key]['test_record_id'] = $test_record_id;
                    $data[$key]['test_number'] = $key;
                    $data[$key]['answer_id'] = $answer['answer_id'];
                    $data[$key]['selected'] = $value;
                    $data[$key]['test_score'] = $score;

                    $sql =array();
                    
                    $num_rec = $testing->getTotalTestingRecord($test_record_id,$key);

                    if($num_rec>0){
                         $sql[$key] = "UPDATE esto_testing SET answer_id='".$answer['answer_id']."',selected = '".$value."',test_score = '".$score."'
                                      WHERE test_record_id='".$test_record_id."' AND test_number='".$key."'";
                    }else{
                         $sql[$key] = "INSERT INTO esto_testing (test_record_id,test_number,answer_id,selected,test_score)
                           VALUES ('".$test_record_id."','".$key."','".$answer['answer_id']."','".$value."','".$score."')";
                    }

                    $command=yii::app()->db->createCommand($sql[$key]);
                    $result = $command->execute();
                                      

                 }
              //exit;
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
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}