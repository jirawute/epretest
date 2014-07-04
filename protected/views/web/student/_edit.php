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
</script>


					<div class="editinfo_data_box">
                                                        <?php $form=$this->beginWidget('CActiveForm', array(
                                                                                'id'=>'student-form',
                                                                                'enableAjaxValidation'=>false,
                                                                                'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                                                        )); ?>
                                                        <?php echo $form->errorSummary($model,'กรุณากรอกข้อมูลให้ถูกต้อง');?>
							<p class="username">
								ชื่อผู้ใช้: <?php echo $model->username;?>
							</p>
							<p>
								<div class="firstname">
                                                                        <?php echo  $form->labelEx($model,'firstname'); ?>
                                                                        <?php echo $form->textField($model,'firstname',array('class'=>'input')); ?>
                                                                        <?php echo $form->error($model,'firstname'); ?>
								</div>

								<div class="lastname">
                                                                        <?php echo $form->labelEx($model,'lastname'); ?>
                                                                        <?php echo $form->textField($model,'lastname',array('class'=>'input')); ?>
                                                                        <?php echo $form->error($model,'lastname'); ?>
								</div>
							</p>
							<div class="clear"></div>
							<p>
                                                                <?php echo $form->labelEx($model,'address'); ?>
                                                                <?php echo $form->textField($model,'address',array('class'=>'input')); ?>
                                                                <?php echo $form->error($model,'address'); ?>
							</p>


                                                        <div class="clear"></div>
							<p>
                                                           <div class="id_number">
                                                               
                                                                <?php echo $form->labelEx($model,'id_number'); ?>
                                                                <input type="text" name="number1" id="number1" value="<?php if($model->id_number)echo $model->id_number[0];?>" maxlength="1"/> -
                                                                <input type="text" name="number2" id="number2" value="<?php if($model->id_number)echo $model->id_number[1];?>" maxlength="1"/>
                                                                <input type="text" name="number3" id="number3" value="<?php if($model->id_number)echo $model->id_number[2];?>" maxlength="1"/>
                                                                <input type="text" name="number4" id="number4" value="<?php if($model->id_number)echo $model->id_number[3];?>" maxlength="1"/>
                                                                <input type="text" name="number5" id="number5" value="<?php if($model->id_number)echo $model->id_number[4];?>" maxlength="1"/> -
                                                                <input type="text" name="number6" id="number6" value="<?php if($model->id_number)echo $model->id_number[5];?>" maxlength="1"/>
                                                                <input type="text" name="number7" id="number7" value="<?php if($model->id_number)echo $model->id_number[6];?>" maxlength="1"/>
                                                                <input type="text" name="number8" id="number8" value="<?php if($model->id_number)echo $model->id_number[7];?>" maxlength="1"/>
                                                                <input type="text" name="number9" id="number9" value="<?php if($model->id_number)echo $model->id_number[8];?>" maxlength="1"/>
                                                                <input type="text" name="number10" id="number10" value="<?php if($model->id_number)echo $model->id_number[9];?>" maxlength="1"/> -
                                                                <input type="text" name="number11" id="number11" value="<?php if($model->id_number)echo $model->id_number[10];?>" maxlength="1"/>
                                                                <input type="text" name="number12" id="number12" value="<?php if($model->id_number)echo $model->id_number[11];?>" maxlength="1"/> -
                                                                <input type="text" name="number13" id="number13" value="<?php if($model->id_number)echo $model->id_number[12];?>" maxlength="1"/>
							
                                                            </div>
							</p>
							
							<p>
                                                                <?php echo $form->labelEx($model,'school'); ?>
                                                            <?php
      
    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
        'attribute' => 'school',
        'model' => $model,
        'source' => $option_schools,
        // additional javascript options for the autocomplete plugin
        'options' => array(
            'minLength' => '2',
        ),
        'htmlOptions' => array(
            'style' => 'height:20px;',
            'id'=>"school"
        ),
    ));
    ?>
                                                                <?php echo $form->error($model,'school'); ?>
							</p>
							<p>
								<?php echo $form->labelEx($model,'level_id'); ?>
                                                                <?php echo $form->dropDownList($model,'level_id', $option_levels); ?>
                                                                <?php echo $form->error($model,'level_id'); ?>
                                                                
							</p>
							<p>
                                                                <?php echo $form->labelEx($model,'email'); ?>
                                                                <?php echo $form->textField($model,'email',array('class'=>'input')); ?>
                                                                <?php echo $form->error($model,'email'); ?>
							</p>
                                                        <p>
                                                                <?php echo $form->labelEx($model,'phone'); ?>
                                                                <?php echo $form->textField($model,'phone',array('class'=>'input')); ?>
                                                                <?php echo $form->error($model,'phone'); ?>
							</p>
							<p>
                                                                <label>วัน/เดือน/ปีเกิด</label>
                                                                <?php if(($model->birthday)&&($model->birthday!='0000-00-00')){
                                                                        list($y,$m,$d) = explode("-",$model->birthday);
                                                                        $birthday = $d."/".$m."/".($y+543);
                                                                      }else{
                                                                        $day =  date("d");
                                                                        $month =  date("m");
                                                                        $year = date("Y")+543;
                                                                        $birthday = $day.'/'.$month.'/'.$year;
                                                                      }
                                                                      $Date = date('Y-m-d');
                                                                      $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                                        'name' => 'Student[birthday]',
                                                                        'value' => ($birthday)?$birthday:date('d/m/Y', strtotime('+543 year', $Date)),
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
                                                                <?php echo $form->error($model,'date'); ?>
                                                        </p>
							

							<div class="editpass">

								<h3>แก้ไขรหัสผ่านใหม่</h3>
                                                                <?php if(($password_confirm==1)||($password_not_match==1) ){?>
                                                               <p class="errorMessage">
                                                                        <?php if($password_confirm==1) echo $this->label['confirm_pass_label']?>
                                                                        <?php if($password_not_match==1) echo $this->label['pass_not_match_label']?>
                                                                </p>
                                                                <?php } ?>
								<p>
									<label for="user_pass">รหัสผ่านใหม่</label>
									<input type="password" name="new_password" id="user_pass" class="input" value="" />
								</p>
								<p>
									<label for="user_pass_retype">ยืนยันรหัสผ่านใหม่</label>
									<input type="password" name="password_retype" id="user_pass_retype" class="input" value="" />
								</p>
							</div>
							<p class="submit">
                                                            <?php echo CHtml::submitButton('ตกลง',
                                                                    array(
                                                                            'value'=> 'ตกลง',
                                                                            'id'=> 'wp-submit',
                                                                            'class'=> 'button button-primary button-large',
                                                                    )
                                                            ); ?>
							</p>
                                                
					</div>

					<div class="editinfo_pic_box">
                                                <?php if(!$model->image){?>
                                                <img src="images/web/nopic.png" style="width:180px;" class="news_pic"/>
                                                <?php }else{?>
                                                <img src="uploads/student/<?php echo $model->image;?>" style="width:180px;" class="news_pic">
                                                <?php }?>
						<p>
							<label>อัพโหลดภาพโปรไฟล์</label>
                                                         <?php echo $form->fileField($model,'image',array('style'=>'border: none;box-shadow:none')); ?>
                                                </p>
                                                 (รูปภาพนามสกุล .jpg, .jpeg, .png, .gif เท่านั้น)
					</div>
                                <?php $this->endWidget(); ?>

