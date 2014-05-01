<?php
/* @var $this UserController */
/* @var $user User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($user); ?>

	<div class="row">
		<?php echo $form->labelEx($user,'username'); ?>
		<?php echo $form->textField($user,'username',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($user,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'password'); ?>
		<?php echo $form->passwordField($user,'password',array('size'=>20,'maxlength'=>32)); ?>
		<?php echo $form->error($user,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'user_group_id'); ?>
		<?php echo $form->dropDownList($user,'user_group_id', $user_group_data); ?>
		<?php echo $form->error($user,'user_group_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($user,'status'); ?>
		<?php echo $form->dropDownList($user, 'status', array('1'=>'Enabled','0'=>'Disabled')); ?>
		<?php echo $form->error($user,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($user->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->