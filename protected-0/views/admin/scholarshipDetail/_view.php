<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('scholar_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->scholar_id), array('view', 'id'=>$data->scholar_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc')); ?>:</b>
	<?php echo CHtml::encode($data->desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('period_start')); ?>:</b>
	<?php echo CHtml::encode($data->period_start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('period_end')); ?>:</b>
	<?php echo CHtml::encode($data->period_end); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>