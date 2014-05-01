<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
?>

<div class="grid_6 push_3 login_signup">

	<h2><?php echo $this->label['heading_title']; ?></h2>
	<div class="login_box">
               
                <?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'login-form',
				'enableClientValidation'=>true,
				'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		));

                ?>

			<p>
				<?php echo $form->labelEx($model,'username'); ?>
				<?php echo $form->textField($model,'username',array('class'=>'input')); ?>
				<?php echo $form->error($model,'username'); ?>
			</p>
			<p>
				<?php echo $form->labelEx($model,'password'); ?>
				<?php echo $form->passwordField($model,'password',array('class'=>'input')); ?>
				<?php echo $form->error($model,'password'); ?>
			</p>
			<p>
				<?php echo $form->checkBox($model,'rememberMe',array('class'=>'rememberme')); ?>
				<?php echo $form->label($model,'rememberMe', array('class'=>'rememberme')); ?>
			</p>
           
			<p class="submit">
				<?php echo CHtml::submitButton('Login', 
					array(
						'value'=> $this->label['button_login'],
						'id'=> 'wp-submit',
						'class'=> 'button button-primary button-large',
					)
				); ?>
                            
                        </p>
                        <br /><br /><br />
                        <p >
                            <a href="/eStudio/index.php?r=site/forgetpassword"><h3>ลืมรหัสผ่าน</h3></a>
                        </p>
                        <p >
                            <a href="/eStudio/index.php?r=student/signup"><h3>สมัครสมาชิก</h3></a>
                        </p>
		<?php $this->endWidget(); ?>
	</div>
</div>

<div class="clear"></div>
