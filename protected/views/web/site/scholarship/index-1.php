<script type="text/javascript">
function checkStatus(){
    if(document.getElementById('checkstatus').style.display == "none"){
          document.getElementById('checkstatus').style.display = "";
    }else{
          document.getElementById('checkstatus').style.display = "none";
    }
  
}
function sendSlip(){
    if(document.getElementById('send_slip').style.display == "none"){
          document.getElementById('checkstatus').style.display = "none";        
          document.getElementById('send_slip').style.display = "";
    }else{
          document.getElementById('send_slip').style.display = "none";
    }
}
function checkSubmit(){
    if(document.getElementById('email').value==''){
        alert('กรุณากรอกอีเมล์ก่อนค่ะ');
        document.getElementById('email').focus();
        return false;
    }else{
        return true;
    }
}
function checkSubmit2(){
    if(document.getElementById('email2').value==''){
        alert('กรุณากรอกอีเมล์ก่อนค่ะ');
        document.getElementById('email2').focus();
        return false;
    }else{
        return true;
    }
}
</script>
<div class="grid_12  application">
    <h2>
        <?php echo $model->name;?>
    </h2>
    <div class="editinfo_box" >
<div align="center">
        </div>
        <h3>รายละเอียดทุน :</h3>
        <p class="textnormal"><?php echo $model->desc;?></p>
        <h3>ระยะเวลาที่เปิดรับสมัคร : <?php echo $this->thai_date(strtotime($model->period_start));?> - <?php echo $this->thai_date(strtotime($model->period_end));?></h3>
        <h3>ค่าสมัคร : <?php echo $model->price;?> บาท</h3>
        <!--p class="textnormal">(ในกรณีที่ผู้สมัครไม่ได้รับการคัดเลือก ทางสถาบันฯจะมอบ Gift Voucher มูลค่า <?php echo $model->price;?> บาท ซึ่งสามารถใช้เป็นส่วนลดค่ายภาษาในประเทศต่อไป)</p-->
        <!--h3>วันที่ประกาศผลผู้มีสิทธิ์สัมภาษณ์ : <?php echo $this->thai_date(strtotime($model->announce_date));?></h3-->
        <h3>วันที่ประกาศผลผู้ได้รับทุน : <?php echo $this->thai_date(strtotime($model->announce_date));?></h3>
        <div align="center">
            
            
            <!-- ปุ่มตรวจสอลผลการสมัคร-->
            <input type="button" name="btn1" value="สมัครทุนนี้" onclick="window.open('<?php echo Yii::app()->createUrl('scholarship/create', array('id'=>$model->scholar_id)); ?>','_self','','');" />
                      
            &nbsp;
           <!-- ปุ่มตรวจสอลผลการสมัคร>
           <input type="button" name="btn1" value="ตรวจสอบผลการสมัคร" onclick="checkStatus();"/>
           
<!--            <a href="#" onclick="checkStatus();"><span></span>ส่งหลักฐานการโอนเงิน</a>
            <input type="button" name="btn3" value="ส่งหลักฐานการโอนเงิน (กรณีโอนเงินเท่านั้น)" onclick="sendSlip();" /-->

        </div>
        <!--div align="center"><input type="button" name="btn" value="กลับสู่หน้าหลัก" onclick="window.open('http://www.es-ilc.org','_self','','');"/></div-->
<div align="center"><h3 style="color:red">  </h3></div>

    <a href="#" onclick="checkStatus();" style="color:white">.</a>
         <?php if(Yii::app()->user->hasFlash('error')): ?>

        <div align="center">
            <h3 style="color:red"><?php echo Yii::app()->user->getFlash('error'); ?></h3>
        </div>


       <?php endif; ?>
        <div id="checkstatus" align="center" style="display:none">
            
                   <div class="status-box">
                        <form id="form-status" name="form-status" method="post" action="index.php?r=scholarship/checkstatus">
                            <h3>กรอกอีเมล์ที่ใช้สมัคร</h3>                           
			<p>
                            <input id="email" name="email" type="text" size="40">
                            <input name="scholar_id" type="hidden" value="<?php echo $model->scholar_id;?>">
			</p>
                        <p class="submit">
                            <input type="submit" name="submit" value="ส่งข้อมูล" onclick="return checkSubmit();"/>
			</p>
                       
                        </form>
                  </div>
        </div>
        <div id="send_slip" align="center" style="display:none">
            
                   <div class="status-box">
                        <form id="form-status" name="form-status2" method="post" action="index.php?r=scholarship/sendslip">
                            <h3>กรอกอีเมล์ที่ใช้สมัคร</h3>                           
			<p>
                            <input id="email2" name="email2" type="text" size="40">
                            <input name="scholar_id2" type="hidden" value="<?php echo $model->scholar_id;?>">
			</p>
                        <p class="submit">
                            <input type="submit" name="submit" value="ส่งข้อมูล" onclick="return checkSubmit2();"/>
			</p>
                       
                        </form>
                  </div>
        </div>        
        <!--
        <div align="center"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/web/example.jpg"/></div-->
    </div>
</div>