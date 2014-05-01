<?php
/* @var $this ExamController */
/* @var $model Exam */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'exam_id'); ?>
		<?php echo $form->textField($model,'exam_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type_id'); ?>
		<?php echo $form->textField($model,'type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subject_id'); ?>
		<?php echo $form->textField($model,'subject_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'level_id'); ?>
		<?php echo $form->textField($model,'level_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'quiz_intro'); ?>
		<?php echo $form->textArea($model,'quiz_intro',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'credit_required'); ?>
		<?php echo $form->textField($model,'credit_required'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_limited'); ?>
		<?php echo $form->textField($model,'time_limited'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'score_total'); ?>
		<?php echo $form->textField($model,'score_total',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'score_avg'); ?>
		<?php echo $form->textField($model,'score_avg',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'score_max'); ?>
		<?php echo $form->textField($model,'score_max',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_added'); ?>
		<?php echo $form->textField($model,'date_added'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sort_order'); ?>
		<?php echo $form->textField($model,'sort_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->