<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'test_record_id'); ?>
		<?php echo $form->textField($model,'test_record_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'exam_id'); ?>
		<?php echo $form->textField($model,'exam_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_id'); ?>
		<?php echo $form->textField($model,'student_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'score'); ?>
		<?php echo $form->textField($model,'score',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_attended'); ?>
		<?php echo $form->textField($model,'date_attended'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'elapse_time'); ?>
		<?php echo $form->textField($model,'elapse_time'); ?>
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