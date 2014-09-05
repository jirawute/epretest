<?
//session_start();
//session_register("chk_play");
?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
    function show_next(order) {

        var next = parseInt(order) + 1;
        document.getElementById('answer_sheet_' + order).style.display = "none";
        document.getElementById('answer_sheet_' + next).style.display = "";
    }
    function show_prev(order) {

        var prev = parseInt(order) - 1;
        document.getElementById('answer_sheet_' + order).style.display = "none";
        document.getElementById('answer_sheet_' + prev).style.display = "";
    }
    function checkNumberFormat(testValue) {
        data = testValue.value.replace(/\s+/g, '');
        if (data.length > 0) {
            var arr = data.split('.');
            for (var sin = 0; sin < data.length; sin++) {
                ch = data.charAt(sin);
                if (ch != '.') {
                    ch = isNaN(ch);
                    if (ch) {
                        data = data.substr(0, sin);
                        break;
                    }
                }
            }
            testValue.value = data;
        }
    }
    function checkNumberFormatFloat(testValue, i) {
        var data = testValue.value;
        var new_data = data;
        if (data.length < i) {

            for (var sin = data.length; sin < i; sin++) {

                if (i == 4) {
                    new_data = "0" + new_data;
                } else if (i == 2) {
                    new_data = new_data + "0";
                }

            }
            testValue.value = new_data;
        }
    }
</script>
<script>
    $(function() {
        $(document).tooltip();
    });</script>

<script type="text/javascript" src='http://www.scribd.com/javascripts/scribd_api.js'></script>

<script type="text/javascript">

    function showPDF() { cinterval = setInterval('time_dec()', 1000);//for offline
        $("#loading").show();
        
        var doc_id = '<?php echo $exam_info['exam_doc_id'];?>';
        var access_key = '<?php echo $exam_info['exam_access_key'] ?>';
        if (doc_id === '') {
            alert("Need to be fixed");
            //  var url = 'http://www.e-pretest.com/uploads/pdf/<?php echo $exam_info['exam_file'] ?>';
            //  var pub_id = 'pub-87933716448539829813621125';
            //var scribd_doc = scribd.Document.getDocFromUrl(url, pub_id);
        } else {
            var scribd_doc = scribd.Document.getDoc(doc_id, access_key);
        }
        var onDocReady = function(e) {
            $("#loading").hide(1000);
            cinterval = setInterval('time_dec()', 1000);
        };
        scribd_doc.addEventListener('docReady', onDocReady);
        scribd_doc.addParam('jsapi_version', 2);
        var h1 = $('#answer_sheet').height();
        scribd_doc.addParam('height', 475);
        scribd_doc.addParam('width', 640);
        scribd_doc.addParam('public', false);
        scribd_doc.addParam('mode', 'list');  // only 'list', 'slideshow' support HTML5
        scribd_doc.addParam('extension', 'pdf');
        scribd_doc.addParam('title', 'Yong');
        scribd_doc.write('embedded_doc');

    }
