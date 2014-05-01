<div class="grid_4 push_4 goback">
        <a href="index.php?r=student/view"><span></span>กลับสู่หน้าหลัก</a>
</div>

<div class="clear"></div>
<div class="grid_10 push_1 editinfo">

    <div class="editinfo_box">
        <?php if(Yii::app()->user->hasFlash('update')): ?>
        <div class="flash-success">
                <h3><?php echo Yii::app()->user->getFlash('update'); ?></h3>
        </div>
        <?php else: ?>
        <h2>แก้ไขข้อมูลส่วนตัว</h2>
        <?php echo $this->renderPartial('_edit', array('model'=>$model,'option_levels'	=> $option_levels,'option_schools'=> $option_schools, 'password_confirm'=>$password_confirm,
                        'password_not_match'=>$password_not_match,)); ?>
        <?php endif; ?>
    </div>

</div>