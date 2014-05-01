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
        <a href="?r=student/view"><span></span>กลับสู่หน้าหลัก</a>
    </div>
    <div class="grid_10 push_1 news_single">
        <div class="entry">
		<h2 class="entry-title" style="text-align:center;color:#FF7E2F">ข้อมูลของคุณถูกส่งไปยังเจ้าหน้าที่แล้วคะ</h2>
                <br/>
                <div class="entry-content">
                    <p>หลังจากเจ้าหน้าที่ได้รับข้อมูลแจ้งการชำระเงินของคุณและทำการตรวจสอบแล้ว ระบบจะเติมเครดิตในบัญชีผู้ใช้ของคุณ และแจ้งให้ทราบทาง E-mail ภายใน 24 ชั่วโมงคะ</p>
                </div>
	</div>
    </div>


    <div class="clear"></div>
</div>