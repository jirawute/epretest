<script type="text/javascript">
$(function(){
	$("input[name^='number']").keyup(function(event){
		if(event.keyCode==8){
			if($(this).val().length==0){
				$(this).prev("input").focus();
			}
			return false;
		}
		if($(this).val().length==$(this).attr("maxLength")){
			$(this).next("input").focus();
		}
	});
});
    function changeMethodPayment(type){
        if(type=='1'){
             document.getElementById('bank').style.display = "";
             document.getElementById('creditcard').style.display = "none";
             document.getElementById('paysbuy').style.display = "none";
             document.getElementById('counterservice').style.display = "none";
        }else if(type=='2'){
             document.getElementById('bank').style.display = "none";
             document.getElementById('creditcard').style.display = "";
             document.getElementById('paysbuy').style.display = "none";
             document.getElementById('counterservice').style.display = "none";
        }else if(type=='3'){
             document.getElementById('bank').style.display = "none";
             document.getElementById('creditcard').style.display = "none";
             document.getElementById('paysbuy').style.display = "";
             document.getElementById('counterservice').style.display = "none";
        }else if(type=='4'){
             document.getElementById('bank').style.display = "none";
             document.getElementById('creditcard').style.display = "none";
             document.getElementById('paysbuy').style.display = "none";
             document.getElementById('counterservice').style.display = "";
        }else{
             document.getElementById('bank').style.display = "none";
             document.getElementById('creditcard').style.display = "none";
             document.getElementById('paysbuy').style.display = "none";
             document.getElementById('counterservice').style.display = "none";
        }

    }

    function onChangeTravelAbroad(){

        var value = document.getElementById('Scholarship_travel_abroad_status').value;
        if(value==1){
            document.getElementById('travel1').style.display="";
            document.getElementById('travel2').style.display="";
        }else{
            document.getElementById('travel1').style.display="none";
            document.getElementById('travel2').style.display="none";
        }
    }

    function onChangeHowtoknow(){

        var value = document.getElementById('Scholarship_how_to_know').value;
        if(value==0){
            document.getElementById('howtoknow').style.display="";
        }else{
            document.getElementById('howtoknow').style.display="none";
        }
    }


    function checkSubmit(){
               if(document.getElementById('payment_transfer').checked){
                     var result= confirm('ยืนยันวิธีการชำระเงินโดยโอนเงินผ่านบัญชีธนาคาร');
                     if (result== true){

                         document.getElementById('application-form').action  = "index.php?r=scholarship/bank";
                         document.getElementById('application-form').submit();
                     }else{
                         return false;
                     }

                }else if(document.getElementById('payment_credit').checked){
                    document.getElementById('application-form').action = "https://www.paysbuy.com/paynow.aspx?c=true&lang=t";
                    document.getElementById('application-form').submit();
                }else if(document.getElementById('payment_paysbuy').checked){
                    document.getElementById('application-form').action = "https://www.paysbuy.com/paynow.aspx?psb=true&lang=t";
                    document.getElementById('application-form').submit();
                }else if(document.getElementById('payment_counter_service').checked){
                    document.getElementById('application-form').action  = "https://www.paysbuy.com/paynow.aspx?cs=true&lang=t";
                    document.getElementById('application-form').submit();
                }

//                }else if(document.getElementById('payment_credit').checked){
//                    document.getElementById('application-form').action = "http://demo.paysbuy.com/paynow.aspx?c=true&lang=t";
//                    document.getElementById('application-form').submit();
//                }else if(document.getElementById('payment_paysbuy').checked){
//                    document.getElementById('application-form').action = "http://demo.paysbuy.com/paynow.aspx?psb=true&lang=t";
//                    document.getElementById('application-form').submit();
//                }else if(document.getElementById('payment_counter_service').checked){
//                    document.getElementById('application-form').action  = "http://demo.paysbuy.com/paynow.aspx?cs=true&lang=t";
//                    document.getElementById('application-form').submit();
//                }


    }

</script>
<div class="grid_12  application">
    <h2><?php echo $scholar->name;?><br/>
      <?php echo $scholar->desc;?>
    </h2>
    <div class="editinfo_box">

    <?php echo $this->renderPartial('_form2', array('model'=>$model, 'how_to_know_list'=>$how_to_know_list,'scholar'=>$scholar,)); ?>

    </div>
</div>