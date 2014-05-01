<?php
$this->breadcrumbs=array(
	'ข้อมูลแจ้งการโอนเงิน'=>array('index'),
	'จัดการข้อมูล',
);

$this->menu=array(
	//array('label'=>'List ScholarshipTransfer', 'url'=>array('index')),
	//array('label'=>'Create ScholarshipTransfer', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('scholarship-transfer-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการข้อมูลแจ้งการโอนเงิน</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'scholarship-transfer-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
			'name'=>'id',
			'header'=>'No.',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		),
		array(
			'name'=>'inv_id',
			'htmlOptions'=>array('style'=>'text-align: left;width: 70px;'),
		),                
                array(
			'name'=>'name',
			'htmlOptions'=>array('style'=>'text-align: left;width: 150px;'),
		),
		'email',
                array(
			'name'=> 'amount',
			'htmlOptions'=>array('style'=>'text-align: left; width: 100px;'),
		),
                array(
			'name'=> 'date',
			'htmlOptions'=>array('style'=>'text-align: left; width: 80px;'),
		),
                array(
			'name'=> 'send_email',
			//'value'=> '(($data->send_email)=="Y")? \'ส่งแล้ว\' : \'ยังไม่ได้ส่ง\'',
			'htmlOptions'=>array('style'=>'text-align: center; width: 80px;'),
                        'filter'=>array('N'=>'ยังไม่ได้ส่ง','Y'=>'ส่งแล้ว'),

		),
		/*
		'bank',
		'date',
		'detail',
		'image',
		'status',
		'send_email',
		*/
		array(
			'class'=>'CButtonColumn',
                        'header'=>'ดูรายละเอียด',
                        'template'=>'{view}&nbsp;&nbsp;{delete}',
			'headerHtmlOptions'=>array('style'=>'width:80px;'),
                        'htmlOptions' => array('style'=>'width:40px; text-align:center'),
		),
	),
)); ?>
