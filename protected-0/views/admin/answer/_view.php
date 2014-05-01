<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('answer_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->answer_id), array('view', 'id'=>$data->answer_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answer_number')); ?>:</b>
	<?php echo CHtml::encode($data->answer_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('session_id')); ?>:</b>
	<?php echo CHtml::encode($data->session_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answer')); ?>:</b>
	<?php echo CHtml::encode($data->answer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score_item')); ?>:</b>
	<?php echo CHtml::encode($data->score_item); ?>
	<br />


</div>