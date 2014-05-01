<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'session_id'); ?>
		<?php echo $form->textField($model,'session_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'exam_id'); ?>
		<?php echo $form->textField($model,'exam_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'session_name'); ?>
		<?php echo $form->textField($model,'session_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'answer_type_id'); ?>
                <?php echo $form->dropDownList($model,'answer_type_id',$answerTypeOption); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'session_order'); ?>
		<?php echo $form->textField($model,'session_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'session_total'); ?>
		<?php echo $form->textField($model,'session_total'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'session_start'); ?>
		<?php echo $form->textField($model,'session_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'session_end'); ?>
		<?php echo $form->textField($model,'session_end'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'session_score_total'); ?>
		<?php echo $form->textField($model,'session_score_total',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'session_status'); ?>
                <?php echo $form->dropDownList($model, 'session_status', array('1'=>'Enabled','0'=>'Disabled')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->