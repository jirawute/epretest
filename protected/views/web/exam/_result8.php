<div id="answer_sheet_<?php echo $session['session_order']; ?>" <?php if ($key_ans != 0) { ?>style="display:none"<?php } ?>>
    <div class="answer_top">
        <div class="header_left">
            <!-- if has link <a href="#"></a> -->
            <?php if ($key_ans != 0) { ?>
                <a title="ไปตอนที่ <?php echo $session['session_order'] - 1; ?>" href="javascript:show_prev('<?php echo $session['session_order']; ?>');"></a>
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
                <a title="ไปตอนที่ <?php echo $session['session_order'] + 1; ?>" href="javascript:show_next('<?php echo $session['session_order']; ?>');"></a>
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

                <?php
                $enable = $session['session_status'] == 1; //Enable to show the answer
                if ($enable) {
                    for ($i = $start; $i <= $end; $i++) {
                        $test['selected'] = Testing::model()->getSelectedByRecord($test_record_id, $i);
                        $test['answer'] = Answer::model()->getAnswerBySession($session['session_id'], $i);
                        $isCorrect = false;

                        $selected = strtolower(trim($test['selected']));
                        $answer = strtolower(trim($test['answer']));
                        if ($test['selected']) {
                            $isCorrect = strpos(" " . $answer, $selected);
                        }
                        if (!$isCorrect) {
                            $style = "border:2px solid red";
                        } else {
                            $style = "border:2px solid green";
                        }
                        ?>
                        <li>
                            <span><?php echo $i; ?></span>
                            <input style="<?php echo $style; ?>" type="text" id="ans<?php echo $i; ?>_1" name="ans[<?php echo $i; ?>]" readonly   maxlength="30" value="<?php echo $selected; ?>">
                            <font color="red !important"><?php
                            if (!$isCorrect) {
                                echo $answer;
                            }
                            ?></font>

                        </li>
                    <?php
                    }
                }
                ?>
            </ul>
    </div>
</div>