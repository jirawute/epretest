<?php
/* @var $this TypeController */
/* @var $model Type */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'type_id'); ?>
		<?php echo $form->textField($model,'type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'exam_type'); ?>
		<?php echo $form->dropDownList($model, 'exam_type', array('empty'=>'--Please Select--','Exam'=>'ข้อสอบ','Exercise'=>'แบบฝึกหัด')); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'level_id'); ?>
                <?php echo $form->dropDownList($model,'level_id', $option_levels, array('empty'=>'--Please Select--')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sort_order'); ?>
		<?php echo $form->textField($model,'sort_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->dropDownList($model, 'status', array('1'=>'Enabled','0'=>'Disabled')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->