<div class="top_dashboard">
        <div class="grid_5">
                <div class="profile_box">
                        <div class="pic">
                                <?php if(!$model->image){?>
                                <img src="images/web/nopic.png" />
                                <?php }else{?>
                                <img src="uploads/student/<?php echo $model->image;?>" style="max-width:100px;max-height:100px"/>
                                <?php }?>
                                <p><!--<a href="#">พิมพ์</a> | --><a href="index.php?r=student/update">แก้ไขข้อมูล</a></p>
                        </div>
                        <div class="text">
                                <h2 class="profile_name"><?php echo $model->firstname;?> <?php echo $model->lastname;?></h2>
                                <ul>
                                    <?php
                                         if($model->birthday && $model->birthday!= '0000-00-00'){
                                            list($y,$m,$d) = explode("-",$model->birthday);
                                            $birthday = $d."/".$m."/".($y+543);
                                         }else{
                                            $birthday = "";
                                         }
                                    ?>
                                    <li><span>วันเกิด :</span> <?php echo $birthday;?></li>
                                    <li><span>โรงเรียน :</span> <?php echo $model->school;?></li>
                                    <li><span>ระดับชั้น :</span> <?php if ($model->level_id){echo $model->level->name;}?></li>
                                    <li><span>โทรศัพท์ :</span> <?php echo $model->phone;?></li>
                                    <li><span>อีเมล์ :</span> <?php echo $model->email;?></li>
                                </ul>
                        </div>
                </div>
        </div>

        <div class="grid_7">
                <div class="goback_box">

                        <a href="index.php?r=student/view"><span></span>กลับสู่หน้าหลัก</a>

                </div>
        </div>

        <div class="clear"></div>

        <div class="grid_5 box_shadow_grid_5"></div>
        <div class="grid_7 box_shadow_grid_7"></div>

</div>

<div class="clear"></div>

<div class="grid_12 title_bar">
        <span class="before"></span>
        <h2>ประวัติการทำชุดทดสอบ</h2>
        <span class="after"></span>
</div>

<div class="clear"></div>

<!-- Start Exam History -->
<div class="grid_12">
    <div class="table_history">
            <table cellspacing="0">
                    <tbody>
                            <tr class="title_table">
                                    <th>ชื่อข้อสอบ</th>
                                    <th width="10%">ชุดทดสอบ</th>
                                    <th width="15%">กลุ่มวิชา</th>
                                    <th width="14%">วัน-เวลาที่ทำ</th>
                                    <th>คะแนนเฉลี่ย</th>
                                    <th>คะแนนที่ได้</th>
                                    <th style="padding-right:10px;">คะแนนเต็ม</th>
                            </tr>
                            <?php
                            if(($history)){
                                 //echo "<pre>", print_r($TestRecord), "</pre>";
                                 foreach($history  as $his) {

                                    $score = explode('.',$his['score']);
                                    $score_total = explode('.',$his['score_total']);

                                    foreach($score as $value1){}
                                    if($value1=='00'){
                                        $score = number_format($his['score']);
                                    }else{
                                        $score = $his['score'];
                                    }

                                    foreach($score_total as $value2){}
                                    if($value2=='00'){
                                        $score_total = number_format($his['score_total']);
                                    }else{
                                        $score_total = $his['score_total'];
                                    }
                            ?>
                            <tr>
                                    <td style="text-align:left;padding-left:10px;"><a href="<?php echo Yii::app()->createUrl('exam/answer', array('id'=>$his['exam_id'])); ?>"><?php echo $his['name'];?></a></td>
                                    <td style="text-align:left;"><?php echo $his['type_name'];?></td>
                                    <td style="text-align:left;"><?php echo $his['sub_name'];?></td>
                                    <td><?php echo $his['date_attended'];?></td>
                                    <td><?php echo number_format($his['exam_avg']);?></td>
                                    <td><?php echo $score;?></td>
                                    <td style="padding-right:10px;"><?php echo $score_total;?></td>
                            </tr>
                            <?php }}?>
                            
                    </tbody>
            </table>
    </div>
</div>

<div class="clear"></div>

<div class="box_shadow_full"></div>



