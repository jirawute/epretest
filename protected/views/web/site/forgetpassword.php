<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Forget Password';
?>
 <?php if(Yii::app()->user->hasFlash('forgetpass')): ?>
        <div class="grid_4 push_4 goback">
                <a href="index.php"><span></span>กลับสู่หน้าหลัก</a>
        </div>
        <div class="grid_10 push_1 login_signup" style="margin-top:40px;">
            <div class="signup_box">
                <div class="flash-success">
                        <h3><?php echo Yii::app()->user->getFlash('forgetpass'); ?></h3>
                </div>
            </div>
        </div>
<?php else: ?>
<div class="grid_6 push_3 login_signup" style="margin-bottom:50px">

	<h2>ลืมรหัสผ่าน</h2>
        <div class="login_box">
                
                <?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'forgetpassword-form',
				'enableClientValidation'=>true,
				'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		));

                ?>

			<p>
				<?php echo $form->labelEx($model,'email'); ?>
				<?php echo $form->textField($model,'email',array('class'=>'input')); ?>
				<?php echo $form->error($model,'email'); ?>
			</p>
                        <div class="hint">กรณีที่คุณลืมรัหสผ่าน คุณสามารถขอรับรหัสใหม่ได้โดยกรอกอีเมล์ที่เคยลงทะเบียนไว้กับ E-Pretest ค่ะ</div>

			<p class="submit">
				<?php echo CHtml::submitButton('ส่งข้อมูล',
					array(
						'value'=> 'ส่งข้อมูล',
						'id'=> 'wp-submit',
						'class'=> 'button button-primary button-large',
					)
				); ?>
			</p>
                       
		<?php $this->endWidget(); ?>               
	</div>
</div>
<?php endif; ?>
<div class="clear"></div>

