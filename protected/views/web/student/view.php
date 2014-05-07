<?php
$subject_name = $subject['name'];
if ($subject['exam_type'] == 'Exam') {
    $type_name = 'ข้อสอบ';
} else {
    $type_name = 'แบบฝึกหัด';
}
/* echo "<br> ===> ";
  echo "<pre>";
  print_r($subject['exam_type']);
  echo "</pre>"; */
?>
<style type="text/css">
    @media print {
        body * {
            visibility:hidden;
        }
        #printable, #printable * {
            visibility:visible;
        }
        #printable { /* aligning the printable area */
            position:absolute;
            left:40;
            top:40;
        }
        #dontprint, #dontprint * {
            visibility:hidden;
            color:#fffff;
        }
    }

</style>
<script type="text/javascript">

    $(function() {

        var subject = <?php echo $subject_id; ?>;

        //    if (subject) {
        $(".list_test > .list_test_unselect").hide();
        $(".list_test > .list_test_box").css({visibility: "visible"});
        //  }
        var exam_type = '<?php echo $subject['exam_type']; ?>';
        if (exam_type == 'Exercise') {
            $(".menu_tab_home a:nth-child(2), .menu_tab a:nth-child(2)").addClass("selected");
            $(".menu_tab_home a:nth-child(2), .menu_tab a:nth-child(2)").siblings("a:nth-child(1)").removeClass("selected");
            $(".menu_tab1").hide();
            $(".menu_tab2").show();

        } else {
            $(".menu_tab_home a:nth-child(1), .menu_tab a:nth-child(1)").addClass("selected");
            $(".menu_tab_home a:nth-child(1), .menu_tab a:nth-child(1)").siblings("a:nth-child(2)").removeClass("selected");
            $(".menu_tab1").show();
            $(".menu_tab2").hide();

        }


    });
    function closeDialogBox() {
        document.getElementById('dialogBox').style.display = "none";
    }

    function showExam(subject_id, type, subject_name) {
        var type_name;
        $.ajax({
            url: '?r=exam/select&subject_id=' + subject_id,
            type: 'GET',
            dataType: 'html',
            success: function(data, textStatus, xhr) {
                if (type == 'Exam') {
                    type_name = "ข้อสอบ";
                } else if (type == 'Exercise') {
                    type_name = "แบบฝึกหัด";
                } else {
                    type_name = "ข้อสอบและแบบฝึกหัด";
                }
                //console.log(data);
                document.getElementById('showData').innerHTML = data;
                document.getElementById('type').innerHTML = type_name;
                document.getElementById('subject').innerHTML = subject_name;
                reloadDataTable();

            },
            error: function(request, status, error) {
                alert("Error: " + error + "\nResponseText: " + request.responseText);
            }
        });

    }

    function CheckandGo(status, exam_id) {
        //alert(exam_id);
        if (status == 2) {
            apprise('คุณเคยทำข้อสอบชุดนี้แล้ว', {'verify': true, 'textYes': 'ดูเฉลยละเอียด', 'textNo': 'กลับหน้าหลัก'}, function(r) {
                if (r) {
                    OpenLink('index.php?r=exam/answer&id=' + exam_id);
                }else{
                   //OpenLink('index.php?r=exam&id=32@%3$' + exam_id+'$aw8'); 
                }
            });
        } else {
            OpenLink('index.php?r=exam&id=32@%3$' + exam_id+'$aw8'); 
        }

    }

</script>
<div class="top_dashboard">
    <div class="grid_5">
        <div class="profile_box" id="printable">
            <div class="pic">
                <?php if (!$model->image) { ?>
                    <img src="images/web/nopic.png" width="100" height="100" />
                <?php } else { ?>
                    <img src="uploads/student/<?php echo $model->image; ?>" style="max-width:100px;max-height:100px" />
<?php } ?>
                <p id="dontprint"><a href="#" onClick="window.print();">พิมพ์บัตร</a>
            </div>
            <div class="text">
                <h2 class="profile_name"><?php echo $model->firstname; ?> <?php echo $model->lastname; ?></h2>
                <ul>
                    <?php
                    if ($model->birthday && $model->birthday != '0000-00-00') {
                        list($y, $m, $d) = explode("-", $model->birthday);
                        $birthday = $d . "/" . $m . "/" . ($y + 543);
                    } else {
                        $birthday = "";
                    }
                    ?>
                    <li><span>วันเกิด :</span> <?php echo $birthday; ?></li>
                    <li><span>โรงเรียน :</span> <?php echo $model->school; ?></li>
                    <li><span>ระดับชั้น :</span> <?php
                        if ($model->level_id) {
                            echo $model->level->name;
                        }
                        ?></li>
                    <li><span>โทรศัพท์ :</span> <?php echo $model->phone; ?></li>
                    <li><span>อีเมล์ :</span> <?php echo $model->email; ?></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="grid_7">
        <div class="history_box">
