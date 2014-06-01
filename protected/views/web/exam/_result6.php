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
                    $selected = Testing::model()->getSelectedByRecord($test_record_id, $i);
                    $answer = Answer::model()->getAnswerBySession($session['session_id'], $i);
                    $class = $selected==$answer?'class="right"':'class="wrong"';
                    
                   /* Change definition of type 6 by Yong:  if(is_array($test)){
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
                    }*/
            ?>
            <li>
                    <span><?php echo $i;?></span>
                    <ul>
                            <li>
                                    <span>A</span>
                                            <input type="radio" id="ans<?php echo $i;?>_A_1" <?php if($selected=='A1'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_A_1" <?php if($answer=='A1') echo $class;?> >1</label>

                                            <input type="radio" id="ans<?php echo $i;?>_A_2" <?php if($selected=='A2'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_A_2" <?php if($answer=='A2') echo $class;?> >2</label>

                                            <input type="radio" id="ans<?php echo $i;?>_A_3" <?php if($selected=='A3'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_A_3" <?php if($answer=='A3') echo $class;?> >3</label>

                                            <input type="radio" id="ans<?php echo $i;?>_A_4" <?php if($selected=='A4'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_A_4" <?php if($answer=='A4') echo $class;?> >4</label>
                            </li>
                            <li>
                                    <span>B</span>
                                            <input type="radio" id="ans<?php echo $i;?>_B_1" <?php if($selected=='B1'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_B_1" <?php if($answer=='B1') echo $class;?> >1</label>

                                            <input type="radio" id="ans<?php echo $i;?>_B_2" <?php if($selected=='B2'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_B_2" <?php if($answer=='B2') echo $class;?> >2</label>

                                            <input type="radio" id="ans<?php echo $i;?>_B_3" <?php if($selected=='B3'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_B_3" <?php if($answer=='B3') echo $class;?> >3</label>

                                            <input type="radio" id="ans<?php echo $i;?>_B_4" <?php if($selected=='B4'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_B_4" <?php if($answer=='B4') echo $class;?> >4</label>
                            </li>
                            <li>
                                    <span>C</span>
                                            <input type="radio" id="ans<?php echo $i;?>_C_1" <?php if($selected=='C1'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_C_1" <?php if($answer=='C1') echo $class;?> >1</label>

                                            <input type="radio" id="ans<?php echo $i;?>_C_2" <?php if($selected=='C2'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_C_2" <?php if($answer=='C2') echo $class;?> >2</label>

                                            <input type="radio" id="ans<?php echo $i;?>_C_3" <?php if($selected=='C3'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_C_3" <?php if($answer=='C3') echo $class;?> >3</label>

                                            <input type="radio" id="ans<?php echo $i;?>_C_4" <?php if($selected=='C4'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_C_4" <?php if($answer=='C4') echo $class;?> >4</label>
                            </li>
                            <li>
                                    <span>D</span>
                                            <input type="radio" id="ans<?php echo $i;?>_D_1" <?php if($selected=='D1'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_D_1" <?php if($answer=='D1') echo $class;?> >1</label>

                                            <input type="radio" id="ans<?php echo $i;?>_D_2" <?php if($selected=='D2'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_D_2" <?php if($answer=='D2') echo $class;?> >2</label>

                                            <input type="radio" id="ans<?php echo $i;?>_D_3" <?php if($selected=='D3'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_D_3" <?php if($answer=='D3') echo $class;?> >3</label>

                                            <input type="radio" id="ans<?php echo $i;?>_D_4" <?php if($selected=='D4'){?>checked<?php }?> disabled>
                                            <label for="ans<?php echo $i;?>_D_4" <?php if($answer=='D4') echo $class;?> >4</label>
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
