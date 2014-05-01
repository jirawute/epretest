<?php
/* @var $this TypeController */
/* @var $model Type */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'type-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'exam_type'); ?>
		<?php echo $form->dropDownList($model, 'exam_type', array('Exam'=>'ข้อสอบ','Exercise'=>'แบบฝึกหัด')); ?>
		<?php echo $form->error($model,'exam_type'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'level_id'); ?>
                <?php echo $form->dropDownList($model,'level_id', $option_levels, array('empty'=>'--Please Select Level--')); ?>
                <?php //echo $form->dropDownList($model,'type_id', array('empty'=>'--Please Select Type--')); ?>
		<?php echo $form->error($model,'type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sort_order'); ?>
		<?php echo $form->textField($model,'sort_order'); ?>
		<?php echo $form->error($model,'sort_order'); ?>
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