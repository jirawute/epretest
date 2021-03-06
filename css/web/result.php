
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

    function alertBox(shared, credit_required, test_record_id, student_id) {
        if (shared === 0) {
            var up_credit = Math.max(0, Math.round(credit_required / 10)); //Credit reward = 10% if shared on FB
//                    var total_shared = getTotalShared();
//                    up_credit = Math.min(up_credit,15);
            apprise('<img src="http://www.e-pretest.com/images/web/facebook_hover.png" /><br/>ชวนเพื่อนๆมาทำแบบทดสอบกัน พร้อมรับเครดิตเพิ่ม <b>' + up_credit + ' เครดิต</b>', {'verify': true, 'textYes': 'ตกลง', 'textNo': 'ยกเลิก'}, function(r) {
                if (r) {
                    checkIfShared(0, up_credit, test_record_id, student_id);
                } else {
                    OpenLink("index.php?r=student/view");
                }
            });
        } else {
            OpenLink("index.php?r=student/view");
        }
    }
    function checkIfShared(total_shared, up_credit, test_record_id, student_id) {
        window.open("http://www.facebook.com/share.php?u=www.e-pretest.com/fbsharepage.php", "_blank", "menubar=1,resizable=1,width=600,height=400");
        apprise('<img src="http://www.e-pretest.com/images/web/facebook_hover.png"/>บอกต่อเพื่อนของคุณ แล้วรับเครดิตฟรี', {'verify': true, 'textYes': 'รับเครดิตเพิ่ม ' + up_credit + ' เครดิต', 'textNo': 'กลับหน้าหลัก'}, function(r) {
            if (r) {
                //if (getTotalShared() > total_shared) {
                OpenLink("index.php?r=exam/upcredit&id=" + test_record_id + "&credit=" + up_credit);
                /*}else{
                 checkIfShared(total_shared,up_credit,student_id);
                 }*/
            } else {
                OpenLink("index.php?r=student/view");
            }

        });
    }
    function getTotalShared() {
        $.ajax({
            url: 'http://graph.facebook.com/http://e-pretest.com',
            type: 'GET',
            data: "{}",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            async: false,
            success: function(data, textStatus, xhr) {
                return data["shares"];
            }
        });
    }
</script>

<script type="text/javascript" src='http://www.scribd.com/javascripts/scribd_api.js'></script>

<script type="text/javascript">

    function showPDF() {
          $("#loading").show();

        var url = 'http://www.e-pretest.com/uploads/answer/<?= $exam_info['answer_file'] ?>';
        var pub_id = 'pub-87933716448539829813621125';
        var doc_id = '<?= $exam_info['answer_doc_id'] ?>';
        var access_key = '<?= $exam_info['answer_access_key'] ?>';
        if (doc_id === '') {
            var scribd_doc = scribd.Document.getDocFromUrl(url, pub_id);
        } else {
            //alert(doc_id);
            var scribd_doc = scribd.Document.getDoc(doc_id, access_key);
        }
        var onDocReady = function(e) {
            //scribd_doc.api.setZoom(0.6);
            $("#loading").hide(1000);
        };
        scribd_doc.addEventListener('docReady', onDocReady);
        scribd_doc.addParam('jsapi_version', 2);
        var h1 = $('#answer_sheet').height();
        
        var h2 = $('#h2').height();
		var h3 = $('#embedded_doc').height();
		
        $('#loading').append(h1+":"+h2+":"+h3);
        //scribd_doc.addParam('height', h1-20);
		scribd_doc.addParam('height', 500);
        scribd_doc.addParam('width', 640);
        scribd_doc.addParam('public', false);
        scribd_doc.addParam('mode', 'list');  // only 'list', 'slideshow' support HTML5
        scribd_doc.addParam('extension', 'pdf');
        scribd_doc.write('embedded_doc');
    }
</script>
<style>
  
    img.center {
    display: block;
    margin-left: auto;
    margin-right: auto;
}
  </style>  
<div class="test_box">
    <div class="question">
        <div class="question_top">
            <?php
            if ($exam_info['exam_type'] == 'Exam') {
                $exam_type = 'ข้อสอบ';
            } else {
                $exam_type = 'แบบฝึกหัด';
            }
            ?>
            <h2>เฉลยชุด<?php echo $exam_type; ?>วิชา<?php echo $exam_info['subject_name']; ?></h2>

            <h3><?php echo $exam_info['name']; ?></h3>
        </div>
        <div  id ="loading" style="display:none; position: absolute;width: 640px;background: #F5F5F5;z-index: 100;">
            <img class="center" src="./images/web/loading1.gif" onclick="location.reload();"alt="Be patient..." />
        </div>
        <div class="question_content"  id='embedded_doc' style="height: 100%;">
        </div>
    </div>
    <form name="ExamForm" method="post" action="">
        <div class="answer" id="answer_sheet">
            <?php
            $testrecord = TestRecord::model()->loadTestRecord($test_record_id);
            $student_id = Yii::app()->user->id;
            //count total record
            $num_rec = count($session_list);
            $exam_id = $exam_info['exam_id'];
            if ($num_rec > 0 && $exam_info['status'] == 1) {
                $last_key = $num_rec - 1;
                foreach ($session_list as $key_ans => $session) {
                    switch ($session['answer_type_id']) {
                        case 1:
                            echo $this->renderPartial('_result1', array('session' => $session, 'key_ans' => $key_ans, 'last_key' => $last_key, 'test_record_id' => $test_record_id, 'exam_id' => $exam_id));
                            break;
                        case 2:
                            echo $this->renderPartial('_result2', array('session' => $session, 'key_ans' => $key_ans, 'last_key' => $last_key, 'test_record_id' => $test_record_id, 'exam_id' => $exam_id));
                            break;
                        case 3:
                            echo $this->renderPartial('_result3', array('session' => $session, 'key_ans' => $key_ans, 'last_key' => $last_key, 'test_record_id' => $test_record_id, 'exam_id' => $exam_id));
                            break;
                        case 4:
                            echo $this->renderPartial('_result4', array('session' => $session, 'key_ans' => $key_ans, 'last_key' => $last_key, 'test_record_id' => $test_record_id, 'exam_id' => $exam_id));
                            break;
                        case 5:
                            echo $this->renderPartial('_result5', array('session' => $session, 'key_ans' => $key_ans, 'last_key' => $last_key, 'test_record_id' => $test_record_id, 'exam_id' => $exam_id));
                            break;
                        case 6:
                            echo $this->renderPartial('_result6', array('session' => $session, 'key_ans' => $key_ans, 'last_key' => $last_key, 'test_record_id' => $test_record_id, 'exam_id' => $exam_id));
                            break;
                        case 7:
                            echo $this->renderPartial('_result7', array('session' => $session, 'key_ans' => $key_ans, 'last_key' => $last_key, 'test_record_id' => $test_record_id, 'exam_id' => $exam_id));
                            break;
                        default:
                            echo $this->renderPartial('_form0');
                    }
                }//end foreach
            } else {
                echo $this->renderPartial('_form0');
            }
            ?>
            <div class="answer_bottom" id="h2">

                <input onclick="<? echo 'alertBox(' . $testrecord['elapse_time'] . ',' . $exam_info['credit_required'] . ',' . $test_record_id . ',' . $student_id . ')'; ?>" type="button" value="กลับสู่หน้าหลัก" class="submit_button">

            </div>
        </div>
    </form>
</div>
<div class="box_shadow_full"></div>
