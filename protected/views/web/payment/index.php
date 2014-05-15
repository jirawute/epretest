<?php
if (!Yii::app()->user->id)
    header("Location: ?r=site/login");
?>
<script type="text/javascript">
    $(function() {
        var $radios = $('input:radio[id=payment_coupon]');
        if ($radios.is(':checked') === true) {
            document.getElementById('coupon').style.display = "";
            document.getElementById('bank').style.display = "none";
        }
    });
    function checkValidateCouponCode(value) {
        document.getElementById('spin').innerHTML = '<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/web/loader.gif"/>';
        $.ajax({
            url: 'index.php?r=payment/checkcoupon&c=' + value,
            type: 'GET',
            dataType: 'html',
            success: function(data, textStatus, xhr) {
                //alert(data);
                if (data == 'Y') {
                    document.getElementById('spin').innerHTML = '<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/web/exists.png"/>';
                    document.getElementById('coupon_status').value = 'Y';
                } else {
                    document.getElementById('spin').innerHTML = '<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/web/not-exists.png"/>';
                    document.getElementById('coupon_status').value = 'N';
                }
            },
            error: function(request, status, error) {
                document.getElementById('spin').innerHTML = '<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/web/not-exists.png"/>';
                alert("Error: " + error + "\nResponseText: " + request.responseText);
            }
        });

    }
    function changeMethodPayment(type) {
        if (type == '1') {
            document.getElementById('bank').style.display = "";
            document.getElementById('creditcard').style.display = "none";
            document.getElementById('paysbuy').style.display = "none";
            document.getElementById('counterservice').style.display = "none";
            document.getElementById('coupon').style.display = "none";
        } else if (type == '2') {
            document.getElementById('bank').style.display = "none";
            document.getElementById('creditcard').style.display = "";
            document.getElementById('paysbuy').style.display = "none";
            document.getElementById('counterservice').style.display = "none";
            document.getElementById('coupon').style.display = "none";
        } else if (type == '3') {
            document.getElementById('bank').style.display = "none";
            document.getElementById('creditcard').style.display = "none";
            document.getElementById('paysbuy').style.display = "";
            document.getElementById('counterservice').style.display = "none";
            document.getElementById('coupon').style.display = "none";
        } else if (type == '4') {
            document.getElementById('bank').style.display = "none";
            document.getElementById('creditcard').style.display = "none";
            document.getElementById('paysbuy').style.display = "none";
            document.getElementById('counterservice').style.display = "";
            document.getElementById('coupon').style.display = "none";
        } else {
            document.getElementById('bank').style.display = "none";
            document.getElementById('creditcard').style.display = "none";
            document.getElementById('paysbuy').style.display = "none";
            document.getElementById('counterservice').style.display = "none";
            document.getElementById('coupon').style.display = "";
        }

    }
    function checkSubmit() {
        var amt;
        for (i = 1; i <= 4; i++) {
            if (document.getElementById('tick_' + i).checked) {
                amt = document.getElementById('tick_' + i).value;
                document.getElementById('amt').value = document.getElementById('tick_' + i).value;
                document.getElementById('itm').value = document.getElementById('desc_' + i).value;
                document.getElementById('credit_point').value = document.getElementById('credit_' + i).value;
            }
        }
        var temp = document.getElementById('payment_counter_service').checked? "&&amt="+amt:"";
        
        $.ajax({
            url: 'index.php?r=payment/getinvoice' + temp,
            type: 'GET',
            dataType: 'html',
            success: function(data, textStatus, xhr) {
                document.getElementById('inv').value = data;

                if (document.getElementById('payment_counter_service').checked) {
                    document.forms['payment_form'].action = "https://www.paysbuy.com/paynow.aspx?cs=true&lang=t";
                    document.forms['payment_form'].submit();
                } else if (document.getElementById('payment_transfer').checked) {
                    var result = confirm('ยืนยันวิธีการชำระเงินโดยโอนเงินผ่านบัญชีธนาคาร');
                    if (result == true) {
                        document.forms['payment_form'].action = "index.php?r=payment/bank";
                        document.forms['payment_form'].submit();
                    } else {
                        return false;
                    }

                } else if (document.getElementById('payment_credit').checked) {
                    document.forms['payment_form'].action = "https://www.paysbuy.com/paynow.aspx?c=true&lang=t";
                    document.forms['payment_form'].submit();
                } else if (document.getElementById('payment_coupon').checked) {
                    if (document.getElementById('coupon_code').value == '') {
                        alert('กรุณากรอกรหัสคูปองค่ะ');
                        document.getElementById('coupon_code').focus();
                        return false;
                    }
                    if (document.getElementById('coupon_status').value != 'Y') {
                        alert('รหัสไม่ถูกต้องกรุณากรอกรหัสใหม่คะ');
                        document.getElementById('coupon_code').focus();
                        return false;
                    }


                    document.forms['payment_form'].action = "index.php?r=payment/coupon";
                    document.forms['payment_form'].submit();

                }

            },
            error: function(request, status, error) {
                alert("Error: " + error + "\nResponseText: " + request.responseText);
            }
        });

        /*if(document.getElementById('payment_transfer').checked){
         document.forms['payment_form'].action = "";
         document.forms['payment_form'].submit();      
         }else if(document.getElementById('payment_credit').checked){
         document.forms['payment_form'].action = "https://www.paysbuy.com/paynow.aspx?c=true";
         document.forms['payment_form'].submit();
         }else if(document.getElementById('payment_paysbuy').checked){
         document.forms['payment_form'].action = "https://www.paysbuy.com/paynow.aspx?psb=true";
         document.forms['payment_form'].submit();
         }*/
    }
    function appBtn(data) {
        document.getElementById('confirmBtn').value = "ยืนยันการชำระเงิน" + data;
    }
