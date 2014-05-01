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
            <h2 class="has_multiple">กระดาษคำตอบ</h2>
            <h3>ตอนที่ <?php echo $answer['session_order'];?></h3>
    </div>
    <div class="header_right">
        <?php if($last_key!=$key_ans){?>
            <a href="javascript:show_next('<?php echo $answer['session_order'];?>');"></a>
        <?php }else{?>
            <span>inactive</span>
        <?php }?>
    </div>
</div>
<div class="answer_content form_4">
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
                    $value = explode(".",$test['selected']);
                    $value1 = $value[0];
                    $value2 = $value[1];
                    }
                    if($test['answer']!=$test['selected']){
                        $style="border:2px solid red";
                    }else if ($test['answer']==$test['selected']){
                        $style="border:2px solid #313131";
                    }else{
                        $style=" ";
                    }
                ?>
                <li>
                        <span><?php echo $i;?></span>
                        <input class="number_4" style="<?php echo $style;?>" type="text" id="ans<?php echo $i;?>_1" name="ans1[<?php echo $i;?>]" readonly  placeholder="0000" maxlength="4" value="<?php if(isset($value1)) echo $value1;?>">.
                        <input class="number_2" style="<?php echo $style;?>" type="text" id="ans<?php echo $i;?>_2" name="ans2[<?php echo $i;?>]" readonly  placeholder="00" maxlength="2" value="<?php if(isset($value2)) echo $value2;?>"> 
                        <?php  if($test['answer']!=$test['selected']){echo $test['answer'];}?>
                        
                        <input type="hidden" name="ans[<?php echo $i;?>]" value="<?php if(isset($test['selected'])) echo $test['selected'];?>">
                        <input type="hidden" name="session_id[<?php echo $i;?>]" value="<?php echo $session_id;?>"/>
                        <input type="hidden" name="session_type" value="4"/>
                        
                </li>
                <?php } ?>
        </ul>
</div>
</div>