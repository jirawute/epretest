<script>
function isEmail(email) {
return "XX";
        return /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test(email);

}
function validateForm()
{
    var email1=document.getElementById("email_1").value;
    var email2=document.getElementById("email_2").value;
    var email3=document.getElementById("email_3").value;
    var email4=document.getElementById("email_4").value;
    var email5=document.getElementById("email_5").value;

    if (email1)
    {
        if(isEmail(email1)==false){
            alert("รูปแบบอีเมล์ไม่ถูกต้องคะ");
            document.getElementById("email_1").focus();
            return false;
        }
    }
    if (email2)
    {
        if(isEmail(email2)==false){
            alert("รูปแบบอีเมล์ไม่ถูกต้องคะ");
            document.getElementById("email_2").focus();
            return false;
        }
    }
    if (email3)
    {
        if(isEmail(email3)==false){
            alert("รูปแบบอีเมล์ไม่ถูกต้องคะ");
            document.getElementById("email_3").focus();
            return false;
        }
    }
    if (email4)
    {
        if(isEmail(email4)==false){
            alert("รูปแบบอีเมล์ไม่ถูกต้องคะ");
            document.getElementById("email_4").focus();
            return false;
        }
    }
    if (email5)
    {
        if(isEmail(email5)==false){
            alert("รูปแบบอีเมล์ไม่ถูกต้องคะ");
            document.getElementById("email_5").focus();
            return false;
        }
    }
}
</script>
<?php if(Yii::app()->user->hasFlash('create')): ?>
<div class="grid_4 push_4 goback">
        <a href="index.php"><span></span>กลับสู่หน้าหลัก</a>
</div>
<div class="clear"></div>
<div class="grid_10 push_1 login_signup" style="margin-top:40px;">
    <div class="signup_box">
        <div class="flash-success">
                <?php echo Yii::app()->user->getFlash('create'); ?>
            <br/>
            <!--h3>กรอกอีเมล์เพื่อนของคุณ</h3>
            <p>กรอกอีเมล์เพื่อแนะนำเพื่อนของคุณ ยิ่งกรอกมาก ยิ่งได้รับสิทธิพิเศษมาก</p><br/>
            <form class="form_send_email" name="friend_email" id="friend_email" action="index.php?r=student/sendEmailFriend" method="post" onsubmit="return validateForm()" >
                <div><label>1.</label><input type="text" name="friend_email[]" id="email_1"/></div>
                <div><label>2.</label><input type="text" name="friend_email[]" id="email_2"/></div>
                <div><label>3.</label><input type="text" name="friend_email[]" id="email_3"/></div>
                <div><label>4.</label><input type="text" name="friend_email[]" id="email_4"/></div>
                <div><label>5.</label><input type="text" name="friend_email[]" id="email_5"/></div>
                <input type="hidden" name="student_id" value="<?php //echo $_GET['id'];?>">
                <div align="center"><input type="submit" value="ส่งข้อมูล"/></div>

            </form-->
        </div>
    </div>
</div>
<?php else: ?>
<div class="clear"></div>
<div class="grid_10 push_1 editinfo">

    <div class="editinfo_box">
        <h2>สมัครสมาชิก</h2>
        <?php echo $this->renderPartial('_form2', array('model'=>$model,'option_levels'	=> $option_levels,'option_schools'=>$option_schools, 'password_confirm'=>$password_confirm,
                        'password_not_match'=>$password_not_match,)); ?>
    </div>
</div>
<?php endif; ?>
