<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('session_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->session_id), array('view', 'id'=>$data->session_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exam_id')); ?>:</b>
	<?php echo CHtml::encode($data->exam_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('session_name')); ?>:</b>
	<?php echo CHtml::encode($data->session_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answer_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->answer_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('session_order')); ?>:</b>
	<?php echo CHtml::encode($data->session_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('session_total')); ?>:</b>
	<?php echo CHtml::encode($data->session_total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('session_start')); ?>:</b>
	<?php echo CHtml::encode($data->session_start); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('session_end')); ?>:</b>
	<?php echo CHtml::encode($data->session_end); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('session_score_total')); ?>:</b>
	<?php echo CHtml::encode($data->session_score_total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('session_status')); ?>:</b>
	<?php echo CHtml::encode($data->session_status); ?>
	<br />

	*/ ?>

</div>