<?php echo $this->renderPartial('last_history', array('student_id' => $model->student_id, 'TestRecord' => $TestRecord)); ?>
        </div>
    </div>

    <div class="clear"></div>

    <div class="grid_5 box_shadow_grid_5"></div>
    <div class="grid_7 box_shadow_grid_7"></div>

</div>

<div class="clear"></div>
<? if($msg){?>
    <div class="grid_12 dialog" id="dialogBox">

        <div class="text">
            <p><?=$msg?></p>
        </div>

        <div class="close" onclick="closeDialogBox();">x</div>

    </div>
<?}?>
<div class="clear"></div>
<!-- Start Selected -->
<div class="grid_12 title_bar">
    <span class="before"></span>
    <h2>เลือกชุดข้อสอบ - ระดับของคุณคือ <?php echo $level_info->name; ?></h2>
    <span class="after"></span>
</div>
<div class="clear"></div>

<div class="menu_test" >

    <div class="menu_tab" >
        <a class="selected">ชุดข้อสอบ</a>
        <a>ชุดแบบฝึกหัด</a>
    </div>
    <ul class="menu_list menu_tab1" id="menu_tab1">
        <li>
                <?php foreach ($TypesExam as $exam) { ?>
                <span><?php echo $exam->name; ?></span>
                <ul>
                    <?php
                    $type_id = $exam->type_id;
                    $sub_criteria = new CDbCriteria();
                    $sub_criteria->select = '*';
                    $sub_criteria->condition = 'status=:status AND type_id=:type_id';
                    $sub_criteria->params = array(':status' => 1, ':type_id' => $type_id);
                    $sub_criteria->order = 'sort_order';
                    $Subjects = Subject::model()->findAll($sub_criteria);
                    ?>
                    <?php
                    foreach ($Subjects as $Subject) {

                        $exam_model = new Exam;
                        $total = $exam_model->getTotalExamBySubjectId($Subject->subject_id);
                        ?>
                        <li style="float:left;" ><a onclick="showExam('<?php echo $Subject->subject_id; ?>', 'Exam', '<?php echo $Subject->name; ?>')" <?php if ($Subject->subject_id == $subject_id) { ?>style="background: #ff9c00;"<?php } ?>><?php echo $Subject->name; ?><span><?php echo $total; ?></span></a></li>
                <?php } ?>

                </ul>
<?php } ?>
        </li>
    </ul>

    <ul class="menu_list menu_tab2" id="menu_tab2">
        <li>
                <?php foreach ($TypesExercise as $exercise) { ?>
                <span><?php echo $exercise->name; ?></span>
                <ul>
                    <?php
                    $type_id = $exercise->type_id;
                    $sub_criteria = new CDbCriteria();
                    $sub_criteria->select = '*';
                    $sub_criteria->condition = 'status=:status AND type_id=:type_id';
                    $sub_criteria->params = array(':status' => 1, ':type_id' => $type_id);
                    $sub_criteria->order = 'sort_order';
                    $Subjects = Subject::model()->findAll($sub_criteria);
                    ?>
                    <?php
                    foreach ($Subjects as $Subject) {
                        $exam = new Exam;
                        $total = $exam->getTotalExamBySubjectId($Subject->subject_id);
                        ?>
                        <li style="float:left" ><a  onclick="showExam('<?php echo $Subject->subject_id; ?>', 'Exsecise', '<?php echo $Subject->name; ?>')" <?php if ($Subject->subject_id == $subject_id) { ?>style="background: #ff9c00;"<?php } ?>><?php echo $Subject->name; ?><span><?php echo $total; ?></span></a></li>
                <?php } ?>

                </ul>
<?php } ?>
        </li>
    </ul>

</div>

<div class="list_test">
    <div style="position:absolute;text-align:right;width:640px;">
        <div style="position:relative;margin:0;top:-40px;">
<?php foreach ($level_all as $level) { ?>
                <a style="margin-left:10px;" class="view_all" href="<?php echo Yii::app()->createUrl('student/view', array('level' => $level->level_id)); ?>"><?php echo $level->name; ?></a>
<?php } ?>
        </div>
    </div>
    <div class="clear"></div>
    <div class="list_test_unselect" id="list_test_unselect">
        <p>เลือกรายชื่อชุดทดสอบจากด้านซ้าย</p>
    </div>

    <div class="list_test_box" id="list_test_box">

        <div class="header_list_test">


            <h2>ชุด<span id="type"><?php echo $type_name; ?></span> &#187; วิชา<span id="subject"><?php echo $subject_name; ?></span></h2>

        </div>
        <div class="table_list_test" id="showData">
<?php $this->renderPartial('show_exam', array('model'=>$model, 'subject_id' => $subject_id, 'student_id' => $model->student_id)); ?>
        </div>

    </div>

</div>

<div class="clear"></div>

<div class="box_shadow_full"></div>


