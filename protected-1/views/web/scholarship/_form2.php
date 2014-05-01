   <?php if(Yii::app()->user->hasFlash('success')): ?>

    <div align="center">
        <h3><?php echo Yii::app()->user->getFlash('success'); ?></h3>
    </div>


   <?php endif; ?>
    <?php if(Yii::app()->user->hasFlash('complete')): ?>

        <h2><?php echo Yii::app()->user->getFlash('complete'); ?></h2>
    <?php endif; ?>
   <?php if($model->payment_status == 2){?>
   <h2>ช่องทางการชำระเงินของคุณ คือ <span class="orange"><?php echo $model->payment_method;?></span><br/>
   สถานะการสมัครของคุณ : <span class="orange">เสร็จสมบูรณ์</span></h2>
   <h3 style="margin: 0 15px;">
       การสมัครจะเสร็จสมบูรณ์ต่อเมื่อผู้สมัครกรอกข้อมูลครบถ้วนและเจ้าหน้าที่ตรวจสอบการชำระค่าธรรมเนียมการสมัครแล้ว ให้ผู้สมัครสังเกตสถานะการสมัคร สถานะจะเปลี่ยนเป็น <span class="orange">"เสร็จสมบูรณ์"</span> และผู้สมัครจะได้รับอีเมล์ตอบรับจากทางสถาบันฯ หากไม่พบอีเมล์ดังกล่าวให้ตรวจสอบใน Junk mail ก่อน หากไม่ได้รับ กรุณาติดต่อ contact@e-studio.co.th       
   </h3><h3 style="text-align: center">
       ทางสถาบันฯ จะประกาศผู้มีสิทธิ์สัมภาษณ์ในวันที่ <?php echo $this->thai_date(strtotime($model->scholarDetail->announce_date));?> ที่ www.es-ilc.org 
   </h3>
   <div class="goback">
        <a href="http://www.es-ilc.org"><span></span>กลับสู่หน้าหลัก</a>
   </div>
   <br/><br/>
   <?php }else if($model->payment_status == 3){?>
   <h2>ช่องทางการชำระเงินของคุณ คือ <span class="orange"><?php echo $model->payment_method;?></span> <br/>
   สถานะการสมัครของคุณ : <span class="orange">อยู่ระหว่างรอการชำระเงิน</span></h2>
   <h3 style="margin: 0 15px;">
       การสมัครจะเสร็จสมบูรณ์ต่อเมื่อผู้สมัครกรอกข้อมูลครบถ้วนและเจ้าหน้าที่ตรวจสอบการชำระค่าธรรมเนียมการสมัครแล้ว ให้ผู้สมัครสังเกตสถานะการสมัคร สถานะจะเปลี่ยนเป็น <span class="orange">"เสร็จสมบูรณ์"</span> และผู้สมัครจะได้รับอีเมล์ตอบรับจากทางสถาบันฯ หากไม่พบอีเมล์ดังกล่าวให้ตรวจสอบใน Junk mail ก่อน หากไม่ได้รับ กรุณาติดต่อ contact@e-studio.co.th       
   </h3>
   <h3 style="text-align: center">
       ทางสถาบันฯ จะประกาศผู้มีสิทธิ์สัมภาษณ์ในวันที่ <?php echo $this->thai_date(strtotime($model->scholarDetail->announce_date));?> ที่ www.es-ilc.org 
   </h3>
   <div class="goback">
        <a href="http://www.es-ilc.org"><span></span>กลับสู่หน้าหลัก</a>
        <?php if($model->payment_method=='Bank Transfer' || strtolower($model->payment_method)=='bank transfer'){?>
        &nbsp;&nbsp;&nbsp;
        <a href="<?php echo Yii::app()->createUrl('scholarship/transfer',array('id'=>$model->scholar_enroll_id)); ?>"><span></span>ส่งหลักฐานการโอนเงิน</a>
        <?php }?>
   </div><br/><br/>
   <?php }else if($model->payment_status == 4){?>
   <h2>ช่องทางการชำระเงินของคุณ คือ <span class="orange"><?php echo $model->payment_method;?></span> <br/>
   สถานะการสมัครของคุณ : <span class="orange">อยู่ระหว่างการตรวจสอบจากเจ้าหน้าที่</span></h2>
   <h3 style="margin: 0 15px;">
       การสมัครจะเสร็จสมบูรณ์ต่อเมื่อผู้สมัครกรอกข้อมูลครบถ้วนและเจ้าหน้าที่ตรวจสอบการชำระค่าธรรมเนียมการสมัครแล้ว ให้ผู้สมัครสังเกตสถานะการสมัคร สถานะจะเปลี่ยนเป็น <span class="orange">"เสร็จสมบูรณ์"</span> และผู้สมัครจะได้รับอีเมล์ตอบรับจากทางสถาบันฯ หากไม่พบอีเมล์ดังกล่าวให้ตรวจสอบใน Junk mail ก่อน หากไม่ได้รับ กรุณาติดต่อ contact@e-studio.co.th       
   </h3>
   <h3 style="text-align: center">
       ทางสถาบันฯ จะประกาศผู้มีสิทธิ์สัมภาษณ์ในวันที่ <?php echo $this->thai_date(strtotime($model->scholarDetail->announce_date));?> ที่ www.es-ilc.org 
   </h3>
   <div class="goback">
        <a href="http://www.es-ilc.org"><span></span>กลับสู่หน้าหลัก</a>
   </div><br/><br/>
   <?php }else{ ?>
      <?php if($model->payment_method != ''){?>
      <h2>ช่องทางการชำระเงินของคุณ คือ <span class="orange"><?php echo $model->payment_method;?></span><br/>
        สถานะการสมัครของคุณ : <span class="orange">ยังไม่ได้ชำระเงิน</span></h2>
      <?php } ?>

      <div class="goback">
        <a href="<?php echo Yii::app()->createUrl('scholarship/edit',array('id'=>$model->scholar_enroll_id)); ?>"><span></span>แก้ไขข้อมูลการสมัคร</a>
      </div>
        <h3>ค่าสมัคร : <?php echo $model->scholarDetail->price;?> บาท</h3>
        <p class="textnormal">(ในกรณีที่ผู้สมัครไม่ได้รับการคัดเลือก ทางสถาบันฯจะมอบ Gift Voucher มูลค่า <?php echo $model->scholarDetail->price;?> บาท ซึ่งสามารถใช้เป็นส่วนลดค่ายภาษาในประเทศต่อไป)</p>
            
        <?php $form=$this->beginWidget('CActiveForm', array(
                                'id'=>'application-form',
                                'enableAjaxValidation'=>false,
                                'htmlOptions' => array('enctype' => 'multipart/form-data'),
                        )); ?>
        <div class="clear"></div>
        <div id="payment">
            <h3>ส่วนที่  4 : เลือกวิธีชำระค่าสมัคร</h3>
            <div>
                    <div class="pay_select">
                            <ul>
                                    <li>
                                        <input onclick="changeMethodPayment('1');" type="radio" name="payment_method" id="payment_transfer" value="bank" <?php if($model->payment_method=='Bank Transfer') echo "checked"?>/>
                                            <label for="payment_transfer">ชำระโดยโอนเงินผ่านบัญชีธนาคาร</label>
                                    </li>
                                    <li>
                                            <input onclick="changeMethodPayment('2');" type="radio" name="payment_method" id="payment_credit" value="c" <?php if($model->payment_method=='Credit Card') echo "checked"?>/>
                                            <label for="payment_credit">ชำระผ่านบัตรเครดิต</label>
                                    </li>
                                    <li>
                                            <input onclick="changeMethodPayment('3');" type="radio" name="payment_method" id="payment_paysbuy" value="psb" <?php if($model->payment_method=='Paysbuy') echo "checked"?>/>
                                            <label for="payment_paysbuy">ชำระผ่านบริการ PAYSBUY</label>
                                    </li>
                                    <li>
                                            <input onclick="changeMethodPayment('4');" type="radio" name="payment_method" id="payment_counter_service" value="cs" <?php if($model->payment_method=='Counter Service') echo "checked"?>/>
                                            <label for="payment_counter_service">ชำระผ่านเคาน์เตอร์เซอร์วิส</label>
                                    </li>
                            </ul>
                        <?php echo $form->error($model,'payment_method'); ?>

                    </div>
                    <div class="pay_bank" id="bank">

                            <h3 style="margin:0;padding:0">ข้อมูลสำหรับการโอนเงิน</h3>
                            <div class="bank">
                                    <b>ธนาคารกสิกรไทย</b><br/>
                                    สาขา สยามสแควร์<br/>
                                    ประเภท บัญชีกระแสรายวัน<br/>
                                    ชื่อบัญชี บริษัท เอ็ดดูเคชั่น สตูดิโอ จำกัด<br/>
                                    เลขที่บัญชี 026-1-10869-0
                            </div>

                    </div>
                    <div class="pay_box pay_creditcard" id="creditcard" style="display:none">
                            <h3>ชำระผ่านบัตรเครดิต</h3>
                            <div class="visa_mastercard"></div>
                    </div>
                    <div class="pay_box pay_paysbuy" id="paysbuy" style="display:none">
                            <h3>ชำระผ่านบริการ PAYSBUY</h3>
                            <div class="paysbuy"></div>
                    </div>
                    <div class="pay_box pay_counterservice" id="counterservice" style="display:none">
                            <h3>ชำระผ่านเคาเตอร์เซอร์วิส</h3>
                            <div class="counterservice"></div>
                    </div>
            </div>
            <div class="clear"></div>
            <div align="center">
                <input type="button" name="Submit" value="ยืนยันข้อมูลและชำระค่าสมัคร" onclick="checkSubmit();" />
            </div>
        </div>
    <h3 class="note">หมายเหตุ : เมื่อสมัครทุนและชำระค่าสมัครเรียบร้อยแล้วจะไม่สามารถแก้ไขข้อมูลการสมัครได้อีก โปรดตรวจสอบข้อมูลของท่านให้เรียบร้อยก่อนการยืนยันข้อมูลและชำระค่าสมัครค่ะ</h3>
        
        <br/>
<input type="Hidden" Name="psb" value="psb"/>
<!--<input Type="Hidden" Name="biz" value="kawiwan_merchant@paysbuy.com"/>-->
<input Type="Hidden" Name="biz" value="kawiwan@hotmail.com"/>
<input Type="Hidden" Name="inv" id="inv" value="<?php echo $model->inv_id;?>"/>
<input Type="Hidden" Name="itm" id="itm" value="ค่าสมัครสอบทุน"/>
<input Type="Hidden" Name="amt" id="amt" value="<?php echo $scholar->price;?>"/>
<input Type="Hidden" Name="opt_fix_method" id="opt_fix_method" value="1"/>
<input Type="Hidden" Name="postURL" value="http://www.e-pretest.com/index.php/index.php?r=scholarship/result"/>
<input Type="Hidden" Name="reqURL" value="http://www.e-pretest.com/index.php/index.php?r=scholarship/result"/>
<?php $this->endWidget(); ?>
<?php }?>