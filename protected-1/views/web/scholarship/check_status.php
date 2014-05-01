<div class="grid_12  application">
    <div class="grid_4 push_4 goback">
        <a href="http://www.es-ilc.org"><span></span>กลับสู่หน้าหลัก</a>
    </div>

    <div class="clear"></div>
    <div class="editinfo_box">
        <div class="entry">
            <?php 
            //เฉพาะคนที่ชำระเงินเรียบร้อยแล้วเท่านั้น payment_status = 2
            if($model->payment_status==2){?>
            <h1 class="entry-title" style="text-align:center;color:#FF7E2F">ท่านได้รับคูปองบัตรของขวัญ</h1> 
                <h2><a href="javascript:window.print()" align="center">Print</a></h2>
            <div align="center">
            <?php if($model->status==3){?>
             
                <h2 style="color:#FF7E2F">ขอแสดงความยินดีด้วยค่ะ คุณผ่านการคัดเลือกเข้าร่วมโครงการ</h2>
           
            <?php }else{ ?>
            <div class="voucher" id="printable">
                <!--img src="../../images/web/gift_voucher.png" alt="Description" /-->
                <span class="voucher_value"></span>
                <span class="voucher_expire">NO. <?php echo $model->inv_id;?></span>
                
                <div class="clear"></div>
                <span class="voucher_name"><?php echo $model->name_th." ".$model->surename_th;?></span>
                <div class="clear"></div>
                <span class="voucher_email"><?php echo $model->email;?></span>
                
                <div class="clear"></div>
                <span class="voucher_num"></span>
                <div class="clear"></div>
                <span class="voucher_condition"></span>
                <div class="clear"></div>
                <span class="voucher_condition_line2"><br/></span>
                
            </div>
            <?php }?>
            </div>
                <h2>**หากท่านไม่สามารถพิมพ์  Gift Voucher  ได้  สามารถ  Capture  หรือ  Print  Screen  ภาพหน้าจอไว้ใช้แทนการพิมพ์  Gift Voucher ได้หรือจดหมายเลข  Inv No.  ไว้เพื่อใช้ในการตรวจสอบได้ขอบคุณค่ะ</h2>
            <?php             
                }else{
                //ถ้า payment_status ไม่เท่ากับ 2 ให้ขึ้นข้อความตามนี้
             ?>
                <h1 class="entry-title" style="text-align:center;color:#FF7E2F">ระบบขัดข้อง กรุณาติดต่อเจ้าหน้าที่เพื่อขอรับคูปองผ่านทางอีเมล์ได้ที่ contact@e-studio.co.th ขอบคุณค่ะะ</h1>
            <?php }?>
            
            
        </div>

    </div>
    <div class="clear" align ="center"></div>

</div>