</script>
<style>
    label {
        display: inline-block;
        width: 5em;
    }
    img.center {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
</style>
<div class="test_box">
    <div class="question" onmousedown="return false" ><!--lock whole sheet to prevent copy-->
        <div class="question_top">
            <?php
            if ($exam_info['exam_type'] == 'Exam') {
                $exam_type = 'ข้อสอบ';
            } else {
                $exam_type = 'แบบฝึกหัด';
            }
            ?>
            <h2>ชุด<?php echo $exam_type; ?>วิชา<?php echo $exam_info['subject_name']; ?></h2>

            <h3><?php echo $exam_info['name']; ?></h3>
        </div>
        <!--div class="question_content" style="position:absolute"  >
            <div style="position: absolute;width: 640px;height: 30px;background: #F5F5F5;z-index: 100;left: 0px;"></div>
             <!--iframe  id="iframe" class="pdfviewer" src="http://www.e-pretest.com/uploads/pdf/<?= $exam_info['exam_file'] ?>" width="640px" height="100%" frameborder="0"></iframe>
            <div id='embedded_doc' ></div>
        </div-->
        <?php if (Yii::app()->user->getState('isOffline')) { ?>
            <object class = "question_content" data="uploads/pdf/<?= $exam_info['exam_file'] ?>" type="application/pdf" width="100%" height="100%">

                <p>It appears you don't have a PDF plugin for this browser.</p>

            </object>
        <?php } else { ?>
            <div  id ="loading"style="display:none; position: absolute;width: 640px;background: #F5F5F5;z-index: 100;">
                <img src="./images/web/loading1.gif"  class="center" onclick="location.reload();"alt="Be patient..." />
            </div>
            <div class="question_content"  id='embedded_doc' style="position: absolute;">
            </div>
        <?php } ?>

    </div>
    <form name="ExamForm"onsubmit="return confirm('ต้องการส่งคำตอบ?');" method="post" action="index.php?r=exam/submit&id=<?php echo $exam_info['exam_id']; ?>">
        <input type="hidden" name="ExamForm[exam_id]" value="<?php echo $exam_info['exam_id']; ?>"/>
        <input type="hidden" name="ExamForm[student_id]" value="<?php echo Yii::app()->user->id; ?>"/>
        <input type="hidden" name="ExamForm[score]" value="00.00"/>
        <input type="hidden" name="ExamForm[elapse_time]" id="elapse_time" value="0" /><!--set to default - > will be used to identify if this test is shared on FB-->
        <input type="hidden" name="ExamForm[status]" value="1"/>
        <div class="answer" id="answer_sheet">
            <?php
//            $num_row = count($count_selected);
//            echo $num_row;
            $num_rec = count($session_list);
            //find last key
            if ($num_rec == 0) {
                $last_key = 0;
            } else {
                $last_key = $num_rec - 1;
            }
            if (count($session_list) != 0) {

                foreach ($session_list as $key_ans => $answer) {
                    switch ($answer['answer_type_id']) {
                        case 1:
                            echo $this->renderPartial('_form1', array('answer' => $answer, 'key_ans' => $key_ans, 'last_key' => $last_key, 'exam_id' => $exam_info['exam_id']));
                            break;
                        case 2:
                            echo $this->renderPartial('_form2', array('answer' => $answer, 'key_ans' => $key_ans, 'last_key' => $last_key, 'exam_id' => $exam_info['exam_id']));
                            break;
                        case 3:
                            echo $this->renderPartial('_form3', array('answer' => $answer, 'key_ans' => $key_ans, 'last_key' => $last_key, 'exam_id' => $exam_info['exam_id']));
                            break;
                        case 4:
                            echo $this->renderPartial('_form4', array('answer' => $answer, 'key_ans' => $key_ans, 'last_key' => $last_key, 'exam_id' => $exam_info['exam_id']));
                            break;
                        case 5:
                            echo $this->renderPartial('_form5', array('answer' => $answer, 'key_ans' => $key_ans, 'last_key' => $last_key, 'exam_id' => $exam_info['exam_id']));
                            break;
                        case 6:
                            echo $this->renderPartial('_form6', array('answer' => $answer, 'key_ans' => $key_ans, 'last_key' => $last_key, 'exam_id' => $exam_info['exam_id']));
                            break;
                        case 7:
                            echo $this->renderPartial('_form7', array('answer' => $answer, 'key_ans' => $key_ans, 'last_key' => $last_key, 'exam_id' => $exam_info['exam_id']));
                            break;
                        case 8:
                            echo $this->renderPartial('_form8', array('answer' => $answer, 'key_ans' => $key_ans, 'last_key' => $last_key, 'exam_id' => $exam_info['exam_id']));
                            break;
                        default:
                            echo $this->renderPartial('_form0');
                    }
                }//end foreach
            } else {
                echo $this->renderPartial('_form0');
            }
            ?>
            <div class="answer_bottom" >
                <input id="saveBtn" type="button" value="บันทึก" class="save_button" onClick="saveThisForm();" title="บันทึกคำตอบระหว่างทำข้อสอบ">
                <input id="submitBtn" type="submit" value="ส่งคำตอบ" class="submit_button" title="ส่งคำตอบและดูเฉลย" >
            </div>
        </div>
    </form>
</div>
<div class="box_shadow_full"></div>
