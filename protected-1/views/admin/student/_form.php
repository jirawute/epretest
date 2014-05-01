<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_number'); ?>
		<?php echo $form->textField($model,'id_number',array('size'=>20,'maxlength'=>13)); ?>
		<?php echo $form->error($model,'id_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model,'firstname',array('size'=>42,'maxlength'=>42)); ?>
		<?php echo $form->error($model,'firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname',array('size'=>42,'maxlength'=>42)); ?>
		<?php echo $form->error($model,'lastname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'school'); ?>
		<?php echo $form->textField($model,'school',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'school'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'level_id'); ?>
                <?php echo $form->dropDownList($model, 'level_id', $option_levels); ?>
		<?php echo $form->error($model,'level_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>96)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'address'); ?>
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
                  $Date = date('Y-m-d');
                  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'name' => 'Student[birthday]',
                    'value' => ($birthday)?$birthday:date('d/m/Y', strtotime('+543 year', $Date)),
                    'language'=>'th',
                    'options'=>array(
                                    'showAnim'=>'fold',
                                    'changeMonth'=>true,
                                    'dateFormat'=>'dd/mm/yy',
                                    'defaultDate'=>$birthday,
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
                )); ?>
                <?php echo $form->error($model,'birthday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'faculty'); ?>
		<?php echo $form->textField($model,'faculty',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'faculty'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php if(!$model->isNewRecord) echo CHtml::image(Yii::app()->request->baseUrl . '/uploads/student/' . $model->image, '', array('style'=>'width: 180px')); ?><br />
		<?php echo $form->fileField($model,'image',array('style'=>'border: none;box-shadow:none')); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit'); ?>
		<?php echo $form->textField($model,'credit'); ?>
		<?php echo $form->error($model,'credit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_friends'); ?>
		<?php echo $form->textField($model,'email_friends',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email_friends'); ?>
	</div>
        <hr/>
        <h4>ข้อมูลเข้าสู่ระบบ</h4>
        <div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>
        	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->textField($model,'password',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
        <hr/>
       <div class="row">
		<?php echo $form->labelEx($model,'sid'); ?>
		<?php echo $form->textField($model,'sid',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'sid'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model, 'status', array('1'=>'Activate','0'=>'Deactivate')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->