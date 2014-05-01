<table cellpadding="0" cellspacing="0" border="0" class="display" id="table_list_subject">
        <thead>
                <tr>
                        <th width="48">สถานะ</th>
                        <th width="80">วันที่สร้าง</th>
                        <th>ชื่อชุดข้อสอบ</th>
                        <th width="55">เครดิต</th>
                </tr>
        </thead>
        <tbody>

                <?php
                    $exam_criteria = new CDbCriteria();
                    $exam_criteria->select = '*';
                    $exam_criteria->condition = 'status=:status AND subject_id=:subject_id';
                    $exam_criteria->params=array(':status'=>1,':subject_id'=>$subject_id);
                    $exam_criteria->order='sort_order';
                    $Exams = Exam::model()->findAll($exam_criteria);
                ?>
                <?php foreach($Exams  as $Exam) { ?>
                <?php
                    $testRecord =new TestRecord;
                    $test = $testRecord->getTestRecordDetailByStudentIdExamId($student_id, $Exam->exam_id);

                    $status_test = $test['status'];


                ?>
                <tr onclick="CheckStatusTest('<?php echo $status_test;?>','<?php echo $Exam->exam_id; ?>')">     
                        <?php if($status_test==2){ ?>
                            <td class="mark_true" title="ทำแล้ว"><span>»</span></td>
                        <?php }else if($status_test==1){?>
                            <td class="mark_resume" title="ยังทำไม่เสร็จ"><span>¨</span></td>
                        <?php }else if($status_test==3){?>
                            <td class="mark_false" title="ยังไม่ได้ทำ"><span>«</span></td>
                        <?php }else {?>
                            <td class="mark_non" title="ยังไม่ได้ซื้อ"><span>⤫</span></td>
                        <?php }?>
                        
                        <td class="date_added"><?php echo date('d/m/Y',strtotime($Exam->date_added));?></td>
                        <td class="subject"><?php echo $Exam->name;?></td>
                        <td class="number"><?php echo $Exam->credit_required;?>ฟหกดฟหกด</td>
                </tr>
                <?php } ?>					
        </tbody>
</table>