</script>
<div class="grid_4 push_4 goback">
    <a href="?r=student/view&id=<?php echo Yii::app()->user->id; ?>"><span></span>กลับสู่หน้าหลัก</a>
</div>
<div class="clear"></div>
<?php if (Yii::app()->user->hasFlash('success')) { ?>
    <div class="grid_10 push_1 login_signup" style="margin-top:40px;">
        <div class="signup_box">
            <div class="flash-success">
                <?php echo Yii::app()->user->getFlash('success'); ?>
            </div>
        </div>
    </div>
<?php } else { ?>
    <form name="payment_form" id="payment_form" method="post" action="" >
        <div class="grid_10 push_1">
            <div class="credit_box">
                <div class="credit_pic_1">
                    <h2>เลือกวิธีการชำระเงิน</h2>
                    <ul>
                        <!--li>
                                <input onclick="changeMethodPayment('3');" type="radio" name="payment_method" id="payment_paysbuy" value="Paysbuy"/>
                                <label for="payment_paysbuy">ชำระผ่านบริการ PAYSBUY</label>
                        </li-->
                        <li>
                            <input onclick="changeMethodPayment('4');
            appBtn('ผ่านเคาน์เตอร์เซอร์วิส');" type="radio" name="payment_method" id="payment_counter_service" value="counter_service"/>
                            <label for="payment_counter_service">ชำระผ่านเคาน์เตอร์เซอร์วิส</label>
                        </li>
                        <li>
                            <input onclick="changeMethodPayment('1');
            appBtn('โดยการโอนเงิน');" type="radio" name="payment_method" id="payment_transfer" value="Transfer"/>
                            <label for="payment_transfer">โอนเงินผ่านบัญชีธนาคาร</label>
                        </li>
                        <li>
                            <input onclick="changeMethodPayment('2');
            appBtn('ผ่านบัตรเครดิต');" type="radio" name="payment_method" id="payment_credit" value="Credit Card"/>
                            <label for="payment_credit">ชำระผ่านบัตรเครดิต</label>
                        </li>
                        <li>
                            <input onclick="changeMethodPayment('5');
            appBtn('โดยการโอนเงิน');" type="radio" name="payment_method" id="payment_coupon" value="coupon"/>
                            <label for="payment_coupon">ใช้คูปองเติมเครดิต</label>
                        </li>
                    </ul>
    <!--<input type="button" name="Submit" value="ยืนยันการชำระเงิน" onclick="checkSubmit();"/>-->
                </div>
                <div class="credit_select1">
                    <!--<h2>วิธีการชำระเงิน</h2>-->
                    <ul>
                        <li>
                            <div class="pay_bank" id="bank" style="display:none">
                                <!--<div class="credit_select">-->
                                <h3>ข้อมูลสำหรับการโอนเงิน</h3>

                                <div class="bank">
                                    <h4>ธนาคารกสิกรไทย</h4>
                                    <p>สาขา สยามสแควร์</p>
                                    <p>ประเภท บัญชีกระแสรายวัน</p>
                                    <p>ชื่อบัญชี บริษัท เอ็ดดูเคชั่น สตูดิโอ จำกัด</p>
                                    <p>เลขที่บัญชี 026-1-10869-0</p>
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
                            <div class="pay_box pay_coupon" id="coupon" style="display:none">

                                <h3>ใช้คูปองสมนาคุณเติมเครดิต</h3>

                                <div class="bank">
                                    <p>กรุณากรอกรหัสคูปองที่ใช้ค่ะ (กรอกรหัส 6 หลัก)</p>
                                    <input type="text" name="coupon_code" id="coupon_code" onblur="checkValidateCouponCode(this.value)" size="10" maxlength="6" />&nbsp;
                                    <input type="hidden" name="coupon_status" id="coupon_status" value="">
                                    <div class="grid_4 push_4 goback">
                                        <a href="" onclick="checkSubmit();">ยืนยัน</a>
                                    </div>
                                    <span id="spin"></span>
                                </div>

                            </div>
                        </li>
                    </ul>
                </div>


                <div class="credit_pic">
                    <h2>เติมเครดิต</h2>
                </div>
                <div class="credit_select">
                    <h2>เลือกจำนวนเครดิตที่ต้องการเติม</h2>
                    <?php
                    $criteria = new CDbCriteria();
                    $criteria->select = '*';
                    $criteria->condition = 'credit_status=:status ';
                    $criteria->params = array(':status' => 1);
                    $criteria->order = 'credit_order';
                    $credits = Credit::model()->findAll($criteria);
                    ?>
                    <ul>

                        <?php
                        $i = 1;
                        foreach ($credits as $credit) {
                            ?>
                            <li>
                                <input type="radio" id="tick_<?php echo $i ?>" name="tick" value="<?php echo $credit->credit_amount; ?>" />
                                <input type="hidden" id="desc_<?php echo $i; ?>" name="desc_<?php echo $i; ?>" value="<?php echo $credit->credit_desc; ?>"/>
                                <input type="hidden" id="credit_<?php echo $i; ?>" name="credit_<?php echo $i; ?>" value="<?php echo $credit->credit_point; ?>"/>
                                <label for="tick_<?php echo $credit->credit_id; ?>">
                                    <h3><?php echo number_format($credit->credit_point); ?> เครดิต</h3>
                                    <p><?php echo number_format($credit->credit_amount); ?> บาท</p>
                                </label>
                            </li>
                            <?php
                            $i++;
                        }
                        ?>
                        <input type="Hidden" id="credit_point" Name="credit_point" value=""/>
                    </ul>

                </div>
            </div>

        </div>
        <div class="clear"></div>
        <div class="grid_10 push_1">
            <div class="credit_option">
                <div class="pay_select">
                    <input id='confirmBtn' type="button" name="Submit" value="ยืนยันการชำระเงิน" onclick="checkSubmit();"/>
                    <div id="counterAlert" style="display:none">                        
                        กรุณากดปุ่ม <font color="#11100" style="font-size:150%"><strong>สิ้นสุดการทำรายการ</strong></font> ทุกครั้งหลังพิมพ์เพื่อให้รายการสมบูรณ์<br />
                        <font color="#FC9403" style="font-size:150%"><strong>*** หมายเหตุ: สำคัญมาก หากไม่กดเงินจะไม่เข้าระบบ ***</strong></font>
                        </p>
                    </div>
                </div>
            </div>

            <input type="Hidden" Name="psb" value="psb"/>
            <!--<input Type="Hidden" Name="biz" value="kawiwan_merchant@paysbuy.com"/>-->
            <input Type="Hidden" Name="biz" value="kawiwan@hotmail.com"/>
            <input Type="Hidden" Name="inv" id="inv" value=""/>
            <input Type="Hidden" Name="itm" id="itm" value=""/>
            <input Type="Hidden" Name="amt" id="amt" value=""/>
            <input Type="Hidden" Name="opt_fix_method" id="opt_fix_method" value="1"/>
            <input Type="Hidden" Name="postURL" value="http://www.e-pretest.com/index.php/index.php?r=payment/result"/>
            <input Type="Hidden" Name="reqURL" value="http://www.e-pretest.com/index.php/index.php?r=payment/result"/>
    </form>
<?php } ?>