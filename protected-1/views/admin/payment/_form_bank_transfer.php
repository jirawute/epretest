<?php
/* @var $this AdminInformationController */
/* @var $model Information */
/* @var $form CActiveForm */
?>

<div class="form">

<?php echo CHtml::beginForm(); ?>

	<div class="row">
		<?php echo CHtml::label('Bank Transer Instructions',$method . '[' . $method . '_instructions]'); ?>
		<?php echo CHtml::textArea($method . '[' . $method . '_instructions]', $form_data[$method . '_instructions'], array('rows'=>6,'cols'=>45)) ?>
	</div>
	
	<div class="row">
		<?php echo CHtml::label('Total',$method . '[' . $method . '_total]'); ?>
		<?php echo CHtml::textField($method . '[' . $method . '_total]', (int)$form_data[$method . '_total']) ?>
	</div>
	
	<div class="row">
		<?php echo CHtml::label('Order Status',$method . '[' . $method . '_order_status_id]'); ?>
		<?php echo CHtml::dropDownList($method . '[' . $method . '_order_status_id]', (int)$form_data[$method . '_order_status_id'], $order_statuses) ?>
	</div>
	
	<div class="row">
		<?php echo CHtml::label('Status',$method . '[' . $method . '_status]'); ?>
		<?php echo CHtml::dropDownList($method . '[' . $method . '_status]', (int)$form_data[$method . '_status'], array('1'=>'Enabled','0'=>'Disabled')) ?>
	</div>
	
	<div class="row">
		<?php echo CHtml::label('Sort Order',$method . '[' . $method . '_sort_order]'); ?>
		<?php echo CHtml::textField($method . '[' . $method . '_sort_order]', (int)$form_data[$method . '_sort_order'], array('size'=>5)) ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Save'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->	