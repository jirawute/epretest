
<script>
    function show_next(order) {

        var next = parseInt(order) + 1;

        document.getElementById('answer_sheet_' + order).style.display = "none";
        document.getElementById('answer_sheet_' + next).style.display = "";

    }
    function show_prev(order) {

        var prev = parseInt(order) - 1;

        document.getElementById('answer_sheet_' + order).style.display = "none";
        document.getElementById('answer_sheet_' + prev).style.display = "";

    }

    function alertBox(shared,credit_required, test_record_id) {
        if (shared == 0) {
            var up_credit = 5;
            apprise('<img src="http://www.e-pretest.com/images/web/facebook_hover.png" /><br/>ชวนเพื่อนๆมาทำแบบทดสอบกัน พร้อมรับเครดิตเพิ่ม '+up_credit+' เครดิต', {'verify': true, 'textYes': 'ตกลง', 'textNo': 'ยกเลิก'}, function(r) {
                if (r) {
                    //window.open("https://docs.google.com/forms/d/1vNpjYLkLLYFtD8I9Wti_JhpU8p5gsezJihSAUh1Jos8/viewform");
                    window.open("http://www.facebook.com/share.php?u=www.e-pretest.com/fbsharepage.php", "Facebook_Share", "menubar=1,resizable=1,width=600,height=400");
                    
                    
                    OpenLink("index.php?r=exam/upcredit&id="+test_record_id+"&credit="+up_credit);//Credit reward = 10% if shared on FB
                } else {
                    OpenLink("index.php?r=student/view");
                }
            });
        } else {
            OpenLink("index.php?r=student/view");
        }
    }
</script>
<div class="test_box">
    <div class="question">
        <div class="question_top">
            <?php
            if ($exam_info['exam_type'] == 'Exam') {
                $exam_type = 'ข้อสอบ';
            } else {
                $exam_type = 'แบบฝึกหัด';
            }
            ?>
            <h2>เฉลยชุด<?php echo $exam_type; ?>วิชา<?php echo $exam_info['subject_name']; ?></h2>

            <h3><?php echo $exam_info['name']; ?></h3>
        </div>
        <div class="question_content" style="position:absolute">
            <?php
            if ($exam_info['answer_file']) {
                $file_name = 'answer/' . $exam_info['answer_file'];
            } else {
                $file_name = 'pdf/' . $exam_info['exam_file'];
            }
            ?>
            <?php //echo $_SERVER['SERVER_NAME'] ; ?>
            <div style="position: absolute;width: 20px;height: 30px;background: #F5F5F5;z-index: 100;left: 615px;"></div>
            <iframe id="iframe" class="pdfviewer" src="http://docs.google.com/viewer?url=http%3A%2F%2Fwww.e-pretest.com/uploads/<?php echo $file_name; ?>&embedded=true" width="640px" height="100%" frameborder="0"></iframe>
            <!--<iframe class="pdfviewer" src="http://docs.google.com/viewer?url=http%3A%2F%2Fwww.forum.02dual.com%2Fexamfile%2F655topic%2FkeyO-NET53Math.pdf&embedded=true" width="640px" height="100%" frameborder="0"></iframe>-->
        </div>
    </div>
    <form name="ExamForm" method="post" action="index.php?r=student/view">
        <div class="answer">
            <?php
            $student_id = Yii::app()->user->id;
            //count total record
            $num_rec = count($session_list);
            $exam_id = $exam_info['exam_id'];


            //find last key
            if ($num_rec == 0) {
                $last_key = 0;
            } else {
                $last_key = $num_rec - 1;
            }
            if ($exam_info['status'] = 0) {
                echo "DISABLED";
            } else if ($exam_info['status'] = 2) {
                echo "Answer file(s) is hidden";
            } else if (count($session_list) != 0) {

                foreach ($session_list as $key_ans => $session) {

                    switch ($session['answer_type_id']) {
                        case 1:
                            echo $this->renderPartial('_result1', array('session' => $session, 'key_ans' => $key_ans, 'last_key' => $last_key, 'test_record_id' => $test_record_id, 'exam_id' => $exam_id));
                            break;
                        case 2:
                            echo $this->renderPartial('_result2', array('session' => $session, 'key_ans' => $key_ans, 'last_key' => $last_key, 'test_record_id' => $test_record_id, 'exam_id' => $exam_id));
                            break;
                        case 3:
                            echo $this->renderPartial('_result3', array('session' => $session, 'key_ans' => $key_ans, 'last_key' => $last_key, 'test_record_id' => $test_record_id, 'exam_id' => $exam_id));
                            break;
                        case 4:
                            echo $this->renderPartial('_result4', array('session' => $session, 'key_ans' => $key_ans, 'last_key' => $last_key, 'test_record_id' => $test_record_id, 'exam_id' => $exam_id));
                            break;
                        case 5:
                            echo $this->renderPartial('_result5', array('session' => $session, 'key_ans' => $key_ans, 'last_key' => $last_key, 'test_record_id' => $test_record_id, 'exam_id' => $exam_id));
                            break;
                        case 6:
                            echo $this->renderPartial('_result6', array('session' => $session, 'key_ans' => $key_ans, 'last_key' => $last_key, 'test_record_id' => $test_record_id, 'exam_id' => $exam_id));
                            break;
                        case 7:
                            echo $this->renderPartial('_result7', array('session' => $session, 'key_ans' => $key_ans, 'last_key' => $last_key, 'test_record_id' => $test_record_id, 'exam_id' => $exam_id));
                            break;
                        default:
                            echo $this->renderPartial('_form0');
                    }
                }//end foreach
            } else {
                echo $this->renderPartial('_form0');
            }
            ?>
            <div class="answer_bottom">
                <? $testrecord = TestRecord::model()->getTestRecordDetailByStudentIdExamId($student_id, $exam_id); ?>

                <input onclick="<? echo 'alertBox(' .$testrecord['elapse_time'].','. $exam_info['credit_required']. ',' . $testrecord['test_record_id'] . ')'; ?>" type="button" value="กลับสู่หน้าหลัก" class="submit_button">

            </div>
        </div>
    </form>
</div>
<div class="box_shadow_full"></div>
