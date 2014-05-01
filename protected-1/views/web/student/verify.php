<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - ยืนยันการสมัครสมาชิก e-pretest.com';
?>
<div class="grid_4 push_4 goback">
        <a href="index.php"><span></span>กลับสู่หน้าหลัก</a>
</div>
<div class="grid_10 push_1 login_signup" style="margin-top:50px;">
    <div class="signup_box">
        <div class="flash-success">
            <?php if($verify==1): ?>            
                <h3>ยินดีต้อนรับสู่  E-Pretest.com  คลังข้อสอบออนไลน์ที่ใหญ่ที่สุด<br/>ระบบได้ยืนยันการสมัครสมาชิกของคุณเรียบร้อยแล้ว<br/>คุณสามารถล็อกอินเข้าสู่ระบบสมาชิก  ตามชื่อผู้ใช้และรหัสผ่านของคุณได้ทันที<br/>ขอบคุณที่ไว้ใจ E-Pretest ขออวยพรให้ทุกท่านประสบความสำเร็จในการสอบทุกระดับค่ะ</h3>
            <?php else: ?>
                <h3>ขออภัย ระบบไม่สามารถยืนยันการสมัครสมาชิกของคุณได้ค่ะ<br/>กรุณาตรวจสอบลิงค์ของคุณใหม่ หรือติดต่อเจ้าหน้าที่ค่ะ</h3>
            <?php endif; ?>
        </div>
    </div>
</div>                
<div class="clear"></div>

