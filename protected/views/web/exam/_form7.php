<div id="answer_sheet_<?php echo $answer['session_order'];?>" <?php if($key_ans!=0){?>style="display:none"<?php }?>>
     <div class="answer_top">
        <div class="header_left">
            <?php if($key_ans!=0){?>
                <a title="ไปตอนที่ <?php echo $answer['session_order']-1;?>"href="javascript:show_prev('<?php echo $answer['session_order'];?>');"></a>
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
                <a title="ไปตอนที่ <?php echo $answer['session_order']+1;?>" href="javascript:show_next('<?php echo $answer['session_order'];?>');"></a>
            <?php }else{?>
                <span>inactive</span>
            <?php }?>
        </div>
    </div>
    <div class="answer_content form_7">
        <ul>
             <?php
                    $session_id = $answer['session_id'];
                    $session_type = $answer['answer_type_id'];
                    $start = $answer['session_start'];
                    $end = $answer['session_end'];
                    $order = $answer['session_order'];

                    $student_id = Yii::app()->user->id;
                    //$exam_id = $_GET['id'];

                    $testRecoed = new TestRecord;
                    $testing = new Testing;

                    $test_record_id = $testRecoed->getIdByStudentIdExamId($student_id,$exam_id);
                    for($i=$start;$i<=$end;$i++){
                    $test = $testing->getAllTestingRecord($test_record_id,$i);

                    if(is_array($test)){

                        $ans_1 = substr($test['selected'],0,1);
                        $ans_2 = substr($test['selected'],1,1);
                        $ans_3 = substr($test['selected'],2,1);
                        $ans_4 = substr($test['selected'],3,1);
                        $ans_5 = substr($test['selected'],4,1);
                        $ans_6 = substr($test['selected'],5,1);
                        $ans_7 = substr($test['selected'],6,1);
                        $ans_8 = substr($test['selected'],7,1);
                        $ans_9 = substr($test['selected'],8,1);
                        $ans_10 = substr($test['selected'],9,1);
                        $ans_11 = substr($test['selected'],10,1);
                        $ans_12 = substr($test['selected'],11,1);
                    }else{
                        $ans_1 = '-';
                        $ans_2 = '-';
                        $ans_3 = '-';
                        $ans_4 = '-';
                        $ans_5 = '-';
                        $ans_6 = '-';
                        $ans_7 = '-';
                        $ans_8 = '-';
                        $ans_9 = '-';
                        $ans_10 = '-';
                        $ans_11 = '-';
                        $ans_12 = '-';
                    }
            ?>
            <li>
                    <span><?php echo $i;?></span>
                    <ul>
                        <li>
                                <span>คำตอบที่ 1</span>
                                <ul>
                                        <li>
                                            <span id="append_<?php echo $i;?>_1_1" class="append" ><?php  echo $ans_1;?></span>
                                                        <input type="radio" id="ans<?php echo $i;?>_1_1_0" name="ans_1_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_1');" <?php if($ans_1=='0'){?>checked<?php }?> value="0">
                                                        <label  for="ans<?php echo $i;?>_1_1_0">0</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_1_1" name="ans_1_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_1');" <?php if($ans_1=='1'){?>checked<?php }?> value="1">
                                                        <label for="ans<?php echo $i;?>_1_1_1">1</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_1_2" name="ans_1_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_1');" <?php if($ans_1=='2'){?>checked<?php }?> value="2">
                                                        <label for="ans<?php echo $i;?>_1_1_2">2</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_1_3" name="ans_1_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_1');" <?php if($ans_1=='3'){?>checked<?php }?> value="3">
                                                        <label for="ans<?php echo $i;?>_1_1_3">3</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_1_4" name="ans_1_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_1');" <?php if($ans_1=='4'){?>checked<?php }?> value="4">
                                                        <label for="ans<?php echo $i;?>_1_1_4">4</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_1_5" name="ans_1_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_1');" <?php if($ans_1=='5'){?>checked<?php }?> value="5">
                                                        <label for="ans<?php echo $i;?>_1_1_5">5</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_1_6" name="ans_1_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_1');" <?php if($ans_1=='6'){?>checked<?php }?> value="6">
                                                        <label for="ans<?php echo $i;?>_1_1_6">6</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_1_7" name="ans_1_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_1');" <?php if($ans_1=='7'){?>checked<?php }?> value="7">
                                                        <label for="ans<?php echo $i;?>_1_1_7">7</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_1_8" name="ans_1_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_1');" <?php if($ans_1=='8'){?>checked<?php }?> value="8">
                                                        <label for="ans<?php echo $i;?>_1_1_8">8</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_1_9" name="ans_1_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_1');" <?php if($ans_1=='9'){?>checked<?php }?> value="9">
                                                        <label for="ans<?php echo $i;?>_1_1_9">9</label>
                                                        <input type="radio" id="ans<?php echo $i;?>_1_1" name="ans_1_1[<?php echo $i;?>]" />

                                        </li>
                                        <li>
                                                <span id="append_<?php echo $i;?>_1_2" class="append"><?php  echo $ans_2;?></span>
                                                        <input type="radio" id="ans<?php echo $i;?>_1_2_0" name="ans_1_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_2');" <?php if($ans_2=='0'){?>checked<?php }?> value="0">
                                                        <label for="ans<?php echo $i;?>_1_2_0">0</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_2_1" name="ans_1_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_2');" <?php if($ans_2=='1'){?>checked<?php }?> value="1">
                                                        <label for="ans<?php echo $i;?>_1_2_1">1</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_2_2" name="ans_1_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_2');" <?php if($ans_2=='2'){?>checked<?php }?> value="2">
                                                        <label for="ans<?php echo $i;?>_1_2_2">2</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_2_3" name="ans_1_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_2');" <?php if($ans_2=='3'){?>checked<?php }?> value="3">
                                                        <label for="ans<?php echo $i;?>_1_2_3">3</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_2_4" name="ans_1_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_2');" <?php if($ans_2=='4'){?>checked<?php }?> value="4">
                                                        <label for="ans<?php echo $i;?>_1_2_4">4</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_2_5" name="ans_1_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_2');" <?php if($ans_2=='5'){?>checked<?php }?> value="5">
                                                        <label for="ans<?php echo $i;?>_1_2_5">5</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_2_6" name="ans_1_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_2');" <?php if($ans_2=='6'){?>checked<?php }?> value="6">
                                                        <label for="ans<?php echo $i;?>_1_2_6">6</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_2_7" name="ans_1_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_2');" <?php if($ans_2=='7'){?>checked<?php }?> value="7">
                                                        <label for="ans<?php echo $i;?>_1_2_7">7</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_2_8" name="ans_1_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_2');" <?php if($ans_2=='8'){?>checked<?php }?> value="8">
                                                        <label for="ans<?php echo $i;?>_1_2_8">8</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_2_9" name="ans_1_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_2');" <?php if($ans_2=='9'){?>checked<?php }?> value="9">
                                                        <label for="ans<?php echo $i;?>_1_2_9">9</label>
                                                        <input type="radio" id="ans<?php echo $i;?>_1_2" name="ans_1_2[<?php echo $i;?>]" />
                                        </li>
                                        <li>
                                                <span id="append_<?php echo $i;?>_1_3" class="append"><?php  echo $ans_3;?></span>
                                                        <input type="radio" id="ans<?php echo $i;?>_1_3_0" name="ans_1_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_3');" <?php if($ans_3=='A'){?>checked<?php }?> value="A">
                                                        <label for="ans<?php echo $i;?>_1_3_0">A</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_3_1" name="ans_1_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_3');" <?php if($ans_3=='B'){?>checked<?php }?> value="B">
                                                        <label for="ans<?php echo $i;?>_1_3_1">B</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_3_2" name="ans_1_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_3');" <?php if($ans_3=='C'){?>checked<?php }?> value="C">
                                                        <label for="ans<?php echo $i;?>_1_3_2">C</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_3_3" name="ans_1_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_3');" <?php if($ans_3=='D'){?>checked<?php }?> value="D">
                                                        <label for="ans<?php echo $i;?>_1_3_3">D</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_3_4" name="ans_1_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_3');" <?php if($ans_3=='E'){?>checked<?php }?> value="E">
                                                        <label for="ans<?php echo $i;?>_1_3_4">E</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_3_5" name="ans_1_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_3');" <?php if($ans_3=='F'){?>checked<?php }?> value="F">
                                                        <label for="ans<?php echo $i;?>_1_3_5">F</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_3_6" name="ans_1_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_3');" <?php if($ans_3=='G'){?>checked<?php }?> value="G">
                                                        <label for="ans<?php echo $i;?>_1_3_6">G</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_3_7" name="ans_1_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_3');" <?php if($ans_3=='H'){?>checked<?php }?> value="H">
                                                        <label for="ans<?php echo $i;?>_1_3_7">H</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_3_8" name="ans_1_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_3');" <?php if($ans_3=='I'){?>checked<?php }?> value="I">
                                                        <label for="ans<?php echo $i;?>_1_3_8">I</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_3_9" name="ans_1_3[<?=$i?>]" onClick="ClearForm7(<?=$i?>,'1');">
                                                        <label for="ans<?php echo $i;?>_1_3_9" title="ลบ" class="wrong">-</label>
                                        </li>
                                </ul>
                                <input type="hidden" name="ans_1[<?php echo $i;?>]" value=""/>
                        </li>
                        <li>
                                <span>คำตอบที่ 2</span>
                                <ul>
                                        <li>
                                                <span  id="append_<?php echo $i;?>_2_1" class="append"><?php  echo $ans_4;?></span>
                                                        <input type="radio" id="ans<?php echo $i;?>_2_1_0" name="ans_2_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_1');" <?php if($ans_4=='0'){?>checked<?php }?> value="0">
                                                        <label for="ans<?php echo $i;?>_2_1_0">0</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_1_1" name="ans_2_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_1');" <?php if($ans_4=='1'){?>checked<?php }?> value="1">
                                                        <label for="ans<?php echo $i;?>_2_1_1">1</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_1_2" name="ans_2_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_1');" <?php if($ans_4=='2'){?>checked<?php }?> value="2">
                                                        <label for="ans<?php echo $i;?>_2_1_2">2</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_1_3" name="ans_2_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_1');" <?php if($ans_4=='3'){?>checked<?php }?> value="3">
                                                        <label for="ans<?php echo $i;?>_2_1_3">3</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_1_4" name="ans_2_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_1');" <?php if($ans_4=='4'){?>checked<?php }?> value="4">
                                                        <label for="ans<?php echo $i;?>_2_1_4">4</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_1_5" name="ans_2_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_1');" <?php if($ans_4=='5'){?>checked<?php }?> value="5">
                                                        <label for="ans<?php echo $i;?>_2_1_5">5</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_1_6" name="ans_2_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_1');" <?php if($ans_4=='6'){?>checked<?php }?> value="6">
                                                        <label for="ans<?php echo $i;?>_2_1_6">6</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_1_7" name="ans_2_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_1');" <?php if($ans_4=='7'){?>checked<?php }?> value="7">
                                                        <label for="ans<?php echo $i;?>_2_1_7">7</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_1_8" name="ans_2_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_1');" <?php if($ans_4=='8'){?>checked<?php }?> value="8">
                                                        <label for="ans<?php echo $i;?>_2_1_8">8</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_1_9" name="ans_2_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_1');" <?php if($ans_4=='9'){?>checked<?php }?> value="9">
                                                        <label for="ans<?php echo $i;?>_2_1_9">9</label>
                                                        <input type="radio" id="ans<?php echo $i;?>_2_1" name="ans_2_1[<?php echo $i;?>]" />
                                        </li>
                                        <li>
                                                <span id="append_<?php echo $i;?>_2_2" class="append"><?php  echo $ans_5;?></span>
                                                        <input type="radio" id="ans<?php echo $i;?>_2_2_0" name="ans_2_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_2');" <?php if($ans_5=='0'){?>checked<?php }?> value="0">
                                                        <label for="ans<?php echo $i;?>_2_2_0">0</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_2_1" name="ans_2_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_2');" <?php if($ans_5=='1'){?>checked<?php }?> value="1">
                                                        <label for="ans<?php echo $i;?>_2_2_1">1</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_2_2" name="ans_2_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_2');" <?php if($ans_5=='2'){?>checked<?php }?> value="2">
                                                        <label for="ans<?php echo $i;?>_2_2_2">2</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_2_3" name="ans_2_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_2');" <?php if($ans_5=='3'){?>checked<?php }?> value="3">
                                                        <label for="ans<?php echo $i;?>_2_2_3">3</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_2_4" name="ans_2_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_2');" <?php if($ans_5=='4'){?>checked<?php }?> value="4">
                                                        <label for="ans<?php echo $i;?>_2_2_4">4</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_2_5" name="ans_2_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_2');" <?php if($ans_5=='5'){?>checked<?php }?> value="5">
                                                        <label for="ans<?php echo $i;?>_2_2_5">5</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_2_6" name="ans_2_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_2');" <?php if($ans_5=='6'){?>checked<?php }?> value="6">
                                                        <label for="ans<?php echo $i;?>_2_2_6">6</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_2_7" name="ans_2_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_2');" <?php if($ans_5=='7'){?>checked<?php }?> value="7">
                                                        <label for="ans<?php echo $i;?>_2_2_7">7</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_2_8" name="ans_2_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_2');" <?php if($ans_5=='8'){?>checked<?php }?> value="8">
                                                        <label for="ans<?php echo $i;?>_2_2_8">8</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_2_9" name="ans_2_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_2');" <?php if($ans_5=='9'){?>checked<?php }?> value="9">
                                                        <label for="ans<?php echo $i;?>_2_2_9">9</label>
                                                        <input type="radio" id="ans<?php echo $i;?>_2_2" name="ans_2_2[<?php echo $i;?>]" />
                                        </li>
                                        <li>
                                                <span id="append_<?php echo $i;?>_2_3" class="append"><?php  echo $ans_6;?></span>
                                                        <input type="radio" id="ans<?php echo $i;?>_2_3_0" name="ans_2_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_3');" <?php if($ans_6=='A'){?>checked<?php }?> value="A">
                                                        <label for="ans<?php echo $i;?>_2_3_0">A</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_3_1" name="ans_2_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_3');" <?php if($ans_6=='B'){?>checked<?php }?> value="B">
                                                        <label for="ans<?php echo $i;?>_2_3_1">B</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_3_2" name="ans_2_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_3');" <?php if($ans_6=='C'){?>checked<?php }?> value="C">
                                                        <label for="ans<?php echo $i;?>_2_3_2">C</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_3_3" name="ans_2_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_3');" <?php if($ans_6=='D'){?>checked<?php }?> value="D">
                                                        <label for="ans<?php echo $i;?>_2_3_3">D</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_3_4" name="ans_2_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_3');" <?php if($ans_6=='E'){?>checked<?php }?> value="E">
                                                        <label for="ans<?php echo $i;?>_2_3_4">E</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_3_5" name="ans_2_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_3');" <?php if($ans_6=='F'){?>checked<?php }?> value="F">
                                                        <label for="ans<?php echo $i;?>_2_3_5">F</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_3_6" name="ans_2_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_3');" <?php if($ans_6=='G'){?>checked<?php }?> value="G">
                                                        <label for="ans<?php echo $i;?>_2_3_6">G</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_3_7" name="ans_2_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_3');" <?php if($ans_6=='H'){?>checked<?php }?> value="H">
                                                        <label for="ans<?php echo $i;?>_2_3_7">H</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_3_8" name="ans_2_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_3');" <?php if($ans_6=='I'){?>checked<?php }?> value="I">
                                                        <label for="ans<?php echo $i;?>_2_3_8">I</label>

                                                        
                                                        <input type="radio" id="ans<?php echo $i;?>_2_3_9" name="ans_2_3[<?=$i?>]" onClick="ClearForm7(<?=$i?>,'2');">
                                                        <label for="ans<?php echo $i;?>_2_3_9" title="ลบ" class="wrong">-</label>
                                        </li>
                                </ul>
                                <input type="hidden" name="ans_2[<?php echo $i;?>]" value=""/>
                        </li>
                        <li>
                                <span>คำตอบที่ 3</span>
                                <ul>
                                        <li>
                                                <span id="append_<?php echo $i;?>_3_1" class="append"><?php  echo $ans_7;?></span>
                                                        <input type="radio" id="ans<?php echo $i;?>_3_1_0" name="ans_3_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_1');" <?php if($ans_7=='0'){?>checked<?php }?> value="0">
                                                        <label for="ans<?php echo $i;?>_3_1_0">0</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_1_1" name="ans_3_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_1');" <?php if($ans_7=='1'){?>checked<?php }?> value="1">
                                                        <label for="ans<?php echo $i;?>_3_1_1">1</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_1_2" name="ans_3_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_1');" <?php if($ans_7=='2'){?>checked<?php }?> value="2">
                                                        <label for="ans<?php echo $i;?>_3_1_2">2</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_1_3" name="ans_3_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_1');" <?php if($ans_7=='3'){?>checked<?php }?> value="3">
                                                        <label for="ans<?php echo $i;?>_3_1_3">3</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_1_4" name="ans_3_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_1');" <?php if($ans_7=='4'){?>checked<?php }?> value="4">
                                                        <label for="ans<?php echo $i;?>_3_1_4">4</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_1_5" name="ans_3_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_1');" <?php if($ans_7=='5'){?>checked<?php }?> value="5">
                                                        <label for="ans<?php echo $i;?>_3_1_5">5</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_1_6" name="ans_3_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_1');" <?php if($ans_7=='6'){?>checked<?php }?> value="6">
                                                        <label for="ans<?php echo $i;?>_3_1_6">6</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_1_7" name="ans_3_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_1');" <?php if($ans_7=='7'){?>checked<?php }?> value="7">
                                                        <label for="ans<?php echo $i;?>_3_1_7">7</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_1_8" name="ans_3_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_1');" <?php if($ans_7=='8'){?>checked<?php }?> value="8">
                                                        <label for="ans<?php echo $i;?>_3_1_8">8</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_1_9" name="ans_3_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_1');" <?php if($ans_7=='9'){?>checked<?php }?> value="9">
                                                        <label for="ans<?php echo $i;?>_3_1_9">9</label>
                                                        <input type="radio" id="ans<?php echo $i;?>_3_1" name="ans_3_1[<?php echo $i;?>]" />
                                        </li>
                                        <li>
                                                <span id="append_<?php echo $i;?>_3_2" class="append"><?php  echo $ans_8;?></span>
                                                        <input type="radio" id="ans<?php echo $i;?>_3_2_0" name="ans_3_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_2');" <?php if($ans_8=='0'){?>checked<?php }?> value="0">
                                                        <label for="ans<?php echo $i;?>_3_2_0">0</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_2_1" name="ans_3_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_2');" <?php if($ans_8=='1'){?>checked<?php }?> value="1">
                                                        <label for="ans<?php echo $i;?>_3_2_1">1</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_2_2" name="ans_3_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_2');" <?php if($ans_8=='2'){?>checked<?php }?> value="2">
                                                        <label for="ans<?php echo $i;?>_3_2_2">2</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_2_3" name="ans_3_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_2');" <?php if($ans_8=='3'){?>checked<?php }?> value="3">
                                                        <label for="ans<?php echo $i;?>_3_2_3">3</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_2_4" name="ans_3_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_2');" <?php if($ans_8=='4'){?>checked<?php }?> value="4">
                                                        <label for="ans<?php echo $i;?>_3_2_4">4</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_2_5" name="ans_3_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_2');" <?php if($ans_8=='5'){?>checked<?php }?> value="5">
                                                        <label for="ans<?php echo $i;?>_3_2_5">5</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_2_6" name="ans_3_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_2');" <?php if($ans_8=='6'){?>checked<?php }?> value="6">
                                                        <label for="ans<?php echo $i;?>_3_2_6">6</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_2_7" name="ans_3_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_2');" <?php if($ans_8=='7'){?>checked<?php }?> value="7">
                                                        <label for="ans<?php echo $i;?>_3_2_7">7</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_2_8" name="ans_3_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_2');" <?php if($ans_8=='8'){?>checked<?php }?> value="8">
                                                        <label for="ans<?php echo $i;?>_3_2_8">8</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_2_9" name="ans_3_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_2');" <?php if($ans_8=='9'){?>checked<?php }?> value="9">
                                                        <label for="ans<?php echo $i;?>_3_2_9">9</label>
                                                        <input type="radio" id="ans<?php echo $i;?>_3_2" name="ans_3_2[<?php echo $i;?>]" />
                                        </li>
                                        <li>
                                                <span id="append_<?php echo $i;?>_3_3" class="append"><?php  echo $ans_9;?></span>
                                                        <input type="radio" id="ans<?php echo $i;?>_3_3_0" name="ans_3_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_3');" <?php if($ans_9=='A'){?>checked<?php }?> value="A">
                                                        <label for="ans<?php echo $i;?>_3_3_0">A</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_3_1" name="ans_3_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_3');" <?php if($ans_9=='B'){?>checked<?php }?> value="B">
                                                        <label for="ans<?php echo $i;?>_3_3_1">B</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_3_2" name="ans_3_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_3');" <?php if($ans_9=='C'){?>checked<?php }?> value="C">
                                                        <label for="ans<?php echo $i;?>_3_3_2">C</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_3_3" name="ans_3_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_3');" <?php if($ans_9=='D'){?>checked<?php }?> value="D">
                                                        <label for="ans<?php echo $i;?>_3_3_3">D</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_3_4" name="ans_3_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_3');" <?php if($ans_9=='E'){?>checked<?php }?> value="E">
                                                        <label for="ans<?php echo $i;?>_3_3_4">E</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_3_5" name="ans_3_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_3');" <?php if($ans_9=='F'){?>checked<?php }?> value="F">
                                                        <label for="ans<?php echo $i;?>_3_3_5">F</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_3_6" name="ans_3_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_3');" <?php if($ans_9=='G'){?>checked<?php }?> value="G">
                                                        <label for="ans<?php echo $i;?>_3_3_6">G</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_3_7" name="ans_3_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_3');" <?php if($ans_9=='H'){?>checked<?php }?> value="H">
                                                        <label for="ans<?php echo $i;?>_3_3_7">H</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_3_8" name="ans_3_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_3');" <?php if($ans_9=='I'){?>checked<?php }?> value="I">
                                                        <label for="ans<?php echo $i;?>_3_3_8">I</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_3_9" name="ans_3_3[<?=$i?>]" onClick="ClearForm7(<?=$i?>,'3');">
                                                        <label for="ans<?php echo $i;?>_3_3_9" title="ลบ" class="wrong">-</label>
                                        </li>
                                </ul>
                                <input type="hidden" name="ans_3[<?php echo $i;?>]" value=""/>
                        </li>
                        <li>
                                <span>คำตอบที่ 4</span>
                                <ul>
                                        <li>
                                                <span id="append_<?php echo $i;?>_4_1" class="append"><?php  echo $ans_10;?></span>
                                                        <input type="radio" id="ans<?php echo $i;?>_4_1_0" name="ans_4_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_1');" <?php if($ans_10=='0'){?>checked<?php }?> value="0">
                                                        <label for="ans<?php echo $i;?>_4_1_0">0</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_1_1" name="ans_4_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_1');" <?php if($ans_10=='1'){?>checked<?php }?> value="1">
                                                        <label for="ans<?php echo $i;?>_4_1_1">1</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_1_2" name="ans_4_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_1');" <?php if($ans_10=='2'){?>checked<?php }?> value="2">
                                                        <label for="ans<?php echo $i;?>_4_1_2">2</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_1_3" name="ans_4_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_1');" <?php if($ans_10=='3'){?>checked<?php }?> value="3">
                                                        <label for="ans<?php echo $i;?>_4_1_3">3</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_1_4" name="ans_4_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_1');" <?php if($ans_10=='4'){?>checked<?php }?> value="4">
                                                        <label for="ans<?php echo $i;?>_4_1_4">4</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_1_5" name="ans_4_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_1');" <?php if($ans_10=='5'){?>checked<?php }?> value="5">
                                                        <label for="ans<?php echo $i;?>_4_1_5">5</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_1_6" name="ans_4_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_1');" <?php if($ans_10=='6'){?>checked<?php }?> value="6">
                                                        <label for="ans<?php echo $i;?>_4_1_6">6</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_1_7" name="ans_4_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_1');" <?php if($ans_10=='7'){?>checked<?php }?> value="7">
                                                        <label for="ans<?php echo $i;?>_4_1_7">7</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_1_8" name="ans_4_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_1');" <?php if($ans_10=='8'){?>checked<?php }?> value="8">
                                                        <label for="ans<?php echo $i;?>_4_1_8">8</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_1_9" name="ans_4_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_1');" <?php if($ans_10=='9'){?>checked<?php }?> value="9">
                                                        <label for="ans<?php echo $i;?>_4_1_9">9</label>
                                                        <input type="radio" id="ans<?php echo $i;?>_4_1" name="ans_4_1[<?php echo $i;?>]" />
                                        </li>
                                        <li>
                                                <span id="append_<?php echo $i;?>_4_2"  class="append"><?php  echo $ans_11;?></span>
                                                        <input type="radio" id="ans<?php echo $i;?>_4_2_0" name="ans_4_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_2');" <?php if($ans_11=='0'){?>checked<?php }?> value="0">
                                                        <label for="ans<?php echo $i;?>_4_2_0">0</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_2_1" name="ans_4_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_2');" <?php if($ans_11=='1'){?>checked<?php }?> value="1">
                                                        <label for="ans<?php echo $i;?>_4_2_1">1</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_2_2" name="ans_4_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_2');" <?php if($ans_11=='2'){?>checked<?php }?> value="2">
                                                        <label for="ans<?php echo $i;?>_4_2_2">2</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_2_3" name="ans_4_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_2');" <?php if($ans_11=='3'){?>checked<?php }?> value="3">
                                                        <label for="ans<?php echo $i;?>_4_2_3">3</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_2_4" name="ans_4_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_2');" <?php if($ans_11=='4'){?>checked<?php }?> value="4">
                                                        <label for="ans<?php echo $i;?>_4_2_4">4</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_2_5" name="ans_4_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_2');" <?php if($ans_11=='5'){?>checked<?php }?> value="5">
                                                        <label for="ans<?php echo $i;?>_4_2_5">5</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_2_6" name="ans_4_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_2');" <?php if($ans_11=='6'){?>checked<?php }?> value="6">
                                                        <label for="ans<?php echo $i;?>_4_2_6">6</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_2_7" name="ans_4_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_2');" <?php if($ans_11=='7'){?>checked<?php }?> value="7">
                                                        <label for="ans<?php echo $i;?>_4_2_7">7</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_2_8" name="ans_4_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_2');" <?php if($ans_11=='8'){?>checked<?php }?> value="8">
                                                        <label for="ans<?php echo $i;?>_4_2_8">8</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_2_9" name="ans_4_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_2');" <?php if($ans_11=='9'){?>checked<?php }?> value="9">
                                                        <label for="ans<?php echo $i;?>_4_2_9">9</label>
                                                        <input type="radio" id="ans<?php echo $i;?>_4_2" name="ans_4_2[<?php echo $i;?>]" />
                                        </li>
                                        <li>
                                                <span id="append_<?php echo $i;?>_4_3" class="append"><?php  echo $ans_12;?></span>
                                                        <input type="radio" id="ans<?php echo $i;?>_4_3_0" name="ans_4_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_3');" <?php if($ans_12=='A'){?>checked<?php }?> value="A">
                                                        <label for="ans<?php echo $i;?>_4_3_0">A</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_3_1" name="ans_4_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_3');" <?php if($ans_12=='B'){?>checked<?php }?> value="B">
                                                        <label for="ans<?php echo $i;?>_4_3_1">B</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_3_2" name="ans_4_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_3');" <?php if($ans_12=='C'){?>checked<?php }?> value="C">
                                                        <label for="ans<?php echo $i;?>_4_3_2">C</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_3_3" name="ans_4_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_3');" <?php if($ans_12=='D'){?>checked<?php }?> value="D">
                                                        <label for="ans<?php echo $i;?>_4_3_3">D</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_3_4" name="ans_4_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_3');" <?php if($ans_12=='E'){?>checked<?php }?> value="E">
                                                        <label for="ans<?php echo $i;?>_4_3_4">E</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_3_5" name="ans_4_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_3');" <?php if($ans_12=='F'){?>checked<?php }?> value="F">
                                                        <label for="ans<?php echo $i;?>_4_3_5">F</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_3_6" name="ans_4_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_3');" <?php if($ans_12=='G'){?>checked<?php }?> value="G">
                                                        <label for="ans<?php echo $i;?>_4_3_6">G</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_3_7" name="ans_4_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_3');" <?php if($ans_12=='H'){?>checked<?php }?> value="H">
                                                        <label for="ans<?php echo $i;?>_4_3_7">H</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_3_8" name="ans_4_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_3');" <?php if($ans_12=='I'){?>checked<?php }?> value="I">
                                                        <label for="ans<?php echo $i;?>_4_3_8">I</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_3_9" name="ans_4_3[<?=$i?>]" onClick="ClearForm7(<?=$i?>,'4');">
                                                        <label for="ans<?php echo $i;?>_4_3_9" title="ลบ" class="wrong">-</label>
                                        </li>
                                </ul>
                                <input type="hidden" name="ans_4[<?php echo $i;?>]" value=""/>
                        </li>
                    </ul>
                    <input type="hidden" name="ans[<?php echo $i;?>]" value="">
                    <input type="hidden" name="session_id[<?php echo $i;?>]" value="<?php echo $session_id;?>"/>
                    <input type="hidden" name="session_type7" value="7"/>
            </li>
            <?php } ?>
        </ul>

    </div>
</div>
