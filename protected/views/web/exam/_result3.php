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
    <div class="answer_content form_3">
        <?php
            $session_id = $answer['session_id'];
            $start = $answer['session_start'];
            $end = $answer['session_end'];
            $order = $answer['session_order'];
    ?>
    <ul>

        <?php $enable = $session['session_status'] == 1; //Enable to show the answer
            if ($enable) {
                for ($i = $start; $i <= $end; $i++) {
                    $test['selected'] = Testing::model()->getSelectedByRecord($test_record_id, $i);
                    $test['answer'] = Answer::model()->getAnswerBySession($session['session_id'], $i);
                    ?>
            <li>
                   <span><?php echo $i;?></span>
                   <input type="radio" id="ans<?php echo $i;?>_1" name="ans[<?php echo $i;?>]" value="1" <?php if($test['selected']=='1'){?>checked<?php }?> disabled/>
                   <label for="ans<?php echo $i;?>_1"
                    <?php if(($test['answer']==$test['selected'])&&($test['answer']=='1')){?>
                          class="right"
                    <?php }else if(($test['answer']!=$test['selected'])&&($test['answer']=='1')){?>
                          class="wrong"
                    <?php }?>
                          >1</label>

                   <input type="radio" id="ans<?php echo $i;?>_2" name="ans[<?php echo $i;?>]" value="2" <?php if($test['selected']=='2'){?>checked<?php }?> disabled/>
                   <label for="ans<?php echo $i;?>_2"
                    <?php if(($test['answer']==$test['selected'])&&($test['answer']=='2')){?>
                           class="right"
                    <?php }else if(($test['answer']!=$test['selected'])&&($test['answer']=='2')){?>
                           class="wrong"
                    <?php }?>
                          >2</label>

                   <input type="radio" id="ans<?php echo $i;?>_3" name="ans[<?php echo $i;?>]" value="3" <?php if($test['selected']=='3'){?>checked<?php }?> disabled/>
                   <label for="ans<?php echo $i;?>_3"
                    <?php if(($test['answer']==$test['selected'])&&($test['answer']=='3')){?>
                           class="right"
                    <?php }else if(($test['answer']!=$test['selected'])&&($test['answer']=='3')){?>
                           class="wrong"
                    <?php }?>
                          >3</label>

                   <input type="radio" id="ans<?php echo $i;?>_4" name="ans[<?php echo $i;?>]" value="4" <?php if($test['selected']=='4'){?>checked<?php }?> disabled/>
                   <label for="ans<?php echo $i;?>_4"
                   <?php if(($test['answer']==$test['selected'])&&($test['answer']=='4')){?>
                         class="right"
                   <?php }else if(($test['answer']!=$test['selected'])&&($test['answer']=='4')){?>
                        class="wrong"
                   <?php }?>
                          >4</label>

                   <input type="radio" id="ans<?php echo $i;?>_5" name="ans[<?php echo $i;?>]" value="5" <?php if($test['selected']=='5'){?>checked<?php }?> disabled/>
                   <label for="ans<?php echo $i;?>_5"
                   <?php if(($test['answer']==$test['selected'])&&($test['answer']=='5')){?>
                         class="right"
                   <?php }else if(($test['answer']!=$test['selected'])&&($test['answer']=='5')){?>
                        class="wrong"
                   <?php }?>
                          >5</label>

                   <input type="radio" id="ans<?php echo $i;?>_6" name="ans[<?php echo $i;?>]" value="6" <?php if($test['selected']=='6'){?>checked<?php }?> disabled/>
                   <label for="ans<?php echo $i;?>_6"
                   <?php if(($test['answer']==$test['selected'])&&($test['answer']=='6')){?>
                         class="right"
                   <?php }else if(($test['answer']!=$test['selected'])&&($test['answer']=='6')){?>
                        class="wrong"
                   <?php }?>
                          >6</label>

                   <input type="hidden" name="session_id[<?php echo $i;?>]" value="<?php echo $session_id;?>"/>

            </li>
            <?php }} ?>
        </ul>
    </div>
</div>
