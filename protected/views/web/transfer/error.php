<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 if(!Yii::app()->user->id)
    header("Location: ?r=site/login");
    //echo "<pre>", print_r($_POST), "</pre>";
?>
<div id="content">
    <div class="clear"></div>
    <div class="grid_4 push_4 goback">
        <a href="?r=transfer"><span></span>ย้อนกลับ</a>
    </div>
    <div class="grid_10 push_1 news_single">
        <div class="entry">
		<h2 class="entry-title" style="text-align:center;color:#FF6666">ไม่สามารถส่งข้อมูลได้ กรุณาลองใหม่อีกครั้งค่ะ</h2>
        </div>
    </div>


    <div class="clear"></div>
</div>