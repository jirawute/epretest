<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'scholarship-detail-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc'); ?>
		<?php echo $form->textArea($model,'desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'period_start'); ?>
		<?php

                if(($model->period_start)&&($model->period_start!='0000-00-00')){
                      list($y,$m,$d) = explode("-",$model->period_start);
                        $period_start = $d."/".$m."/".$y;
                      }else{
                        $day =  date("d");
                        $month =  date("m");
                        $year = date("Y");
                        $period_start = $day.'/'.$month.'/'.$year;
                      }
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'name' => 'ScholarshipDetail[period_start]',
                    'value' => $period_start,
                    'options'=>array(
                                    'showAnim'=>'fold',
                                    'changeMonth'=>true,
                                    'dateFormat'=>'dd/mm/yy',
                                    'defaultDate'=>$period_start,
                                    'changeYear'=>true,
                                    'changeDate'=>true,
                                    'showAnim'=>'fold',
                                    //'showButtonPanel'=>true,
                                    'debug'=>true,

                                ),
                        'htmlOptions' => array(
                        'class'=>'shadowdatepicker',
                        'readonly'=>"readonly",
                        'style'=>'height:20px;',
                    ),
                ));

                ?>
		<?php echo $form->error($model,'period_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'period_end'); ?>
		<?php
                    if(($model->period_end)&&($model->period_end!='0000-00-00')){
                      list($y2,$m2,$d2) = explode("-",$model->period_end);
                        $period_end = $d2."/".$m2."/".$y2;
                      }else{
                        $day2 =  date("d");
                        $month2 =  date("m");
                        $year2 = date("Y");
                        $period_end = $day2.'/'.$month2.'/'.$year2;
                      }
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'name' => 'ScholarshipDetail[period_end]',
                    'value' => $period_end,
                    'options'=>array(
                                    'showAnim'=>'fold',
                                    'changeMonth'=>true,
                                    'dateFormat'=>'dd/mm/yy',
                                    'defaultDate'=>$period_end,
                                    'changeYear'=>true,
                                    'changeDate'=>true,
                                    'showAnim'=>'fold',
                                    //'showButtonPanel'=>true,
                                    'debug'=>true,

                                ),
                        'htmlOptions' => array(
                        'class'=>'shadowdatepicker',
                        'readonly'=>"readonly",
                        'style'=>'height:20px;',
                    ),
                ));
                
                ?>

		<?php echo $form->error($model,'period_end'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'announce_date'); ?>
		<?php
                    if(($model->announce_date)&&($model->announce_date!='0000-00-00')){
                      list($y3,$m3,$d3) = explode("-",$model->announce_date);
                        $announce_date = $d3."/".$m3."/".$y3;
                      }else{
                        $day3 =  date("d");
                        $month3 =  date("m");
                        $year3 = date("Y");
                        $announce_date = $day3.'/'.$month3.'/'.$year3;
                      }
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'name' => 'ScholarshipDetail[announce_date]',
                    'value' => $announce_date,
                    'options'=>array(
                                    'showAnim'=>'fold',
                                    'changeMonth'=>true,
                                    'dateFormat'=>'dd/mm/yy',
                                    'defaultDate'=>$announce_date,
                                    'changeYear'=>true,
                                    'changeDate'=>true,
                                    'showAnim'=>'fold',
                                    //'showButtonPanel'=>true,
                                    'debug'=>true,

                                ),
                        'htmlOptions' => array(
                        'class'=>'shadowdatepicker',
                        'readonly'=>"readonly",
                        'style'=>'height:20px;',
                    ),
                ));

                ?>

		<?php echo $form->error($model,'announce_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model, 'status', array('1'=>'Enabled','0'=>'Disabled')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->