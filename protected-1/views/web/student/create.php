<script>
function isEmail(email) {
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
<?php echo $this->renderPartial('_form', array('model'=>$model,'password_not_match'=>$password_not_match,'password_confirm'=>$password_confirm,'option_levels'=>$option_levels)); ?>