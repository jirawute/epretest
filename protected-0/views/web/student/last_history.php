<script>
	$(function(){
		$("span#exam_name").each(function(i){
			len=$(this).text().length;
			if(len>32)
			{
				$(this).text($(this).text().substr(0,32)+'...');
			}
		});
	});

</script>
<div class="history_header">
        <h2 class="history">ประวัติล่าสุด</h2>
        <a class="view_all" href="index.php?r=student/history">ดูทั้งหมด</a>
</div>
<table cellspacing="0">
        <tbody>
                <tr class="title_table">
                        <th width="40%">ข้อสอบ/แบบฝึกหัด</th>
                        <th width="25%">วันเวลาที่ทำ</th>
                        <th width="20%">คะแนนเฉลี่ย</th>
                        <th width="20%">คะแนนที่ได้</th>
                </tr>
                <?php
                if(($TestRecord)){
                     //echo "<pre>", print_r($TestRecord), "</pre>";
                     foreach($TestRecord  as $Test) {


                        $score = explode('.',$Test['score']);
                        $score_total = explode('.',$Test['score_total']);

                        foreach($score as $value1){}
                        if($value1=='00'){
                            $score = number_format($Test['score']);
                        }else{
                            $score = $Test['score'];
                        }

                        foreach($score_total as $value2){}
                        if($value2=='00'){
                            $score_total = number_format($Test['score_total']);
                        }else{
                            $score_total = $Test['score_total'];
                        }


                 ?>


                <tr>
                        <td style="padding-left:10px;text-align:left"><a href="<?php echo Yii::app()->createUrl('exam/answer', array('id'=>$Test['exam_id'])); ?>" title="<?php echo $Test['name'];?>"><span id="exam_name"><?php echo $Test['name'];?></span></a></td>
                        <td><?php echo $Test['date_attended'];?></td>
                        <td><?php echo number_format($Test['exam_avg']);?>/<?php echo $score_total;?></td>
                        <td><?php echo $score;?>/<?php echo $score_total;?></td>
                </tr>
                <?php }}else{?>   
                <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                </tr>
                <tr>
                        <td colspan="4">ยังไม่มีประวัติการทำข้อสอบ</td>
                </tr>
                <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                </tr>

                <?php }?>
        </tbody>
</table>