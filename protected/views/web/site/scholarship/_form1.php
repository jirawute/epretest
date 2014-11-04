   <?php if(Yii::app()->user->hasFlash('success')): ?>

    <div align="center">
        <h3><?php echo Yii::app()->user->getFlash('success'); ?></h3>
    </div>
    <div class="goback">
            <a href="http://www.es-ilc.org"><span></span>กลับสู่หน้าหลัก</a>
    </div>
    <br/><br/>

    <?php else: ?>
        <?php $form=$this->beginWidget('CActiveForm', array(
                                'id'=>'application-form',
                                'enableAjaxValidation'=>false,
                                'htmlOptions' => array('enctype' => 'multipart/form-data'),
                        )); ?>
        <div class="clear"></div>
        <h3>ส่วนที่ 1 : ข้อมูลทั่วไปของผู้สมัคร</h3>
        <p>
                <?php echo $form->labelEx($model,'title_th'); ?>
                <?php echo $form->dropDownList($model, 'title_th', array('เด็กชาย'=>'เด็กชาย','เด็กหญิง'=>'เด็กหญิง','นาย'=>'นาย','นางสาว'=>'นางสาว'),array(
                                                                                'prompt' => '--กรุณาเลือก--',
                                                                                )); ?>

                <?php echo $form->error($model,'title_th'); ?>
        </p>
        <p>
                <?php //echo $form->labelEx($model,'name_th'); ?>
                <label>ชื่อ-นามสกุล (ภาษาไทย) <span class="required">*</span></label>
                <?php echo $form->textField($model,'name_th',array('class'=>'input','size'=>20,'placeholder'=>'ชื่อ')); ?>
                <?php echo $form->textField($model,'surename_th',array('class'=>'input','size'=>20,'placeholder'=>'นามสกุล')); ?>
                &nbsp;&nbsp;
                <?php echo $form->textField($model,'nickname_th',array('class'=>'input','size'=>10,'placeholder'=>'ชื่อเล่น')); ?>
                <?php echo $form->error($model,'name_th'); ?>
                <?php echo $form->error($model,'surename_th'); ?>
                <?php echo $form->error($model,'nickname_th'); ?>
        </p>
<!--    <p>
                <?php echo $form->labelEx($model,'surename_th'); ?>
                <?php echo $form->textField($model,'surename_th',array('class'=>'input','size'=>40)); ?>
                <?php echo $form->error($model,'surename_th'); ?>
        </p>
        <p>
                <?php echo $form->labelEx($model,'nickname_th'); ?>
                <?php echo $form->textField($model,'nickname_th',array('class'=>'input')); ?>
                <?php echo $form->error($model,'nickname_th'); ?>
        </p>
        -->
        <p>
                <?php echo $form->labelEx($model,'title_en'); ?>
                <?php echo $form->dropDownList($model, 'title_en', array('Master'=>'Master','Miss'=>'Miss','Mr.'=>'Mr.'),array(
                                                                                'prompt' => '--กรุณาเลือก--',
                                                                                )); ?> 
                <?php echo $form->error($model,'title_en'); ?>
        </p>
        <p>
                <label>ชื่อ-นามสกุล (ภาษาอังกฤษ) <span class="required">*</span></label>
                <?php echo $form->textField($model,'name_en',array('class'=>'input','size'=>20,'placeholder'=>'Name')); ?>
                <?php echo $form->textField($model,'surename_en',array('class'=>'input','size'=>20,'placeholder'=>'Surname')); ?>
                &nbsp;&nbsp;
                <?php echo $form->textField($model,'nickname_en',array('class'=>'input','size'=>10,'placeholder'=>'Nickname')); ?>
                <?php echo $form->error($model,'name_en'); ?>
                <?php echo $form->error($model,'surename_en'); ?>
                <?php echo $form->error($model,'nickname_en'); ?>
        </p>
