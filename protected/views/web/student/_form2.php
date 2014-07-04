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
                                                        <?php echo $form->errorSummary($model,'กรุณากรอกข้อมูลให้ถูกต้องและครบถ้วน');?>
                                                        <div class="editpass">

								<h3>ข้อมูลในการ Log in</h3>
								<p>
									<?php echo  $form->labelEx($model,'username'); ?>
                                                                        <?php echo $form->textField($model,'username',array('class'=>'input')); ?>
                                                                        <?php echo $form->error($model,'username'); ?>
								</p>
								<p>
									<?php echo $form->labelEx($model,'password'); ?>
                                                                        <?php echo $form->passwordField($model,'password',array('class'=>'input')); ?>
                                                                        <?php echo $form->error($model,'password'); ?>
								</p>

                                                                 <p>
                                                                        <label for="user_pass_retype">ยืนยันรหัสผ่าน *</label>
                                                                        <input type="password" name="password_confirm" id="password_confirm" class="input" value="<?=$model->password;?>" />

                                                               </p>
                                                                <?php if(($password_confirm==1)||($password_not_match==1) ){?>
                                                               <p class="errorMessage">
                                                                        <?php if($password_confirm==1) echo $this->label['confirm_pass_label']?>
                                                                        <?php if($password_not_match==1) echo $this->label['pass_not_match_label']?>
                                                                </p>
                                                                <?php } ?>
							</div>
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
                                                                <?php echo $form->labelEx($model,'level_id'); ?>
                                                                <?php echo $form->dropDownList($model,'level_id', $option_levels,array(
                                                                                'prompt' => '--กรุณาเลือก--',
                                                                                'value' => '',)); ?>
                                                                <?php echo $form->error($model,'level_id'); ?>
                                                        </p>
                                                        <p>
                                                                <?php echo $form->labelEx($model,'school'); ?>
                                                                <?php
                                                                    /* echo $form->dropDownList($model,'school', $option_schools,array(
                                                                      'prompt' => '--กรุณาเลือก--',
                                                                      'value' => '0',)); */
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
                                                                        ),
                                                                    ));
                                                                ?>
                                                                <?php echo $form->error($model,'school'); ?>
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
                                                                 <?php
                                                                        $day =  date("d");
                                                                        $month =  date("m");
                                                                        $year = date("Y")+543;
                                                                        $today = $day.'/'.$month.'/'.$year;

                                                                      $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                                        'name' => 'Student[birthday]',
                                                                        'language'=>'th',
                                                                        'value' => $today,
                                                                        'options'=>array(
                                                                                        'showAnim'=>'fold',
                                                                                        'changeMonth'=>true,
                                                                                        'dateFormat'=>'dd/mm/yy',
                                                                                        'yearRange'=>'-50:+0',
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
                                                        </p>
							<p class="submit">
                                                            <?php echo CHtml::submitButton('สมัครสมาชิก',
                                                                    array(
                                                                            'value'=> 'สมัครสมาชิก',
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

