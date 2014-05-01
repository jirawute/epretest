<?php if(Yii::app()->user->hasFlash('create')): ?>
<div class="grid_4 push_4 goback">
        <a href="index.php"><span></span>กลับสู่หน้าหลัก</a>
</div>
<div class="clear"></div>
<div class="grid_10 push_1 login_signup" style="margin-top:40px;">
    <div class="signup_box">
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('create'); ?>
            <br/>
            <h3>กรอกอีเมล์เพื่อนของคุณ</h3>
            <p>กรอกอีเมล์เพื่อแนะนำเพื่อนของคุณ ยิ่งกรอกมาก ยิ่งได้รับสิทธิพิเศษมาก</p><br/>
            <form class="form_send_email" name="friend_email" id="friend_email" action="index.php?r=student/sendEmailFriend" method="post" onsubmit="return validateForm()" >
                <div><label>1.</label><input type="text" name="friend_email[]" id="email_1"/></div>
                <div><label>2.</label><input type="text" name="friend_email[]" id="email_2"/></div>
                <div><label>3.</label><input type="text" name="friend_email[]" id="email_3"/></div>
                <div><label>4.</label><input type="text" name="friend_email[]" id="email_4"/></div>
                <div><label>5.</label><input type="text" name="friend_email[]" id="email_5"/></div>
                <input type="hidden" name="student_id" value="<?php echo $_GET['id'];?>">
                <div align="center"><input type="submit" value="ส่งข้อมูล"/></div>

            </form>
        </div>
    </div>
</div>
<?php else: ?>
<div class="grid_10 push_1 login_signup">       

                    <h2>สมัครสมาชิก</h2>

                    <div class="signup_box">

                            <div class="signup_normal_box">

                                    <h3>สมัครสมาชิกแบบธรรมดา</h3>
                                    <?php $form=$this->beginWidget('CActiveForm', array(
                                                                    'id'=>'student-form',
                                                                    'enableAjaxValidation'=>false,
                                                            )); ?>
                                            <p class="note" style="color:red;font-size:12px">ข้อมูลที่ต้องกรอก <span class="required">*</span></p>
                                            <?php echo $form->errorSummary($model,'กรุณากรอกข้อมูลให้ถูกต้อง');?>
                                            <p>
                                                    <div class="firstname">
                                                            <?php echo $form->labelEx($model,'firstname'); ?>
                                                            <?php echo $form->textField($model,'firstname',array('class'=>'input')); ?>
                                                            <?php echo $form->error($model,'firstname'); ?>
                                                    </div>

                                                    <div class="lastname">
                                                            <?php echo $form->labelEx($model,'lastname'); ?>
                                                            <?php echo $form->textField($model,'lastname',array('class'=>'input')); ?>
                                                            <?php echo $form->error($model,'lastname'); ?>
                                                    </div>
                                            </p>
                                            <div class="clear"></div>
                                            <p>
                                                    <?php echo $form->labelEx($model,'email'); ?>
                                                    <?php echo $form->textField($model,'email',array('class'=>'input')); ?>
                                                    <?php echo $form->error($model,'email'); ?>
                                            </p>
                                            <p>
                                                    <?php echo $form->labelEx($model,'level_id'); ?>
                                                    <?php echo $form->dropDownList($model,'level_id', $option_levels); ?>
                                                    <?php echo $form->error($model,'level_id'); ?>
                                            </p>
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
                                                    <label for="user_pass_retype">ยืนยันรหัสผ่าน *</label>
                                                    <input type="password" name="password_confirm" id="password_confirm" class="input" value="" />

                                           </p>
                                           <?php if(($password_confirm==1)||($password_not_match==1) ){?>
                                           <p class="errorMessage">
                                                    <?php if($password_confirm==1) echo $this->label['confirm_pass_label']?>
                                                    <?php if($password_not_match==1) echo $this->label['pass_not_match_label']?>
                                            </p>
                                            <?php } ?>
                                            <p class="submit">
                                                <?php echo CHtml::submitButton('สมัครสมาชิก',
                                                        array(
                                                                'value'=> $this->label['button_login'],
                                                                'id'=> 'wp-submit',
                                                                'class'=> 'button button-primary button-large',
                                                        )
                                                ); ?>
                                            </p>
                                    <?php $this->endWidget(); ?>
                            </div>

                            <div class="signup_with_facebook_box">
                                    <h3>สิทธิประโยชน์ที่ได้รับ</h3>
                                    <br/>
                                    <ul>
                                            <li>ทำข้อสอบและทราบผลคะแนนสอบ</li>
                                            <li>เติมเครดิตผ่านช่องทางต่าง ๆ</li>
                                            <li>รับข้อมูลข่าวสารต่าง ๆ ของทางเว็บไซต์</li>
                                            <li>รับเครดิตเพิ่มจาก Invite Friends (สูงสุด 50 เครดิต)</li>
                                    </ul>
                            </div>

                    </div>

</div>
<?php endif; ?>