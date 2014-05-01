<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('credit_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->credit_id), array('view', 'id'=>$data->credit_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('credit_point')); ?>:</b>
	<?php echo CHtml::encode($data->credit_point); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('credit_amount')); ?>:</b>
	<?php echo CHtml::encode($data->credit_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('credit_desc')); ?>:</b>
	<?php echo CHtml::encode($data->credit_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('credit_order')); ?>:</b>
	<?php echo CHtml::encode($data->credit_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('credit_status')); ?>:</b>
	<?php echo CHtml::encode($data->credit_status); ?>
	<br />


</div>