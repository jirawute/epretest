<?php
/* @var $this ExamController */
/* @var $model Exam */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'exam-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
<?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255)); ?>
<?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'quiz_intro'); ?>
<?php echo $form->textArea($model, 'quiz_intro', array('rows' => 7, 'cols' => 70)); ?>
<?php echo $form->error($model, 'quiz_intro'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'exam_file'); ?>
        <?php if (!$model->isNewRecord) {
            echo $model->exam_file . " ";
            if ($model->exam_file) {
                echo cHtml::link('view', '../../uploads/pdf/' . $model->exam_file);
            }
        } ?><br />
        <?php echo $form->fileField($model, 'exam_file', array('style' => 'border: none;box-shadow:none')); ?>
        <?php echo $form->error($model, 'exam_file'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'answer_file'); ?>
        <?php if (!$model->isNewRecord) {
            echo $model->answer_file . " ";
            if ($model->answer_file) {
                echo cHtml::link('view', '../../uploads/answer/' . $model->answer_file);
            }
        } ?><br />
        <?php echo $form->fileField($model, 'answer_file', array('style' => 'border: none;box-shadow:none')); ?>
<?php echo $form->error($model, 'answer_file'); ?>
    </div>
    <div class="row" >
        <?php echo $form->labelEx($model, 'voice_file'); ?>
        <?php echo $form->dropDownList($model, 'voice_file', array('0' => 'No Voice', '1' => 'With Voice')); ?>
        <?php echo $form->error($model, 'voice_file'); ?>
    </div>Please move your voice file to server folder uploads/mp3/(exam_id).mp3 (contact your server admin)

    <div class="row">
        <?php echo $form->labelEx($model, 'score_total'); ?>
        <?php echo $form->textField($model, 'score_total'); ?>
        <?php echo $form->error($model, 'score_total'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'score_avg'); ?>
        <?php echo $form->textField($model, 'score_avg'); ?>
        <?php echo $form->error($model, 'score_avg'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'score_max'); ?>
        <?php echo $form->textField($model, 'score_max'); ?>
        <?php echo $form->error($model, 'score_max'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'credit_required'); ?>
        <?php echo $form->textField($model, 'credit_required'); ?>
        <?php echo $form->error($model, 'credit_required'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'time_limited', array('id' => 'time_limited_label')); ?>
        <?php echo $form->hiddenField($model, 'time_limited'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiSlider', array(
            'value' => $model->time_limited,
            // additional javascript options for the slider plugin
            'options' => array(
                'min' => 5,
                'max' => 360,
                'step' => 5,
                'slide' => 'js:function(event, ui) { 
					$("input[name=\'Exam[time_limited]\']").val(ui.value); 
					setTextTime(ui.value);
				}',
            ),
            'htmlOptions' => array(
                'class' => 'shadowslider-dark',
                'style' => 'margin-top:10px;margin-bottom: 10px; width: 300px;'
            ),
        ));
        ?>
        <?php echo $form->error($model, 'time_limited'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'level_id'); ?>
        <?php //echo $form->dropDownList($model,'level_id', $option_levels); ?>
        <?php
        echo $form->dropDownList($model, 'level_id', CHtml::listData(Level::model()->findAll(), 'level_id', 'name'), array(
            'prompt' => '--Please Select Level--',
            'value' => '',
            'ajax' => array(
                'type' => 'GET',
                'url' => CController::createUrl('exam/type'),
                'update' => '#Exam_type_id', //selector to update value
                'data' => array('level_id' => 'js:this.value'),
            )
                )
        );
        ?>
        <?php echo $form->error($model, 'level_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'type_id'); ?>
        <?php $level_id = $model->level_id; ?>
        <?php
        echo $form->dropDownList($model, 'type_id', CHtml::listData(Type::model()->findAll('level_id=:level_id', array(':level_id' => $level_id)), 'type_id', 'name'), array(
            'prompt' => '--Please Select Type--',
            'value' => '',
            'ajax' => array(
                'type' => 'GET',
                'url' => CController::createUrl('exam/subject'),
                'update' => '#Exam_subject_id', //selector to update value
                'data' => array('type_id' => 'js:this.value'),
            )
                )
        );
        ?>
        <?php echo $form->error($model, 'type_id'); ?>
    </div>

    <div class="row">
<?php echo $form->labelEx($model, 'subject_id'); ?>
<?php //echo $form->dropDownList($model,'subject_id', $option_subjects);  ?>
        <?php $type_id = $model->type_id; ?>
        <?php
        echo $form->dropDownList($model, 'subject_id', CHtml::listData(Subject::model()->findAll('type_id=:type_id AND level_id=:level_id', array(':type_id' => $type_id, ':level_id' => $level_id)), 'subject_id', 'name'), array(
            'prompt' => '--Please Select Subject--',
            'value' => '',
                )
        );
        ?>
        <?php echo $form->error($model, 'subject_id'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'sort_order'); ?>
<?php echo $form->textField($model, 'sort_order'); ?>
    <?php echo $form->error($model, 'sort_order'); ?>
    </div>

    <div class="row">
<?php echo $form->labelEx($model, 'status'); ?>
<?php echo $form->dropDownList($model, 'status', array('1' => 'Enabled', '2' => 'HideAnswer', '0' => 'Disabled')); ?>
<?php echo $form->error($model, 'status'); ?>
    </div>

    <div class="row buttons">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">

    setTextTime($('input[name=\'Exam[time_limited]\']').val());

    function setTextTime(input) {
        hour = Math.floor(input / 60);
        min = input % 60;

        $("#time_limited_label").html("Time Limited: " + hour + " Hour, " + min + " Min");
    }
</script>