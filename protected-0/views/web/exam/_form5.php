<div id="answer_sheet_<?php echo $answer['session_order'];?>" <?php if($key_ans!=0){?>style="display:none"<?php }?>>
   <div class="answer_top">
        <div class="header_left">
            <?php if($key_ans!=0){?>
                <a href="javascript:show_prev('<?php echo $answer['session_order'];?>');"></a>
            <?php }else{?>
                <span>inactive</span>
            <?php }?>
                </div>
        <div class="header_center">
                <a href="#" title="คำชี้แจง: <?php echo $answer['session_name'];?>">
                    <h2 class="has_multiple">กระดาษคำตอบ</h2>
                    <h3>ตอนที่ <?php echo $answer['session_order'];?></h3>
                </a>
        </div>
        <div class="header_right">
            <?php if($last_key!=$key_ans){?>
                <a href="javascript:show_next('<?php echo $answer['session_order'];?>');"></a>
            <?php }else{?>
                <span>inactive</span>
            <?php }?>
        </div>
    </div>
    <div class="answer_content form_5">
    <ul>
             <?php
                    $session_id = $answer['session_id'];
                    $session_type = $answer['answer_type_id'];
                    $start = $answer['session_start'];
                    $end = $answer['session_end'];
                    $order = $answer['session_order'];

                    $student_id = Yii::app()->user->id;
                    $exam_id = $_GET['id'];

                    $testRecoed = new TestRecord;
                    $testing = new Testing;

                    $test_record_id = $testRecoed->getIdByStudentIdExamId($student_id,$exam_id);
                    for($i=$start;$i<=$end;$i++){
                    $test = $testing->getAllTestingRecord($test_record_id,$i);

                    if(is_array($test)){
                        $valueA = substr($test['selected'],0,2);
                        $valueB = substr($test['selected'],2,2);
                    }else{
                        $valueA = '';
                        $valueB = '';
                    }
            ?>
            <li>
                    <span><?php echo $i;?></span>
                    <ul>
                            <li>
                                    <span>A</span>
                                            <input type="radio" id="ans<?php echo $i;?>_A_1" name="ansA[<?php echo $i;?>]" value="A1" <?php if($valueA=='A1'){?>checked<?php }?>>
                                            <label for="ans<?php echo $i;?>_A_1">1</label>

                                            <input type="radio" id="ans<?php echo $i;?>_A_2" name="ansA[<?php echo $i;?>]" value="A2" <?php if($valueA=='A2'){?>checked<?php }?>>
                                            <label for="ans<?php echo $i;?>_A_2">2</label>

                                            <input type="radio" id="ans<?php echo $i;?>_A_3" name="ansA[<?php echo $i;?>]" value="A3" <?php if($valueA=='A3'){?>checked<?php }?>>
                                            <label for="ans<?php echo $i;?>_A_3">3</label>

                                            <input type="radio" id="ans<?php echo $i;?>_A_4" name="ansA[<?php echo $i;?>]" value="A4" <?php if($valueA=='A4'){?>checked<?php }?>>
                                            <label for="ans<?php echo $i;?>_A_4">4</label>

                            </li>
                            <li>
                                    <span>B</span>
                                            <input type="radio" id="ans<?php echo $i;?>_B_1" name="ansB[<?php echo $i;?>]" value="B1" <?php if($valueB=='B1'){?>checked<?php }?>>
                                            <label for="ans<?php echo $i;?>_B_1">1</label>

                                            <input type="radio" id="ans<?php echo $i;?>_B_2" name="ansB[<?php echo $i;?>]" value="B2" <?php if($valueB=='B2'){?>checked<?php }?>>
                                            <label for="ans<?php echo $i;?>_B_2">2</label>

                                            <input type="radio" id="ans<?php echo $i;?>_B_3" name="ansB[<?php echo $i;?>]" value="B3" <?php if($valueB=='B3'){?>checked<?php }?>>
                                            <label for="ans<?php echo $i;?>_B_3">3</label>

                                            <input type="radio" id="ans<?php echo $i;?>_B_4" name="ansB[<?php echo $i;?>]" value="B4" <?php if($valueB=='B4'){?>checked<?php }?>>
                                            <label for="ans<?php echo $i;?>_B_4">4</label>
                            </li>
                    </ul>
                    <input type="hidden" name="ans[<?php echo $i;?>]" value="">
                    <input type="hidden" name="session_id[<?php echo $i;?>]" value="<?php echo $session_id;?>"/>
                    <input type="hidden" name="session_type5" value="5"/>
            </li>
            <?php } ?>            
    </ul>
</div>
</div>