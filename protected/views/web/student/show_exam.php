<table cellpadding="0" cellspacing="0" border="0" class="display" id="table_list_subject">
        <thead>
                <tr>
                        <th width="48">สถานะ</th>
                        <th width="80">ออกเมื่อ</th>
                        <th>ชื่อชุดข้อสอบ</th>
                        <th width="55">เครดิต</th>
                </tr>
        </thead>
        <tbody>

                <?php
                
                
                    $exam_criteria = new CDbCriteria();
                    $exam_criteria->select = '*';
                    $exam_criteria->condition = 'status>=:status ';
                    $exam_criteria->params=array(':status'=>1);
                    $exam_criteria->order='sort_order';
                    $Exams = Exam::model()->findAll($exam_criteria);
                    
                ?>
                <?php foreach($Exams  as $Exam) {
                    $testRecord =new TestRecord;
                    $test = $testRecord->getTestRecordDetailByStudentIdExamId($student_id, $Exam->exam_id);

                    $status_test = $test['status'];
                    switch($status_test){
                        case 1: $td = '<td class="mark_resume" title="กำลังทำ"><span>¨</span></td>';break;
                        case 2: $td = '<td class="mark_true" title="ทำแล้ว"><span>»</span></td>';break;
                        default:$td= '<td class="mark_non" title="ยังไม่ได้ทำ"><span>«</span></td>';break;
                    }
                    $exam_id = $Exam->exam_id;

                ?>
            <tr onclick="CheckandGo('<?php echo $status_test;?>','<?php echo $exam_id; ?>')"> 
                        <?php echo $td?>
                        <td class="date_added"><?php echo date('d/m/Y',strtotime($Exam->date_added));?></td>
                        <td class="subject"><?php echo $Exam->name;?></td>
                        <td class="number"><?php echo $Exam->credit_required;?></td>
                </tr>
                
                <?php } ?>					
        </tbody>
</table>