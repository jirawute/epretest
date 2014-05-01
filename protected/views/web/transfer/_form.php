<?php
    if(!Yii::app()->user->id)
    header("Location: ?r=site/login");

?>
<div id="content">
        <div class="grid_4 push_4 goback">
            <a href="?r=student/view"><span></span>กลับสู่หน้าหลัก</a>
        </div>
        <div class="clear"></div>
        <div class="grid_10 push_1 editinfo">

                <div class="editinfo_box">

                        <h2>แบบฟอร์มแจ้งการโอนเงิน</h2>

                        <div class="editinfo_data_box">

                               <?php $form=$this->beginWidget('CActiveForm', array(
                                                                'id'=>'transfer-form',
                                                                'enableAjaxValidation'=>false,
                                                                'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                                        )); ?>
                                        <p>
                                            <?php echo $form->labelEx($model,'inv_id'); ?> (ตัวอย่าง INV1XXXXX ความยาว 9 ตัวอักษร)
                                            <?php echo $form->textField($model,'inv_id',array('size'=>10,'maxlength'=>9)); ?>
                                            <?php echo $form->error($model,'inv_id'); ?>
                                        </p>
                                        <p>
                                            <?php echo $form->labelEx($model,'name'); ?>
                                            <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255,'value'=>$student->firstname." ".$student->lastname)); ?>
                                            <?php echo $form->error($model,'name'); ?>
                                        </p>
                                        <p>
                                             <?php echo $form->labelEx($model,'email'); ?>
                                             <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255,'value'=>$student->email)); ?>
                                             <?php echo $form->error($model,'email'); ?>
                                        </p>
                                        <p>
                                             <?php echo $form->labelEx($model,'phone'); ?>
                                             <?php echo $form->textField($model,'phone',array('size'=>20,'maxlength'=>20,'value'=>$student->phone)); ?>
                                             <?php echo $form->error($model,'phone'); ?>
                                        </p>
                                        <p>
                                             <?php echo $form->labelEx($model,'amount'); ?>
                                             <?php echo $form->textField($model,'amount'); ?>
                                             <?php echo $form->error($model,'amount'); ?>
                                        </p>
                                        <p>
                                             <?php echo $form->labelEx($model,'bank'); ?>
                                             <?php echo $form->dropDownList($model, 'bank', array('ธ.กสิกรไทย สาขาสยามสแควส์'=>'ธ.กสิกรไทย สาขาสยามสแควร์')); ?>
                                             <?php echo $form->error($model,'bank'); ?>
                                        </p>
                                        <p>
                                             <?php echo $form->labelEx($model,'date'); ?>
                                             <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                    'model' => $model,
                                                    'attribute' => 'date',

                                                    'options'=>array(
                                                                    'showAnim'=>'fold',
                                                                    'changeMonth'=>true,
                                                                    'dateFormat'=>'dd/mm/yy',
                                                                    'changeYear'=>true,
                                                                    'changeDate'=>true,
                                                                    'showAnim'=>'fold',
                                                                    //'showButtonPanel'=>true,
                                                                    'debug'=>true,

                                                                ),
                                                    'htmlOptions' => array(
                                                        'class'=>'shadowdatepicker',
                                                        'readonly'=>"readonly",
                                                    ),
                                                )); ?>
                                             <?php echo $form->error($model,'date'); ?>
                                        </p>
                                        <p>
                                             <?php echo $form->labelEx($model,'detail'); ?>
                                             <?php echo $form->textArea($model,'detail',array('rows'=>6, 'cols'=>50)); ?>
                                             <?php echo $form->error($model,'detail'); ?>
                                        </p>
                                        <p class="submit">
                                            <?php echo CHtml::submitButton('ตกลง',
                                                    array(
                                                            'value'=> 'ตกลง',
                                                            'id'=> 'wp-submit',
                                                            'class'=> 'button button-primary button-large',
                                                    )
                                            ); ?>
                                        </p>
                                        </div>
                                        <div class="editinfo_pic_box">
						<img src="images/web/slip.jpg" alt="" class="news_pic">
						<p>
							<label>อัพโหลดหลักฐานการโอน</label>
                                                        <?php echo $form->fileField($model,'images',array('style'=>'border: none;box-shadow:none')); ?>

						</p>
                                                <?php echo $form->error($model,'images'); ?>
                                                (รูปภาพนามสกุล .jpg, .jpeg, .png, .gif เท่านั้น)
					</div>
                           
                       </div>

                        
                        <?php $this->endWidget(); ?>

                </div>

        <div class="clear"></div>

</div><!--end #contect-->