<table cellpadding="0" cellspacing="0" border="0" class="display" id="table_list_subject">
        <thead>
                <tr>
                        <th width="48">สถานะ</th>
                        <th width="80">วันที่สร้าง</th>
                        <th>ชื่อชุดข้อสอบ</th>
                        <th width="55">เครดิต</th>
                </tr>
        </thead>
        <tbody>
                <?php foreach($exam_info  as $Exam) { ?>
                <tr onclick="OpenLink('<?php echo Yii::app()->createUrl('exam', array('id'=>$Exam->exam_id)); ?>')">
                        <td class="mark_non" title="ยังไม่ได้ซื้อ"><span>⤫</span></td>
                        <td class="date_added"><?php echo date('d/m/Y',strtotime($Exam->date_added));?></td>
                        <td class="subject"><?php echo $Exam->name;?></td>
                        <td class="number"><?php echo $Exam->credit_required;?></td>
                </tr>
                <?php } ?>					
        </tbody>
</table>
