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
<div class="answer_content form_2">
    <?php
            $session_id = $answer['session_id'];
            $start = $answer['session_start'];
            $end = $answer['session_end'];
            $order = $answer['session_order'];

            $student_id = Yii::app()->user->id;
            //$exam_id = $_GET['id'];

            $testRecoed = new TestRecord;
            $testing = new Testing;

            $test_record_id = $testRecoed->getIdByStudentIdExamId($student_id,$exam_id);

    ?>
    <ul>

        <?php for($i=$start;$i<=$end;$i++){           
            $test = $testing->getAllTestingRecord($test_record_id,$i);         
        ?>

        <li>
                <span><?php echo $i;?></span>
                        <input type="radio" id="ans<?php echo $i;?>_1" name="ans[<?php echo $i;?>]" value="1" <?php if($test['selected']=='1'){?>checked<?php }?> />
                        <label for="ans<?php echo $i;?>_1">1</label>

                        <input type="radio" id="ans<?php echo $i;?>_2" name="ans[<?php echo $i;?>]" value="2" <?php if($test['selected']=='2'){?>checked<?php }?> />
                        <label for="ans<?php echo $i;?>_2">2</label>

                        <input type="radio" id="ans<?php echo $i;?>_3" name="ans[<?php echo $i;?>]" value="3" <?php if($test['selected']=='3'){?>checked<?php }?> />
                        <label for="ans<?php echo $i;?>_3">3</label>

                        <input type="radio" id="ans<?php echo $i;?>_4" name="ans[<?php echo $i;?>]" value="4" <?php if($test['selected']=='4'){?>checked<?php }?> />
                        <label for="ans<?php echo $i;?>_4">4</label>

                        <input type="radio" id="ans<?php echo $i;?>_5" name="ans[<?php echo $i;?>]" value="5" <?php if($test['selected']=='5'){?>checked<?php }?> />
                        <label for="ans<?php echo $i;?>_5">5</label>
                        <input type="hidden" name="session_id[<?php echo $i;?>]" value="<?php echo $session_id;?>"/>
        </li>
        <?php } ?>
    </ul>
</div>
</div>