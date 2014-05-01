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
		<h2 class="entry-title" style="text-align:center;color:#FF7E2F">รายการของคุณอยู่ระหว่างรอการชำระเงินอยู่ค่ะ</h2>
                <br/>
                <div class="entry-content">
                    <h6>รายละเอียดการสั่งซื้อ</h6>
                    <p>
                        <label class="left_col">เลขที่สั่งซื้อ</label><label class="right_col"><?php echo $_POST['inv'];?></label>
                    </p>
                    <p>
                        <label class="left_col">รายการสั่งซื้อ</label><label class="right_col"><?php echo $_POST['itm'];?></label>
                    </p>
                    <p>
                        <label class="left_col">จำนวนเงิน</label><label class="right_col"><?php echo number_format($_POST['amt'],2);?> บาท</label>
                    </p>
                    <p>
                        <label class="left_col">วิธีการชำระเงิน</label><label class="right_col">โอนเงินผ่านบัญชีธนาคาร</label>
                    </p>
                    <h6>ยืนยันการชำระเงิน</h6>
                    <p>เมื่อคุณได้ทำการโอนเงินแล้ว กรุณายืนยันการชำระเงินโดยการ สแกนหรือถ่ายรูปสลิปการโอนเงิน แล้วส่งรายละเอียดผ่าน <a href="?r=transfer" target="_blank">แบบฟอร์มแจ้งการชำระเงินได้ที่นี่</a> หลังจากนั้นระบบจะส่งอีเมล์ตอบกลับ และเจ้าหน้าที่จะทำการเติมเครดิตในบัญชีผู้ใช้ให้คุณภายใน 24 ชั่วโมง ค่ะ</p>
          </div>
	</div>
    </div>


    <div class="clear"></div>
</div>