<!--        <p>
                <?php echo $form->labelEx($model,'surename_en'); ?>
                <?php echo $form->textField($model,'surename_en',array('class'=>'input','size'=>40)); ?> <span class="spantext">สะกดให้ตรงตามหน้าพาสปอร์ต  (หากมี)</span>
                <?php echo $form->error($model,'surename_en'); ?>
        </p>

        <p>
                <?php echo $form->labelEx($model,'nickname_en'); ?>
                <?php echo $form->textField($model,'nickname_en',array('class'=>'input')); ?>
                <?php echo $form->error($model,'nickname_en'); ?>
        </p>-->
        <p>
           <div class="id_number">

                <?php echo $form->labelEx($model,'id_card'); ?>
                <input type="text" name="number1" id="number1" value="<?php if($model->id_card)echo $model->id_card[0];?>" maxlength="1"/> -
                <input type="text" name="number2" id="number2" value="<?php if($model->id_card)echo $model->id_card[1];?>" maxlength="1"/>
                <input type="text" name="number3" id="number3" value="<?php if($model->id_card)echo $model->id_card[2];?>" maxlength="1"/>
                <input type="text" name="number4" id="number4" value="<?php if($model->id_card)echo $model->id_card[3];?>" maxlength="1"/>
                <input type="text" name="number5" id="number5" value="<?php if($model->id_card)echo $model->id_card[4];?>" maxlength="1"/> -
                <input type="text" name="number6" id="number6" value="<?php if($model->id_card)echo $model->id_card[5];?>" maxlength="1"/>
                <input type="text" name="number7" id="number7" value="<?php if($model->id_card)echo $model->id_card[6];?>" maxlength="1"/>
                <input type="text" name="number8" id="number8" value="<?php if($model->id_card)echo $model->id_card[7];?>" maxlength="1"/>
                <input type="text" name="number9" id="number9" value="<?php if($model->id_card)echo $model->id_card[8];?>" maxlength="1"/>
                <input type="text" name="number10" id="number10" value="<?php if($model->id_card)echo $model->id_card[9];?>" maxlength="1"/> -
                <input type="text" name="number11" id="number11" value="<?php if($model->id_card)echo $model->id_card[10];?>" maxlength="1"/>
                <input type="text" name="number12" id="number12" value="<?php if($model->id_card)echo $model->id_card[11];?>" maxlength="1"/> -
                <input type="text" name="number13" id="number13" value="<?php if($model->id_card)echo $model->id_card[12];?>" maxlength="1"/>
                <?php echo $form->error($model,'id_card'); ?>
            </div>
        </p>
        <p>
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
        </p>
        <p>
                <?php echo $form->labelEx($model,'age'); ?>
                <?php echo $form->textField($model,'age',array('class'=>'input','size'=>1,'maxlength'=>2)); ?> <span class="spantext">ปี</span>
                <?php echo $form->error($model,'age'); ?>
        </p>
	<p>
		<?php echo $form->labelEx($model,'school'); ?>
		<?php echo $form->textField($model,'school',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'school'); ?>
	</p>
	<p>
		<?php echo $form->labelEx($model,'major'); ?>
		<?php echo $form->textField($model,'major',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'major'); ?>
	</p>
        <p>
                <?php echo $form->labelEx($model,'address'); ?>
                <?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>60)); ?>
                <?php echo $form->error($model,'address'); ?>
        </p>
	<p>
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>40,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</p>
	<p>
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>40,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</p>
	<p>
		<?php echo $form->labelEx($model,'parent_name'); ?>
		<?php echo $form->textField($model,'parent_name',array('size'=>40,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'parent_name'); ?>
	</p>
	<p>
		<?php echo $form->labelEx($model,'parent_phone'); ?>
		<?php echo $form->textField($model,'parent_phone',array('size'=>40,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'parent_phone'); ?>
	</p>
	<p>
		<?php echo $form->labelEx($model,'disease'); ?>
		<?php echo $form->textField($model,'disease',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'disease'); ?>
	</p>
        <p>
                <?php echo $form->labelEx($model,'talent'); ?>
                <?php echo $form->textArea($model,'talent',array('rows'=>6, 'cols'=>60)); ?>
                <?php echo $form->error($model,'talent'); ?>
        </p>
        <p>
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
                <input id="Scholarship_language_0" type="checkbox" name="Scholarship[language][]" value="ภาษาอังกฤษ" <?php if ($pos1 !== false){ echo "checked"; }?>/><span class="spantext">ภาษาอังกฤษ</span>
                <input id="Scholarship_language_1" type="checkbox" name="Scholarship[language][]" value="ภาษาจีน" <?php if ($pos2 !== false){ echo "checked"; }?>/><span class="spantext">ภาษาจีน</span>
                <input id="Scholarship_language_2" type="checkbox" name="Scholarship[language][]" value="อื่นๆ" <?php if ($pos3 !== false || ($model->language_other)){ echo "checked"; }?> /><span class="spantext">อื่นๆ ระบุ</span>
                <?php echo $form->textField($model,'language_other',array('size'=>40,'maxlength'=>255)); ?>
                <?php echo $form->error($model,'language'); ?>
        </p>
        <p>
                <?php echo $form->labelEx($model,'travel_abroad_status'); ?>
                <?php echo $form->dropDownList($model,'travel_abroad_status', array('1'=>'เคย','0'=>'ไม่เคย'),array(
                                                                                'prompt' => '--กรุณาเลือก--',
                                                                                'onchange'=>'onChangeTravelAbroad();',
                                                                                )); ?><span class="spantext" id="travel1" <?php if(!$model->travel_abroad_detail) {?>style="display:none"<?php }?>>โปรดระบุ</span>
                <span id="travel2" <?php if(!$model->travel_abroad_detail) {?>style="display:none"<?php }?>><?php echo $form->textField($model,'travel_abroad_detail',array('size'=>40,'maxlength'=>255)); ?></span>
                <?php echo $form->error($model,'travel_abroad_status'); ?>
        </p>
        <p>
                <?php echo $form->labelEx($model,'image'); ?> 
		<?php echo $form->fileField($model,'image',array('style'=>'border: none;box-shadow:none')); ?><br/><span class="spantext">(ไฟล์นามสกุล .jpg ขนาดไม่เกิน 1 MB)</span><br />
                <?php if(!$model->isNewRecord) echo CHtml::image(Yii::app()->request->baseUrl . '/uploads/scholarships/' . $model->image, '', array('style'=>'width: 180px')); ?>
		<?php echo $form->error($model,'image'); ?>
        </p>
        <!--p ไม่ต้องใส่ประวัติการทำกิจกรรม>
		<?php echo $form->labelEx($model,'portfolio'); ?> 
		<?php echo $form->fileField($model,'portfolio',array('style'=>'border: none;box-shadow:none')); ?><br/><span class="spantext">(สามารถแนบไฟล์ .jpg/ .doc / .docx / .pdf /.ppt /.pptx ขนาดไม่เกิน 5 MB)</span><br />
                <?php if(!$model->isNewRecord) {echo $model->portfolio." "; if($model->portfolio) {echo cHtml::link('view', '../../uploads/scholarships/'.$model->portfolio);} }?>
		<?php echo $form->error($model,'portfolio'); ?>
	</p-->
        <p>
		<?php echo $form->labelEx($model,'how_to_know'); ?>
		<?php echo $form->dropDownList($model,'how_to_know',$how_to_know_list,array(
                                                                                'prompt' => '--กรุณาเลือก--',
                                                                                'onchange'=>'onChangeHowtoknow();',
                                                                                )); ?>
                <span id="howtoknow" <?php if(!$model->how_to_know_other) {?>style="display:none"<?php }?>><?php echo $form->textField($model,'how_to_know_other',array('size'=>40,'maxlength'=>255)); ?></span>
		<?php echo $form->error($model,'how_to_know'); ?>
	</p>
        <div class="clear"></div>
        <h3>ส่วนที่  2 : โปรดแสดงความคิดเห็นตามหัวข้อต่อไปนี้ (หัวข้อละไม่เกิน 300 อักขระเป็นภาษาไทย)</h3>
        <p>
		<?php echo $form->labelEx($model,'iแนะนำตัวเองอย่างสร้างสรรค์'); ?>
                <?php echo $form->textArea($model,'profile',array('rows'=>6, 'cols'=>80)); ?>
		<?php echo $form->error($model,'profile'); ?>
	</p>
        <p>
		<?php echo $form->labelEx($model,'iเหตุผลที่อยากเข้าร่วมโครงการนี้'); ?>
                <?php echo $form->textArea($model,'reason',array('rows'=>6, 'cols'=>80)); ?>
		<?php echo $form->error($model,'reason'); ?>
	</p>
        <!--p>
		<?php echo $form->labelEx($model,'message'); ?>
                <?php echo $form->textArea($model,'message',array('rows'=>6, 'cols'=>80)); ?>
		<?php echo $form->error($model,'message'); ?>
	</p-->
        <div class="clear"></div>
        <h3>ส่วนที่  3 : การสมัครขอรับทุน</h3>
        <p>
                <div class="clear"></div>
                <div class="type">
                <input id="Scholarship_language_0" type="checkbox" name="Scholarship_type" value="รับทราบ" />
                <span class="spantext">ท่านรับทราบว่า หากได้รับคัดเลือกจะต้องจ่ายเงินสมทบ 48,500 บาท เพื่อเข้าร่วมกิจกรรม</span>
                </div>
                <div class="clear"></div>
		<?php echo $form->error($model,'scholarship_type'); ?>
	</p>
        <div class="clear"></div>
        <h3 class="note">**  กรุณากรอกข้อมูลตามความเป็นจริง หากตรวจสอบพบว่ามีการกรอกข้อมูลที่เป็นเท็จ ทางสถาบันฯ ขอตัดสิทธิ์ในกรณีท่านได้รับทุน  **</h3>
        <!--h3 class="note">หมายเหตุ : เมื่อสมัครทุนและชำระค่าสมัครเรียบร้อยแล้วจะไม่สามารถแก้ไขข้อมูลการสมัครได้อีก โปรดตรวจสอบข้อมูลของท่านให้เรียบร้อยก่อนการยืนยันข้อมูลการสมัครค่ะ</h3-->
        <div align="center">
                <input type="submit" name="Submit" value="ยืนยันข้อมูลการสมัคร"/>
        </div>        
    
        
        <div class="clear"></div>

        
        <br/>
<?php $this->endWidget(); ?>
<?php endif; ?>