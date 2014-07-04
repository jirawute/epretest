<?php
if (!Yii::app()->user->id)
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

                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'transfer-form',
                    'enableAjaxValidation' => true,
                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
                ));
                ?>
                <table><tr>
                        <td><p>
                                <?php echo $form->labelEx($model, 'inv_id'); ?> 
                                <?php echo $form->dropDownList($model, 'inv_id', $inv_list); ?>
                            </p></td><td ><p>
                                <?php echo $form->labelEx($model, 'amount'); ?>
                                <?php
                                foreach ($inv_list as $value) {
                                    $arr = explode('-', $value);
                                    break;
                                }
                                echo $form->textField($model, 'amount', array('style'=>'text-align:center;','value' => $arr[1]));
                                ?> 
                                
                            </p></td></tr></table>
                
                                <?php echo $form->error($model, 'inv_id'); ?><?php echo $form->error($model, 'amount'); ?>
                <p>
                    <?php echo $form->labelEx($model, 'name'); ?>
                    <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255, 'value' => $student->firstname . " " . $student->lastname)); ?>
                    <?php echo $form->error($model, 'name'); ?>
                </p>
                <p>
                    <?php echo $form->labelEx($model, 'email'); ?>
                    <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 255, 'value' => $student->email)); ?>
                    <?php echo $form->error($model, 'email'); ?>
                </p>
                <p>
                    <?php echo $form->labelEx($model, 'phone'); ?>
                    <?php echo $form->textField($model, 'phone', array('size' => 20, 'maxlength' => 20, 'value' => $student->phone)); ?>
                    <?php echo $form->error($model, 'phone'); ?>
                </p>
                <p>
                    <?php echo $form->labelEx($model, 'bank'); ?>
                    <?php echo $form->dropDownList($model, 'bank', array('ธ.กสิกรไทย สาขาสยามสแควส์' => 'ธ.กสิกรไทย สาขาสยามสแควร์')); ?>
                    <?php echo $form->error($model, 'bank'); ?>
                </p>
                <p>
                    <?php
                    echo $form->hiddenField($model, 'date', array('value' => date('d/m/Y')));
                    /* $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                      'model' => $model,
                      'value' => date('d/m/Y'),
                      'attribute' => 'date',
                      'options' => array(
                      'showAnim' => 'fold',
                      'dateFormat' => 'dd/mm/yy',
                      'changeMonth' => true,
                      'changeYear' => true,
                      'changeDate' => true,
                      'changeMonth' => true,
                      'showAnim' => 'fold',
                      //'showButtonPanel'=>true,
                      'debug' => true,
                      ),
                      'htmlOptions' => array(
                      'class' => 'shadowdatepicker',
                      'readonly' => "readonly",
                      ),
                      )); */
                    ?>
                    <?php echo $form->error($model, 'date'); ?>
                </p>
                <p>
                    <?php echo $form->labelEx($model, 'detail'); ?>
                    <?php echo $form->textArea($model, 'detail', array('rows' => 1, 'cols' => 50)); ?>
                    <?php echo $form->error($model, 'detail'); ?>
                </p>

            </div><div class="editinfo_pic_box">
                <img src="images/web/slip.jpg" alt="" class="news_pic"/>
                <font style="color:red"><?php echo $form->fileField($model, 'images', array('style' => 'border: none;box-shadow:none')); ?></font>
                <?php echo $form->error($model, 'images'); ?>
                (รูปภาพนามสกุล .jpg, .jpeg, .png, .gif เท่านั้น)<br/>
                <div>
                <p class="submit"><label>อัพโหลด</label>
                    <?php
                    echo CHtml::submitButton('ตกลง', array(
                        'value' => 'ตกลง',
                        'id' => 'wp-submit',
                        'class' => 'button button-primary button-large',
                            )
                    );
                    ?>
                </p>
                </div>
            </div>

        </div>


        <?php $this->endWidget(); ?>

    </div>

    <div class="clear"></div>

</div><!--end #contect-->