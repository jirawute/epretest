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
<div class="answer_content form_4">
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
                    

                    if($test['selected']){
                    $value1 = floor( $test['selected']);
                    $value2 =  $test['selected']*100%100;
                    }
                    if($test['answer']!=$test['selected']){
                        $style="border:2px solid red";
                    }else {
                        $style="border:2px solid green";
                    }
                ?>
                <li>
                        <span><?php echo $i;?></span>
                        <input class="number_4" style="<?php echo $style;?>" type="text" id="ans<?php echo $i;?>_1" name="ans1[<?php echo $i;?>]" readonly  placeholder="0000" maxlength="4" value="<?php if(isset($value1)) echo $value1;?>">.
                        <input class="number_2" style="<?php echo $style;?>" type="text" id="ans<?php echo $i;?>_2" name="ans2[<?php echo $i;?>]" readonly  placeholder="00" maxlength="2" value="<?php if(isset($value2)) echo $value2;?>"> 
                        <font color="red !important"><?php  if($test['answer']!=$test['selected']){echo $test['answer'];}?>        </font>                
                        <input type="hidden" name="ans[<?php echo $i;?>]" value="<?php if(isset($test['selected'])) echo $test['selected'];?>">
                        <input type="hidden" name="session_id[<?php echo $i;?>]" value="<?php echo $session_id;?>"/>
                        <input type="hidden" name="session_type" value="4"/>
                        
                </li>
            <?php } }?>
        </ul>
</div>
</div>