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
	
	<?php if($user->student != null) { ?>
	<div id="student_form">
		<h3>Student Data</h3>
		
		<div class="row">
			<?php echo $form->labelEx($user->student,'id_number'); ?>
			<?php echo $form->textField($user->student,'id_number'); ?>
			<?php echo $form->error($user->student,'id_number'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($user->student,'firstname'); ?>
			<?php echo $form->textField($user->student,'firstname'); ?>
			<?php echo $form->error($user->student,'firstname'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($user->student,'lastname'); ?>
			<?php echo $form->textField($user->student,'lastname'); ?>
			<?php echo $form->error($user->student,'lastname'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($user->student,'school'); ?>
			<?php echo $form->textField($user->student,'school'); ?>
			<?php echo $form->error($user->student,'school'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($user->student,'level_id'); ?>
			<?php echo $form->textField($user->student,'level_id'); ?>
			<?php echo $form->error($user->student,'level_id'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($user->student,'email'); ?>
			<?php echo $form->textField($user->student,'email'); ?>
			<?php echo $form->error($user->student,'email'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($user->student,'phone'); ?>
			<?php echo $form->textField($user->student,'phone'); ?>
			<?php echo $form->error($user->student,'phone'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($user->student,'image'); ?>
			<?php echo $form->textField($user->student,'image'); ?>
			<?php echo $form->error($user->student,'image'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($user->student,'credit'); ?>
			<?php echo $form->textField($user->student,'credit'); ?>
			<?php echo $form->error($user->student,'credit'); ?>
		</div>
	</div>
	<?php } ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($user->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
var studentForm = $('#student_form');
var userGroupSelect = $('select[name=\'User[user_group_id]\']');

studentForm.hide();

userGroupSelect.change(function(event) {
	if(userGroupSelect.val() == 3) {
		studentForm.slideDown();
	} else {
		studentForm.slideUp();
	}
});
</script>