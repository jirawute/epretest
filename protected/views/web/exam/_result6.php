<div id="answer_sheet_<?php echo $session['session_order'];?>" <?php if($key_ans!=0){?>style="display:none"<?php }?>>
    <div class="answer_top">
        <div class="header_left">
            <!-- if has link <a href="#"></a> -->
            <?php if ($key_ans != 0) { ?>
                <a title="ไปตอนที่ <?php echo $session['session_order']-1;?>" href="javascript:show_prev('<?php echo $session['session_order']; ?>');"></a>
            <?php } else { ?>
                <span>inactive</span>
            <?php } ?>
    <!--<span>inactive</span>-->
        </div>
        <div class="header_center">
            <h2 class="has_multiple">กระดาษคำตอบ</h2>
            <h3>ตอนที่ <?php echo $session['session_order']; ?></h3>
        </div>
        <div class="header_right">
            <?php if ($last_key != $key_ans) { ?>
                <a title="ไปตอนที่ <?php echo $session['session_order']+1;?>" href="javascript:show_next('<?php echo $session['session_order']; ?>');"></a>
            <?php } else { ?>
                <span>inactive</span>
            <?php } ?>
        </div>
    </div>
    <div class="answer_content form_5">
        <ul>
            <?php
                    $session_id = $session['session_id'];
                    $session_type = $session['answer_type_id'];
                    $start = $session['session_start'];
                    $end = $session['session_end'];
                    $order = $session['session_order'];
    ?>
    <ul>

        <?php $enable = $session['session_status'] == 1; //Enable to show the answer
            if ($enable) {
                for ($i = $start; $i <= $end; $i++) {
                    $test['selected'] = Testing::model()->getSelectedByRecord($test_record_id, $i);
                    $test['answer'] = Answer::model()->getAnswerBySession($session['session_id'], $i);
                    
                    if(is_array($test)){
                        $valueA = substr($test['selected'],0,2);
                        $valueB = substr($test['selected'],2,2);
                        $valueC = substr($test['selected'],4,2);
                        $valueD = substr($test['selected'],6,2);
                        
                        $answerA = substr($test['answer'],0,2);
                        $answerB = substr($test['answer'],2,2);
                        $answerC = substr($test['answer'],4,2);
                        $answerD = substr($test['answer'],6,2);
                    }else{
                        $valueA = '';
                        $valueB = '';
                        $valueC = '';
                        $valueD = '';

                        $answerA = '';
                        $answerB = '';
                        $answerC = '';
                        $answerD = '';
                    }
            ?>
            <li>
                    <span><?php echo $i;?></span>
                    <ul>
                            <li>
                                    <span>A</span>
                                            <input type="radio" id="ans<?php echo $i;?>_A_1" name="ans6A[<?php echo $i;?>]" value="A1" <?php if($valueA=='A1'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_A_1"
                                                   <?php if(($answerA==$valueA)&&($answerA=='A1')){?>
                                                          class="right"
                                                   <?php }else if(($answerA!=$valueA)&&($answerA=='A1')){?>
                                                          class="wrong"
                                                   <?php }?>
                                                   >1</label>

                                            <input type="radio" id="ans<?php echo $i;?>_A_2" name="ans6A[<?php echo $i;?>]" value="A2" <?php if($valueA=='A2'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_A_2"
                                                   <?php if(($answerA==$valueA)&&($answerA=='A2')){?>
                                                          class="right"
                                                   <?php }else if(($answerA!=$valueA)&&($answerA=='A2')){?>
                                                          class="wrong"
                                                   <?php }?>
                                                   >2</label>

                                            <input type="radio" id="ans<?php echo $i;?>_A_3" name="ans6A[<?php echo $i;?>]" value="A3" <?php if($valueA=='A3'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_A_3"
                                                   <?php if(($answerA==$valueA)&&($answerA=='A3')){?>
                                                          class="right"
                                                   <?php }else if(($answerA!=$valueA)&&($answerA=='A3')){?>
                                                          class="wrong"
                                                   <?php }?>
                                                   >3</label>

                                            <input type="radio" id="ans<?php echo $i;?>_A_4" name="ans6A[<?php echo $i;?>]" value="A4" <?php if($valueA=='A4'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_A_4"
                                                   <?php if(($answerA==$valueA)&&($answerA=='A4')){?>
                                                          class="right"
                                                   <?php }else if(($answerA!=$valueA)&&($answerA=='A4')){?>
                                                          class="wrong"
                                                   <?php }?>

                                                   >4</label>
                            </li>
                            <li>
                                    <span>B</span>
                                            <input type="radio" id="ans<?php echo $i;?>_B_1" name="ans6B[<?php echo $i;?>]" value="B1" <?php if($valueB=='B1'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_B_1"
                                                   <?php if(($answerB==$valueB)&&($answerB=='B1')){?>
                                                          class="right"
                                                   <?php }else if(($answerB!=$valueB)&&($answerB=='B1')){?>
                                                          class="wrong"
                                                   <?php }?>
                                                          >1</label>

                                            <input type="radio" id="ans<?php echo $i;?>_B_2" name="ans6B[<?php echo $i;?>]" value="B2" <?php if($valueB=='B2'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_B_2"
                                                   <?php if(($answerB==$valueB)&&($answerB=='B2')){?>
                                                          class="right"
                                                   <?php }else if(($answerB!=$valueB)&&($answerB=='B2')){?>
                                                          class="wrong"
                                                   <?php }?>
                                                   >2</label>

                                            <input type="radio" id="ans<?php echo $i;?>_B_3" name="ans6B[<?php echo $i;?>]" value="B3" <?php if($valueB=='B3'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_B_3"
                                                   <?php if(($answerB==$valueB)&&($answerB=='B3')){?>
                                                          class="right"
                                                   <?php }else if(($answerB!=$valueB)&&($answerB=='B3')){?>
                                                          class="wrong"
                                                   <?php }?>
                                                   >3</label>

                                            <input type="radio" id="ans<?php echo $i;?>_B_4" name="ans6B[<?php echo $i;?>]" value="B4" <?php if($valueB=='B4'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_B_4"
                                                   <?php if(($answerB==$valueB)&&($answerB=='B4')){?>
                                                          class="right"
                                                   <?php }else if(($answerB!=$valueA)&&($answerB=='B4')){?>
                                                          class="wrong"
                                                   <?php }?>
                                                          >4</label>
                            </li>
                            <li>
                                    <span>C</span>
                                            <input type="radio" id="ans<?php echo $i;?>_C_1" name="ans6C[<?php echo $i;?>]" value="C1" <?php if($valueC=='C1'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_C_1"
                                                   <?php if(($answerC==$valueC)&&($answerC=='C1')){?>
                                                          class="right"
                                                   <?php }else if(($answerC!=$valueC)&&($answerC=='C1')){?>
                                                          class="wrong"
                                                   <?php }?>
                                                   >1</label>

                                            <input type="radio" id="ans<?php echo $i;?>_C_2" name="ans6C[<?php echo $i;?>]" value="C2" <?php if($valueC=='C2'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_C_2"
                                                   <?php if(($answerC==$valueC)&&($answerC=='C2')){?>
                                                          class="right"
                                                   <?php }else if(($answerC!=$valueC)&&($answerC=='C2')){?>
                                                          class="wrong"
                                                   <?php }?>
                                                          >2</label>

                                            <input type="radio" id="ans<?php echo $i;?>_C_3" name="ans6C[<?php echo $i;?>]" value="C3" <?php if($valueC=='C3'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_C_3"
                                                   <?php if(($answerC==$valueC)&&($answerC=='C3')){?>
                                                          class="right"
                                                   <?php }else if(($answerC!=$valueC)&&($answerC=='C3')){?>
                                                          class="wrong"
                                                   <?php }?>
                                                   >3</label>

                                            <input type="radio" id="ans<?php echo $i;?>_C_4" name="ans6C[<?php echo $i;?>]" value="C4" <?php if($valueC=='C4'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_C_4"
                                                   <?php if(($answerC==$valueC)&&($answerC=='C4')){?>
                                                          class="right"
                                                   <?php }else if(($answerC!=$valueC)&&($answerC=='C4')){?>
                                                          class="wrong"
                                                   <?php }?>
                                                   >4</label>
                            </li>
                            <li>
                                    <span>D</span>
                                            <input type="radio" id="ans<?php echo $i;?>_D_1" name="ans6D[<?php echo $i;?>]" value="D1" <?php if($valueD=='D1'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_D_1"
                                                   <?php if(($answerD==$valueD)&&($answerD=='D1')){?>
                                                          class="right"
                                                   <?php }else if(($answerD!=$valueD)&&($answerD=='D1')){?>
                                                          class="wrong"
                                                   <?php }?>
                                                   >1</label>

                                            <input type="radio" id="ans<?php echo $i;?>_D_2" name="ans6D[<?php echo $i;?>]" value="D2" <?php if($valueD=='D2'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_D_2"
                                                   <?php if(($answerD==$valueD)&&($answerD=='D2')){?>
                                                          class="right"
                                                   <?php }else if(($answerD!=$valueD)&&($answerD=='D2')){?>
                                                          class="wrong"
                                                   <?php }?>
                                                   >2</label>

                                            <input type="radio" id="ans<?php echo $i;?>_D_3" name="ans6D[<?php echo $i;?>]" value="D3" <?php if($valueD=='D3'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_D_3"
                                                   <?php if(($answerD==$valueD)&&($answerD=='D3')){?>
                                                          class="right"
                                                   <?php }else if(($answerD!=$valueD)&&($answerD=='D3')){?>
                                                          class="wrong"
                                                   <?php }?>
                                                   >3</label>

                                            <input type="radio" id="ans<?php echo $i;?>_D_4" name="ans6D[<?php echo $i;?>]" value="D4" <?php if($valueD=='D4'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_D_4"
                                                   <?php if(($answerD==$valueD)&&($answerD=='D4')){?>
                                                          class="right"
                                                   <?php }else if(($answerD!=$valueD)&&($answerD=='D4')){?>
                                                          class="wrong"
                                                   <?php }?>
                                                   >4</label>
                            </li>
                    </ul>
                    <input type="hidden" name="ans[<?php echo $i;?>]" value="">
                    <input type="hidden" name="session_id[<?php echo $i;?>]" value="<?php echo $session_id;?>"/>
                    <input type="hidden" name="session_type6" value="6"/>
            </li>
            <?php }} ?>
        </ul>
    </div>
</div>
