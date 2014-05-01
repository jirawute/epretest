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
    <div class="answer_content form_7">
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
                        
                        $answer_1 = substr($test['answer'],0,1);
                        $answer_2 = substr($test['answer'],1,1);
                        $answer_3 = substr($test['answer'],2,1);
                        $answer_4 = substr($test['answer'],3,1);
                        $answer_5 = substr($test['answer'],4,1);
                        $answer_6 = substr($test['answer'],5,1);
                        $answer_7 = substr($test['answer'],6,1);
                        $answer_8 = substr($test['answer'],7,1);
                        $answer_9 = substr($test['answer'],8,1);
                        $answer_10 = substr($test['answer'],9,1);
                        $answer_11 = substr($test['answer'],10,1);
                        $answer_12 = substr($test['answer'],11,1);


                    }else{

                        $answer_1 = '';
                        $answer_2 = '';
                        $answer_3 = '';
                        $answer_4 = '';
                        $answer_5 = '';
                        $answer_6 = '';
                        $answer_7 = '';
                        $answer_8 = '';
                        $answer_9 = '';
                        $answer_10 = '';
                        $answer_11 = '';
                        $answer_12 = '';
                    }
            ?>
            <li>
                    <span><?php echo $i;?></span>
                    <ul>
                        <li>
                                <span>คำตอบที่ 1</span>
                                <ul>
                                        <li>
                                            <span id="append_<?php echo $i;?>_1_1" class="append"><?php echo $answer_1;?></span>                                                      
                                        </li>
                                        <li>
                                            <span id="append_<?php echo $i;?>_1_2" class="append"><?php  echo $answer_2;?></span>
                                        </li>
                                        <li>
                                            <span id="append_<?php echo $i;?>_1_3" class="append"><?php  echo $answer_3;?></span>
                                        </li>
                                </ul>
                                <input type="hidden" name="ans_1[<?php echo $i;?>]" value=""/>
                        </li>
                        <li>
                                <span>คำตอบที่ 2</span>
                                <ul>
                                        <li>
                                                <span  id="append_<?php echo $i;?>_2_1" class="append"><?php  echo $answer_4;?></span>
                                        </li>
                                        <li>
                                                <span id="append_<?php echo $i;?>_2_2" class="append"><?php  echo $answer_5;?></span>
                                        </li>
                                        <li>
                                                <span id="append_<?php echo $i;?>_2_3" class="append"><?php  echo $answer_6;?></span>
                                        </li>
                                </ul>
                                <input type="hidden" name="ans_2[<?php echo $i;?>]" value=""/>
                        </li>
                        <li>
                                <span>คำตอบที่ 3</span>
                                <ul>
                                        <li>
                                                <span id="append_<?php echo $i;?>_3_1" class="append"><?php  echo $answer_7;?></span>
                                        </li>
                                        <li>
                                                <span id="append_<?php echo $i;?>_3_2" class="append"><?php  echo $answer_8;?></span>
                                        </li>
                                        <li>
                                                <span id="append_<?php echo $i;?>_3_3" class="append"><?php  echo $answer_9;?></span>
                                        </li>
                                </ul>
                                <input type="hidden" name="ans_3[<?php echo $i;?>]" value=""/>
                        </li>
                        <li>
                                <span>คำตอบที่ 4</span>
                                <ul>
                                        <li>
                                                <span id="append_<?php echo $i;?>_4_1" class="append"><?php  echo $answer_10;?></span>
                                        </li>
                                        <li>
                                                <span id="append_<?php echo $i;?>_4_2" class="append"><?php  echo $answer_11;?></span>
                                        </li>
                                        <li>
                                                <span id="append_<?php echo $i;?>_4_3" class="append"><?php  echo $answer_12;?></span>
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
