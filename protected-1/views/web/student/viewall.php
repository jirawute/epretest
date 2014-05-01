<script>
function showStudent(exam_id,exam_name,object){
  
    var type_name;
    $.ajax({
        url: '?r=student/select&exam_id='+exam_id,
        type: 'GET',
        dataType: 'html',
        success: function (data, textStatus, xhr) {

            //alert(data);
            //console.log(data);
           $(".list_name > .list_name_unselect").hide();
	   $(".list_name > .list_name_box").css({ visibility: "visible" });
           $(".menu_test ul.menu_list li ul li a").removeAttr( 'style' );
           $(".menu_test ul.menu_list li ul li ul li a").removeAttr( 'style' );
           //$(".menu_test ul.menu_list li ul li ul li a").css("background", "#ff9c00");
            document.getElementById('showData2').innerHTML = data;
            document.getElementById('exam_name').innerHTML = exam_name;
            reloadDataTable();

        },
        error: function (request, status, error) {
            alert ("Error: "+error+ "\nResponseText: "+request.responseText);
        }
    });

}

function showExam(subject_id){
     var type_name;
     $.ajax({
        url: '?r=student/showexam&subject_id='+subject_id,
        type: 'GET',
        dataType: 'html',
        success: function (data, textStatus, xhr) {            
            //alert(data);
            document.getElementById('exam_list_'+subject_id).innerHTML = data;
        },
        error: function (request, status, error) {
            alert ("Error: "+error+ "\nResponseText: "+request.responseText);
        }
    });

}
</script>
<div class="grid_12 title_bar">
    <span class="before"></span>
    <h2>นักเรียนที่ได้คะแนนสูงสุด <?php echo $level->name;?></h2>
    <span class="after"></span>
</div>
<div class="clear"></div>
<!-- Start Selected -->
<div class="menu_test">

        <div class="menu_tab">
                <a class="selected">ชุดข้อสอบ</a>
                <a>ชุดแบบฝึกหัด</a>
        </div>

        <ul class="menu_list menu_tab1">
                <?php foreach($types_exam  as $type_exam) { ?>
                <li>
                        <span><?php echo $type_exam['name'];?></span>
                        <ul>
                            <?php
                                $level_id = $level->level_id;
                                $type_id = $type_exam['type_id'];
                                $sub_criteria = new CDbCriteria();
                                $sub_criteria->select = '*';
                                $sub_criteria->condition = 'status=:status AND level_id=:level_id AND type_id=:type_id';
                                $sub_criteria->params=array(':status'=>1,':level_id'=>$level_id,':type_id'=>$type_id);
                                $sub_criteria->order='sort_order';
                                $Subjects = Subject::model()->findAll($sub_criteria);
                            ?>
                            <?php foreach($Subjects  as $Subject) {
                                $Exam = new Exam;
                                $ExamList = $Exam->getExamBySubjectId($Subject->subject_id);
                                $total = count($ExamList);

                            ?>
                                <li style="float:left"><a onclick="showExam('<?php echo $Subject->subject_id;?>')"  href="#"><?php echo $Subject->name;?><span><?php echo $total;?></span></a>
                                    <ul id="exam_list_<?php echo $Subject->subject_id;?>"></ul>
                                </li>
                            <?php } ?>
                        </ul>
                </li>
                <?php } ?>

        </ul>

        <ul class="menu_list menu_tab2">
                <?php foreach($types_ex  as $type_ex) { ?>
                <li>
                        <span><?php echo $type_ex['name'];?></span>
                        <ul>
                            <?php
                                $level_id = $level->level_id;
                                $type_id = $type_exam['type_id'];
                                $sub_criteria = new CDbCriteria();
                                $sub_criteria->select = '*';
                                $sub_criteria->condition = 'status=:status AND level_id=:level_id AND type_id=:type_id';
                                $sub_criteria->params=array(':status'=>1,':level_id'=>$level_id,':type_id'=>$type_id);
                                $sub_criteria->order='sort_order';
                                $Subjects = Subject::model()->findAll($sub_criteria);
                            ?>
                            <?php foreach($Subjects  as $Subject) {
                                 $Exam = new Exam;
                                 $ExamList = $Exam->getExamBySubjectId($Subject->subject_id);
                                 $total = count($ExamList);
                            ?>
                                <li style="float:left"><a onclick="showExam('<?php echo $Subject->subject_id;?>')" href="#"><?php echo $Subject->name;?><span><?php echo $total;?></span></a>
                                    <ul id="exam_list_<?php echo $Subject->subject_id;?>"></ul>
                                </li>
                            <?php } ?>
                        </ul>
                </li>
                <?php } ?>					
        </ul>

</div>
<div class="list_name">

        <div class="list_name_unselect">
                <p>เลือกรายชื่อชุดทดสอบจากด้านซ้าย</p>
                <p>เพื่อดูลำดับคะแนนของนักเรียนตามชุดทดสอบ</p>
        </div>

        <div class="list_name_box">

                <div class="header_list_name">
                        <h2><span id="exam_name"></span></h2>

                </div>

                <div class="table_list_name" id="showData2">
                        
                </div>

        </div>

</div>

<div class="clear"></div>

<div class="box_shadow_full"></div>
