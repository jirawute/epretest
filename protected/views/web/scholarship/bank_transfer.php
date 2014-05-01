<div class="grid_12  application">
    <div class="grid_4 push_4 goback">
        <a href="http://www.es-ilc.org"><span></span>กลับสู่หน้าหลัก</a>
    </div>

    <div class="clear"></div>
    <div class="editinfo_box">
        <div class="entry">
		<h2 class="entry-title" style="text-align:center;color:#FF7E2F">สถานะการชำระเงินของคุณอยู่ระหว่างรอการชำระเงินค่ะ</h2>
                <br/>
                <div class="entry-content">
                    <h6>รายละเอียดการชำระเงิน</h6>
                    <p>
                        <label class="left_col">Invoice No.</label><label class="right_col"><?php echo $_POST['inv'];?></label>
                    </p>
                    <p>
                        <label class="left_col">รายการชำระเงิน</label><label class="right_col"><?php echo $_POST['itm'];?></label>
                    </p>
                    <p>
                        <label class="left_col">จำนวนเงิน</label><label class="right_col"><?php echo number_format($_POST['amt'],2);?> บาท</label>
                    </p>
                    <p>
                        <label class="left_col" style="float:left;height: 100px;">ช่องทางการชำระเงิน</label>
                        <label class="right_col" style="height: 100px;">
                            โอนเงินผ่านบัญชีธนาคารกสิกรไทย สาขา สยามสแควร์<br/>
                            &nbsp;&nbsp;ประเภท บัญชีกระแสรายวัน<br/>
                            &nbsp;&nbsp;ชื่อบัญชี บริษัท เอ็ดดูเคชั่น สตูดิโอ จำกัด<br/>
                            &nbsp;&nbsp;เลขที่บัญชี 026-1-10869-0
                        </label>    
                        
                       
                    </p>
                    <div class="clear"></div>
                    <h6>ยืนยันการชำระเงิน</h6>
                    <p>เมื่อคุณได้ทำการโอนเงินแล้ว กรุณายืนยันการชำระเงินโดยการ สแกนหรือถ่ายรูปสลิปการโอนเงิน แล้วส่งรายละเอียดผ่าน  <b> <a href="<?php echo Yii::app()->createUrl('scholarship/transfer',array('id'=>$model->scholar_enroll_id)); ?>" target="_blank">แบบฟอร์มแจ้งการชำระเงินได้ที่นี่</a></b> หลังจากนั้นระบบจะส่งอีเมล์ไปยังเจ้าหน้าที่ ซึ่งจะใช้เวลาในการตรวจสอบภายใน 1 วันทำการ และหลังจากตรวจสอบเสร็จระบบจะส่งอีเมล์แจ้งให้ทราบค่ะ</p>
                    <p>** หมายเหตุ : กรุณาโอนเป็นเศษสตางค์เพื่อให้ตรวจสอบได้ง่ายขึ้น เช่น โอนเงิน 240.66 บาท **</p>
          </div>
	</div>

    </div>
    <div class="clear"></div>

</div>
