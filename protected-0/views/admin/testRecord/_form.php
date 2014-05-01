<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'test-record-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'exam_id'); ?>
		<?php echo $form->textField($model,'exam_id'); ?>
		<?php echo $form->error($model,'exam_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_id'); ?>
		<?php echo $form->textField($model,'student_id'); ?>
		<?php echo $form->error($model,'student_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'score'); ?>
		<?php echo $form->textField($model,'score',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'score'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_attended'); ?>
		<?php echo $form->textField($model,'date_attended'); ?>
		<?php echo $form->error($model,'date_attended'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'elapse_time'); ?>
		<?php echo $form->textField($model,'elapse_time'); ?>
		<?php echo $form->error($model,'elapse_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
                <?php echo $form->dropDownList($model, 'status', array('3'=>'ยังทำไม่เสร็จ','2'=>'ทำเสร็จแล้ว','1'=>'ยังทำไม่เสร็จ','0'=>'ยังไม่ได้ซื้อ')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
        <div class="tableGray" >
        <table>        

            <tr>
                <td style="width:30px">ข้อที่</td>
                <td style="width:70px">คำตอบ</td>
                <td style="width:100px">คะแนน</td>
                <td style="width:70px">ANSWER ID</td>
            </tr>
       

            <?php foreach($model_test as $test){?>
            <tr class="odd">
                <td style="text-align: center;"><?php echo $test->test_number; ?></td>
                <td style="text-align: center;"><?php echo $test->selected; ?></td>
                <td style="text-align: center"><?php echo $test->test_score; ?></td>
                <td style="text-align: center;"><?php echo $test->answer_id; ?></td>
  
            </tr>
            <?php } ?>

        </table>
            </div>
            
       
        
        


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->