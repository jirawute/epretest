<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'answer_id'); ?>
		<?php echo $form->textField($model,'answer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'answer_number'); ?>
		<?php echo $form->textField($model,'answer_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'session_id'); ?>
		<?php echo $form->textField($model,'session_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'answer'); ?>
		<?php echo $form->textArea($model,'answer',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'score_item'); ?>
		<?php echo $form->textField($model,'score_item',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->