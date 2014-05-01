<?php
/* @var $this ExamController */
/* @var $data Exam */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('exam_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->exam_id), array('view', 'id'=>$data->exam_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_id')); ?>:</b>
	<?php echo CHtml::encode($data->type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subject_id')); ?>:</b>
	<?php echo CHtml::encode($data->subject_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level_id')); ?>:</b>
	<?php echo CHtml::encode($data->level_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quiz_intro')); ?>:</b>
	<?php echo CHtml::encode($data->quiz_intro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('credit_required')); ?>:</b>
	<?php echo CHtml::encode($data->credit_required); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('time_limited')); ?>:</b>
	<?php echo CHtml::encode($data->time_limited); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score_total')); ?>:</b>
	<?php echo CHtml::encode($data->score_total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score_avg')); ?>:</b>
	<?php echo CHtml::encode($data->score_avg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score_max')); ?>:</b>
	<?php echo CHtml::encode($data->score_max); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_added')); ?>:</b>
	<?php echo CHtml::encode($data->date_added); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort_order')); ?>:</b>
	<?php echo CHtml::encode($data->sort_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>