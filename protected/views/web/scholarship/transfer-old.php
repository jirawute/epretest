        <div class="grid_10 push_1 editinfo">
         <?php if(Yii::app()->user->hasFlash('error')): ?>

            <h2 style="color:red"><?php echo Yii::app()->user->getFlash('error'); ?></h2>
        <?php endif; ?>
                <div class="editinfo_box">

                        <h2>แบบฟอร์มแจ้งการโอนเงิน</h2>
<div class="bank">
 <b>ธนาคารกสิกรไทย</b><br/>
                                    สาขา สยามสแควร์<br/>
                                    ประเภท บัญชีกระแสรายวัน<br/>
                                    ชื่อบัญชี บริษัท เอ็ดดูเคชั่น สตูดิโอ จำกัด<br/>
                                    เลขที่บัญชี 026-1-10869-0
                            </div>

                        <div class="editinfo_data_box">
                               <?php $form=$this->beginWidget('CActiveForm', array(
                                                                'id'=>'scholarshiptransfer-form',
                                                                'enableAjaxValidation'=>false,
                                                                'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                                        )); ?>
                                        <p>
                                            <?php echo $form->labelEx($model,'inv_id'); ?> (ตัวอย่าง 100001 ความยาว 6 ตัวอักษร)
                                            <?php echo $form->textField($model,'inv_id',array('size'=>10,'maxlength'=>6,'value'=>$scholar_enroll->inv_id)); ?>
                                            <?php echo $form->error($model,'inv_id'); ?>
                                        </p>
                                        <p>
                                            <?php echo $form->labelEx($model,'name'); ?>
                                            <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255,'value'=>$scholar_enroll->name_th." ".$scholar_enroll->surename_th)); ?>
                                            <?php echo $form->error($model,'name'); ?>
                                        </p>
                                        <p>
                                             <?php echo $form->labelEx($model,'email'); ?>
                                             <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255,'value'=>$scholar_enroll->email)); ?>
                                             <?php echo $form->error($model,'email'); ?>
                                        </p>
                                        <p>
                                             <?php echo $form->labelEx($model,'phone'); ?>
                                             <?php echo $form->textField($model,'phone',array('size'=>20,'maxlength'=>20,'value'=>$scholar_enroll->phone)); ?>
                                             <?php echo $form->error($model,'phone'); ?>
                                        </p>
                                        <p>
                                             <?php echo $form->labelEx($model,'amount'); ?>
                                             <?php echo $form->textField($model,'amount',array('value'=>$scholar_enroll->payment_amount)); ?>
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
                                                        <?php echo $form->fileField($model,'image',array('style'=>'border: none;box-shadow:none')); ?>

						</p>
                                                <?php echo $form->error($model,'image'); ?>
                                                (รูปภาพนามสกุล .jpg, .jpeg, .png, .gif เท่านั้น)
					</div>

                       </div>


                        <?php $this->endWidget(); ?>

                </div>