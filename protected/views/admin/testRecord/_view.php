<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('test_record_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->test_record_id), array('view', 'id'=>$data->test_record_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exam_id')); ?>:</b>
	<?php echo CHtml::encode($data->exam_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score')); ?>:</b>
	<?php echo CHtml::encode($data->score); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_attended')); ?>:</b>
	<?php echo CHtml::encode($data->date_attended); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('elapse_time')); ?>:</b>
	<?php echo CHtml::encode($data->elapse_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>