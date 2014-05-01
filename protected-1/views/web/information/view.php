<?php
/* @var $this InformationController */

$this->breadcrumbs=array(
	'อัพเดทข่าวสาร' => array('/information'),
	$model->title,
);
?>



<div class="entry">
	<h1 class="entry-title"><?php echo $model->title ?></h1>
	<h2 class="entry-date"><?php echo date('l, F j, Y', strtotime($model->date_added)) ?></h2>
	<div class="entry-content">           
                <?php if($model->image){?>
                <p class="center">
                <?php echo CHtml::image(Yii::app()->baseUrl . '/uploads/information/' . $model->image,'',array('style'=>'max-width:680px')) ?>
                </p>
                <?php }?>
		<p><?php echo $model->description; ?></p>
	</div>
</div>
