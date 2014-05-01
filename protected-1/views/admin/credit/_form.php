<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'credit-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'credit_point'); ?>
		<?php echo $form->textField($model,'credit_point'); ?>
		<?php echo $form->error($model,'credit_point'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit_amount'); ?>
		<?php echo $form->textField($model,'credit_amount'); ?>
		<?php echo $form->error($model,'credit_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit_desc'); ?>
		<?php echo $form->textField($model,'credit_desc',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'credit_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit_order'); ?>
		<?php echo $form->textField($model,'credit_order'); ?>
		<?php echo $form->error($model,'credit_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit_status'); ?>
		<?php echo $form->dropDownList($model,'credit_status', array('1'=>'Enabled','0'=>'Disabled')); ?>
		<?php echo $form->error($model,'credit_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->