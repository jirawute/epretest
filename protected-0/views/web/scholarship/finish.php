
<div class="grid_12  application">
    <h2><?php echo $scholar->name; ?><br/>
        <?php echo $scholar->desc; ?>
    </h2>
    <div class="editinfo_box">

        <?php if (Yii::app()->user->hasFlash('success')): ?>

            <div align="center">
                <h3><?php echo Yii::app()->user->getFlash('success'); ?></h3>
            </div>
        <?php endif; ?>
        <?php if (Yii::app()->user->hasFlash('complete')): ?>
            <h2><?php echo Yii::app()->user->getFlash('complete'); ?></h2>
        <?php endif; ?>
            
        <div class="goback">
            <a href="http://www.es-ilc.org"><span></span>กลับสู่หน้าหลัก</a>
        </div>
        <br/><br/>
    </div>
</div>