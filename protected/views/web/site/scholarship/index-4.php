<script type="text/javascript">
function checkStatus(){
    if(document.getElementById('checkstatus').style.display == "none"){
         // document.getElementById('send_slip').style.display = "none";
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
        <h3>วันที่ประกาศผลผู้ได้รับทุน  : <?php echo $this->thai_date(strtotime($model->announce_date));?></h3>
        <div align="center">
            <!--input type="button" name="btn1" value="สมัครทุนนี้" onclick="window.open('<?php echo Yii::app()->createUrl('scholarship/create', array('id'=>$model->scholar_id)); ?>','_self','','');" />
            <a href="<?php echo Yii::app()->createUrl('scholarship/create', array('id'=>$model->scholar_id)); ?>"><span></span>สมัครทุนนี้</a>
           <a href="#" onclick="checkStatus();"><span></span>ตรวจสอบผลการสมัคร</a>-->
            
            
           
<!--            <a href="#" onclick="checkStatus();"><span></span>ส่งหลักฐานการโอนเงิน</a>
            <input type="button" name="btn3" value="ส่งหลักฐานการโอนเงิน (กรณีโอนเงินเท่านั้น)" onclick="sendSlip();" /-->

        </div>
        <!--div align="center"><input type="button" name="btn" value="กลับสู่หน้าหลัก" onclick="window.open('http://www.es-ilc.org','_self','','');"/></div-->
<div align="center"><h3 style="color:red">  ขณะนี้ระบบปิดรับสมัครแล้วค่ะ<br/> ขอให้น้องๆโชคดีทุกคนนะคะ... แล้วรอติดตามกิจกรรมดีๆได้ <a href="http://www.es-ilc.org" >ที่นี่</a> นะคะ</h3></div>

     
        <!--
        <div align="center"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/web/example.jpg"/></div-->
    </div>
</div>