<?php
/* @var $this AdminInformationController */
/* @var $model Information */
/* @var $form CActiveForm */
?>

<div class="form">

<?php echo CHtml::beginForm(); ?>
	
	<div class="row">
		<?php echo CHtml::label('Title','Setting[config_title]'); ?>
		<?php echo CHtml::textField('Setting[config_title]', $config['config_title']) ?>
	</div>
	
	<div class="row">
		<?php echo CHtml::label('Description','Setting[config_description]'); ?>
		<?php echo CHtml::textField('Setting[config_description]', $config['config_description']) ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Save'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->	