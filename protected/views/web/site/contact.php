<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - ติดต่อเรา';
$this->breadcrumbs=array(
	'ติดต่อเรา',
);
?>
<div class="entry">
	<h1 class="entry-title">ติดต่อเรา</h1>
        <div class="entry-content" style="overflow:hidden">
            <div>
            <p >
                บริษัท เอ็ดดูเคชั่น สตูดิโอ จำกัด<br/>
                159/40 ถนนสุขุมวิท 21(อโศก) <br/>
                แขวงคลองเตยเหนือ เขตวัฒนา กรุงเทพฯ 10110<br/>
                Tel: +66 2 665 7445<br/>
                Fax: +66 2 665 7405<br/>
                </p>
            </div>
            <div>
                <h5> อีเมล์ : contact@e-studio.co.th</h5>
            </div>
            <div style="clear:both"></div>
            <?php if(Yii::app()->user->hasFlash('contact')): ?>

            <div class="flash-success">
                    <?php echo Yii::app()->user->getFlash('contact'); ?>
            </div>

            <?php else: ?>
<!--
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>
	</div>
</div>


