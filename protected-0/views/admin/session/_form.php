<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'session-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'exam_id'); ?>
		<?php echo $form->dropDownList($model,'exam_id', $examOption,array('empty' => '-- กรุณาเลือกชุดข้อสอบ --')); ?>
		<?php echo $form->error($model,'exam_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'session_name'); ?>
		<?php echo $form->textField($model,'session_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'session_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'answer_type_id'); ?>
		<?php echo $form->dropDownList($model,'answer_type_id',$answerTypeOption,array('empty' => '--- กรุณาเลือกประเภทกระดาษคำตอบ ---')); ?>
		<?php echo $form->error($model,'answer_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'session_order'); ?>
		<?php echo $form->dropDownList($model,'session_order',array(1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10)); ?>
		<?php echo $form->error($model,'session_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'session_total'); ?>
		<?php echo $form->textField($model,'session_total',array('size'=>7,'maxlength'=>5)); ?> ข้อ
		<?php echo $form->error($model,'session_total'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'session_start'); ?>
		<?php echo $form->textField($model,'session_start',array('size'=>7,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'session_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'session_end'); ?>
		<?php echo $form->textField($model,'session_end',array('size'=>7,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'session_end'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'session_score_total'); ?>
		<?php echo $form->textField($model,'session_score_total',array('size'=>7,'maxlength'=>7)); ?> คะแนน
		<?php echo $form->error($model,'session_score_total'); ?>
	</div>

	<div class="row">
                <?php echo $form->labelEx($model,'session_status'); ?>
		<?php echo $form->dropDownList($model, 'session_status', array('1'=>'Enabled','0'=>'Disabled')); ?>
		<?php echo $form->error($model,'session_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->