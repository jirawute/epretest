<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'credit_id'); ?>
		<?php echo $form->textField($model,'credit_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'credit_point'); ?>
		<?php echo $form->textField($model,'credit_point'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'credit_amount'); ?>
		<?php echo $form->textField($model,'credit_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'credit_desc'); ?>
		<?php echo $form->textField($model,'credit_desc',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'credit_order'); ?>
		<?php echo $form->textField($model,'credit_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'credit_status'); ?>
		<?php echo $form->textField($model,'credit_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->