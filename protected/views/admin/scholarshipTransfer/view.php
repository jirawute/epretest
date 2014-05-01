<script type="text/javascript">
    function UpdateStatus(){
        var trans_id = document.getElementById('trans_id').value;
        var inv_id = document.getElementById('inv_id').value;

        alert(trans_id);
        alert(inv_id);


    }
</script>
<?php
$this->breadcrumbs=array(
	'ข้อมูลแจ้งการโอนเงิน'=>array('index'),
	'Invoice No.'.$model->inv_id,
);

$this->menu=array(
//	array('label'=>'List ScholarshipTransfer', 'url'=>array('index')),
//	array('label'=>'Create ScholarshipTransfer', 'url'=>array('create')),
//	array('label'=>'Update ScholarshipTransfer', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete ScholarshipTransfer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'จัดการข้อมูลแจ้งการโอนเงิน', 'url'=>array('admin')),
);
?>

<h1>ข้อมูลแจ้งการโอนเงิน #<?php echo $model->id; ?></h1>
  <?php if(Yii::app()->user->hasFlash('success')): ?>

    <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>

    <?php endif; ?>
    <?php if(Yii::app()->user->hasFlash('error')): ?>

    <div class="flash-error">
            <?php echo Yii::app()->user->getFlash('error'); ?>
    </div>

    <?php endif; ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'inv_id',
		'name',
		'email',
		'phone',
		'amount',
		'bank',
		'date',
		'detail',
		array(
                    'name'=>'รูปภาพหลักฐานการโอนเงิน',
                    //'type'=>'html',
                    'type'=>'raw',

                    'value'=>CHtml::image('../../uploads/scholarships/'.$model->image,'Slip',array('style'=>'max-width:500px;')).'<br/>'.cHtml::link('คลิกเพื่อดูภาพขนาดจริง', '../../uploads/scholarships/'.$model->image,array('target'=>'_blank')),

                ),
		
                array(
			'name'=> 'สถานะการส่งอีเมล์แจ้งเตือน',
			'value'=> ($model->send_email=="Y")? 'ส่งแล้ว' : 'ยังไม่ได้ส่ง',
		),
                array(
			'name'=> 'ปรับสถานะการชำระเงิน',
			'value'=> ($model->status=="Y")? 'ปรับแล้ว' : 'ยังไม่ได้ปรับ',
		),
	),
)); ?>
<?php if($model->status=='N' || $model->send_email=='N'){?>

<form name="ScholarshipTransfer" id="scholarship-transfer-form" method="post" action="<?php echo Yii::app()->createUrl('scholarshipTransfer/update', array('id'=>$model->id)); ?>">
    <input type="hidden" name="ScholarshipTransfer[trans_id]" id="trans_id" value="<?php echo $model->id;?>"/>
    <input type="hidden" name="ScholarshipTransfer[inv_id]" id="inv_id" value="<?php echo $model->inv_id;?>"/>

    <p align="center">
        <input type="submit" name="btn" id="btn" value="ปรับสถานะการชำระเงินและส่งอีเมล์" onclick=""/>
         <?php echo CHtml::Button('ยกเลิก', array('submit' => array('index'))); ?>
    </p>
</form>
<?php }else{?>
    <p align="center">
    <?php echo CHtml::Button('ย้อนกลับ', array('submit' => array('index'))); ?>
    </p>
<?php }?>