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
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'scholarship-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
                <label>รหัสทุนที่สมัคร</label>
		<?php echo $form->textField($model,'scholar_id',array('size'=>5)); ?>
                <?php echo $form->error($model,'scholar_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title_th'); ?>
		<?php echo $form->dropDownList($model, 'title_th', array('เด็กชาย'=>'เด็กชาย','เด็กหญิง'=>'เด็กหญิง','นาย'=>'นาย','นางสาว'=>'นางสาว'),array(
                                                                                'prompt' => '--กรุณาเลือก--',
                                                                                )); ?>
		<?php echo $form->error($model,'title_th'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_th'); ?>
		<?php echo $form->textField($model,'name_th',array('size'=>40,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name_th'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'surename_th'); ?>
		<?php echo $form->textField($model,'surename_th',array('size'=>40,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'surename_th'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title_en'); ?>
		<?php echo $form->dropDownList($model, 'title_en', array('Master'=>'Master','Miss'=>'Miss','Mr.'=>'Mr.'),array(
                                                                                'prompt' => '--กรุณาเลือก--',
                                                                                )); ?> <span class="spantext">สะกดให้ตรงตามหน้าพาสปอร์ต  (หากมี)</span>

		<?php echo $form->error($model,'title_en'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'name_en'); ?>
		<?php echo $form->textField($model,'name_en',array('size'=>40,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'surename_en'); ?>
		<?php echo $form->textField($model,'surename_en',array('size'=>40,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'surename_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nickname_th'); ?>
		<?php echo $form->textField($model,'nickname_th',array('size'=>10,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nickname_th'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nickname_en'); ?>
		<?php echo $form->textField($model,'nickname_en',array('size'=>10,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nickname_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_card'); ?>
                <input type="text" name="number1" id="number1" value="<?php if($model->id_card)echo $model->id_card[0];?>" maxlength="1" size="1"/> -
                <input type="text" name="number2" id="number2" value="<?php if($model->id_card)echo $model->id_card[1];?>" maxlength="1" size="1"/>
                <input type="text" name="number3" id="number3" value="<?php if($model->id_card)echo $model->id_card[2];?>" maxlength="1" size="1"/>
                <input type="text" name="number4" id="number4" value="<?php if($model->id_card)echo $model->id_card[3];?>" maxlength="1" size="1"/>
                <input type="text" name="number5" id="number5" value="<?php if($model->id_card)echo $model->id_card[4];?>" maxlength="1" size="1"/> -
                <input type="text" name="number6" id="number6" value="<?php if($model->id_card)echo $model->id_card[5];?>" maxlength="1" size="1"/>
                <input type="text" name="number7" id="number7" value="<?php if($model->id_card)echo $model->id_card[6];?>" maxlength="1" size="1"/>
                <input type="text" name="number8" id="number8" value="<?php if($model->id_card)echo $model->id_card[7];?>" maxlength="1" size="1"/>
                <input type="text" name="number9" id="number9" value="<?php if($model->id_card)echo $model->id_card[8];?>" maxlength="1" size="1"/>
                <input type="text" name="number10" id="number10" value="<?php if($model->id_card)echo $model->id_card[9];?>" maxlength="1" size="1"/> -
                <input type="text" name="number11" id="number11" value="<?php if($model->id_card)echo $model->id_card[10];?>" maxlength="1" size="1"/>
                <input type="text" name="number12" id="number12" value="<?php if($model->id_card)echo $model->id_card[11];?>" maxlength="1" size="1"/> -
                <input type="text" name="number13" id="number13" value="<?php if($model->id_card)echo $model->id_card[12];?>" maxlength="1" size="1"/>
		<?php echo $form->error($model,'id_card'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birthday'); ?>
                <?php if(($model->birthday)&&($model->birthday!='0000-00-00')){
                      list($y,$m,$d) = explode("-",$model->birthday);
                        $birthday = $d."/".$m."/".($y+543);
                      }else{
                        $day =  date("d");
                        $month =  date("m");
                        $year = date("Y")+543;
                        $birthday = $day.'/'.$month.'/'.$year;
                      }
                      $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'name' => 'Scholarship[birthday]',
                        'value' => $birthday,
                        'language'=>'th',
                        'options'=>array(
                                        'showAnim'=>'fold',
                                        'changeMonth'=>true,
                                        'dateFormat'=>'dd/mm/yy',
                                        'yearRange'=>'-30:+0',
                                        'changeYear'=>true,
                                        'changeDate'=>true,
                                        'showAnim'=>'fold',
                                        //'showButtonPanel'=>true,
                                        'debug'=>true,
                                        'beforeShow'=>'js:function(){
                                            if($(this).val()!=""){
                                                var arrayDate=$(this).val().split("/");
                                                arrayDate[2]=parseInt(arrayDate[2])-543;
                                                $(this).val(arrayDate[0]+"/"+arrayDate[1]+"/"+arrayDate[2]);
                                            }
                                            setTimeout(function(){
                                                $.each($(".ui-datepicker-year option"),function(j,k){
                                                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
                                                    $(".ui-datepicker-year option").eq(j).text(textYear);
                                                });
                                            },50);

                                            }',
                                         'onChangeMonthYear'=> 'js:function(){
                                                setTimeout(function(){
                                                    $.each($(".ui-datepicker-year option"),function(j,k){
                                                        var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
                                                        $(".ui-datepicker-year option").eq(j).text(textYear);
                                                    });
                                                },50);
                                            }',
                                        'onClose'=>'js:function(){
                                            if($(this).val()!="" && $(this).val()==dateBefore){
                                                var arrayDate=dateBefore.split("/");
                                                arrayDate[2]=parseInt(arrayDate[2])+543;
                                                $(this).val(arrayDate[0]+"/"+arrayDate[1]+"/"+arrayDate[2]);
                                            }
                                        }',
                                        'onSelect'=>'js:function(dateText, inst){
                                            dateBefore=$(this).val();
                                            var arrayDate=dateText.split("/");
                                            arrayDate[2]=parseInt(arrayDate[2])+543;
                                            $(this).val(arrayDate[0]+"/"+arrayDate[1]+"/"+arrayDate[2]);
                                        }',
                                    ),
                            'htmlOptions' => array(
                            'class'=>'shadowdatepicker',
                            'readonly'=>"readonly",
                            'style'=>'height:20px;',
                        ),
                    )); ?>
		<?php echo $form->error($model,'birthday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'age'); ?>
		<?php echo $form->textField($model,'age',array('size'=>5,'maxlength'=>2));  ?> ปี
		<?php echo $form->error($model,'age'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'school'); ?>
		<?php echo $form->textField($model,'school',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'school'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'major'); ?>
		<?php echo $form->textField($model,'major',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'major'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_name'); ?>
		<?php echo $form->textField($model,'parent_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'parent_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_phone'); ?>
		<?php echo $form->textField($model,'parent_phone',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'parent_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'disease'); ?>
		<?php echo $form->textField($model,'disease',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'disease'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'talent'); ?>
		<?php echo $form->textArea($model,'talent',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'talent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'language'); ?>
		<?php if($model->language){
                    
                        $mystring = $model->language;
                        $language1   = 'ภาษาอังกฤษ';
                        $language2   = 'ภาษาจีน';
                        $language3   = 'อื่นๆ';
                        $pos1 = strpos($mystring, $language1);
                        $pos2 = strpos($mystring, $language2);
                        $pos3 = strpos($mystring, $language3);

                }else{
                        $pos1 = false;
                        $pos2 = false;
                        $pos3 = false;
                }
                ?>
                <input id="Scholarship_language_0" type="checkbox" name="Scholarship[language][]" value="ภาษาอังกฤษ" <?php if ($pos1 !== false){ echo "checked"; }?>/> &nbsp;<span class="spantext">ภาษาอังกฤษ</span>&nbsp;
                <input id="Scholarship_language_1" type="checkbox" name="Scholarship[language][]" value="ภาษาจีน" <?php if ($pos2 !== false){ echo "checked"; }?>/> &nbsp;<span class="spantext">ภาษาจีน</span>&nbsp;
                <input id="Scholarship_language_2" type="checkbox" name="Scholarship[language][]" value="อื่นๆ" <?php if ($pos3 !== false || ($model->language_other)){ echo "checked"; }?> />&nbsp;<span class="spantext">อื่นๆ ระบุ</span>
                <?php echo $form->textField($model,'language_other',array('size'=>10,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'language'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'travel_abroad_status'); ?>
                <?php echo $form->dropDownList($model,'travel_abroad_status', array('1'=>'เคย','0'=>'ไม่เคย'),array(
                                                                                    'prompt' => '--กรุณาเลือก--',
                                                                                    'onchange'=>'onChangeTravelAbroad();',
                                                                                    )); ?> <span class="spantext" id="travel1" <?php if(!$model->travel_abroad_detail) {?>style="display:none"<?php }?>>โปรดระบุ</span>
                <span id="travel2" <?php if(!$model->travel_abroad_detail) {?>style="display:none"<?php }?>><?php echo $form->textField($model,'travel_abroad_detail',array('size'=>20,'maxlength'=>255)); ?></span>
                
		<?php echo $form->error($model,'travel_abroad_status'); ?>
	</div>

	<div class="row">
                <?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model,'image',array('style'=>'border: none;box-shadow:none')); ?><br />
                <?php if(!$model->isNewRecord) echo CHtml::image(Yii::app()->request->baseUrl . '/uploads/scholarships/' . $model->image, '', array('style'=>'width: 180px')); ?>
		<?php echo $form->error($model,'image'); ?>            
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'portfolio'); ?>
		<?php echo $form->fileField($model,'portfolio',array('style'=>'border: none;box-shadow:none')); ?><br />
                <?php if(!$model->isNewRecord) {echo $model->portfolio." "; if($model->portfolio) {echo cHtml::link('view', '../../uploads/scholarships/'.$model->portfolio);} }?>
		<?php echo $form->error($model,'portfolio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'how_to_know'); ?>
		<?php echo $form->dropDownList($model,'how_to_know',$how_to_know_list,array(
                                                                        'prompt' => '--กรุณาเลือก--',
                                                                        'onchange'=>'onChangeHowtoknow();',
                                                                        )); ?>
                <span id="howtoknow" <?php if(!$model->how_to_know_other) {?>style="display:none"<?php }?>><?php echo $form->textField($model,'how_to_know_other',array('size'=>20,'maxlength'=>255)); ?></span>
		
		<?php echo $form->error($model,'how_to_know'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profile'); ?>
		<?php echo $form->textArea($model,'profile',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'profile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reason'); ?>
		<?php echo $form->textArea($model,'reason',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'reason'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'message'); ?>
		<?php echo $form->textArea($model,'message',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'message'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'scholarship_type'); ?>
                <div class="type">
                <input style="float:left" id="Scholarship_scholarship_type_1" type="radio" name="Scholarship[scholarship_type]" <?php if($model->scholarship_type==1){?>checked="checked"<?php } ?> value="1"/>
                <label style="float:left" for="Scholarship_scholarship_type_1">1</label>
                 <div class="clear"></div>
                <input style="float:left" id="Scholarship_scholarship_type_2" type="radio" name="Scholarship[scholarship_type]" <?php if($model->scholarship_type==2){?>checked="checked"<?php } ?> value="2"/>
                <label for="Scholarship_scholarship_type_2">2</label>
                <input style="float:left" id="Scholarship_scholarship_type_3" type="radio" name="Scholarship[scholarship_type]" <?php if($model->scholarship_type==3){?>checked="checked"<?php } ?> value="3"/>
                <label style="float:left" for="Scholarship_scholarship_type_3">3</label>
                 <div class="clear"></div>
                <input style="float:left" id="Scholarship_scholarship_type_4" type="radio" name="Scholarship[scholarship_type]" <?php if($model->scholarship_type==4){?>checked="checked"<?php } ?> value="4"/>
                <label for="Scholarship_scholarship_type_4">4</label>
                
                
                </div>
            
		<?php echo $form->error($model,'scholarship_type'); ?>
	</div>
        <div class="clear"></div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_status'); ?>
                <?php echo $form->dropDownList($model,'payment_status',$order_status_list); ?>
		<?php echo $form->error($model,'payment_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_method'); ?>
                <?php echo $form->dropDownList($model, 'payment_method', array('Bank Transfer'=>'Bank Transfer','Credit Card'=>'Credit Card','Paysbuy'=>'Paysbuy','Counter Service'=>'Counter Service')); ?>
		<?php echo $form->error($model,'payment_method'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_amount'); ?>
		<?php echo $form->textField($model,'payment_amount'); ?> บาท
		<?php echo $form->error($model,'payment_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inv_id'); ?>
		<?php echo $form->textField($model,'inv_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'inv_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
                <?php echo $form->dropDownList($model, 'status', array('0'=>'ไม่ผ่าน','1'=>'รอคัดกรอง','2'=>'ได้รับสิทธิ์สัมภาษณ์','3'=>'ได้รับทุน')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->