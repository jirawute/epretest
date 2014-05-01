<?php
/* @var $this SubjectController */
/* @var $model Subject */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'subject-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'level_id'); ?>
		<?php //echo $form->dropDownList($model, 'level_id', $option_levels); ?>
                <?php echo $form->dropDownList($model,'level_id', CHtml::listData(Level::model()->findAll(), 'level_id','name'),
                              array(
                                    'prompt' => '--Please Select Level--',
                                    'value' => '0',
                                    'ajax'  => array(
                                    'type'  => 'POST',
                                    'url' => CController::createUrl('subject/type'),
                                    'update' => '#Subject_type_id',   //selector to update value
                                    'data' => array('level_id'=>'js:this.value'),
                                    )
                              )
                    ); ?>
		<?php echo $form->error($model,'level_id'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'type_id'); ?>
                <?php //echo $form->dropDownList($model,'type_id', $option_types); ?>
                <?php $level_id = $model->level_id;?>
                <?php echo $form->dropDownList($model,'type_id',CHtml::listData(Type::model()->findAll('level_id=:level_id',
                         array(':level_id'=>$level_id)), 'type_id','name'),
                             array(
                                    'prompt' => '--Please Select Type--',
                                    'value' => '',

                                    )
                ); ?>
		<?php echo $form->error($model,'type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sort_order'); ?>
		<?php echo $form->textField($model,'sort_order'); ?>
		<?php echo $form->error($model,'sort_order'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'show_new'); ?>
		<?php echo $form->dropDownList($model, 'show_new', array('1'=>'Show New','2'=>'Show Hot','0'=>'Not Show')); ?>
		<?php echo $form->error($model,'show_new'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model, 'status', array('1'=>'Enabled','0'=>'Disabled')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->