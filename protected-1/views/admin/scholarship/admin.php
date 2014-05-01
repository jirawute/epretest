<?php
$this->breadcrumbs=array(
	'การสมัครทุน'=>array('index'),
	'จัดการข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Scholarship', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูลการสมัคร', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('scholarship-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>จัดการข้อมูลการสมัครทุน</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'scholarship-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'scholar_enroll_id',
                array(
			'name'=>'inv_id',
			'htmlOptions'=>array('style'=>'text-align: left;width: 70px;'),
		),
                array(
			'name'=>'scholar_id',
                        'header'=>'รหัสทุน',
			'htmlOptions'=>array('style'=>'text-align: center;width: 40px;'),
		),
                array(
			'name'=>'name_th',
			'htmlOptions'=>array('style'=>'text-align: left;width: 100px;'),
		),
                array(
			'name'=>'surename_th',
			'htmlOptions'=>array('style'=>'text-align: left;width: 120px;'),
		),                
                array(
			'name'=> 'payment_method',
                       // 'value'=> '$data->paymentStatus->name',
			'htmlOptions'=>array('style'=>'text-align: left; width: 120px;'),
                        'filter'=>array('Bank Transfer'=>'Bank Transfer','Credit Card'=>'Credit Card','Paysbuy'=>'Paysbuy','Counter Service'=>'Counter Service'),
                     

		),

                array(
			'name'=> 'payment_status',
                        'value'=> '$data->paymentStatus->name',
			'htmlOptions'=>array('style'=>'text-align: left; width: 120px;'),
                        'filter'=>CHtml::listData(OrderStatus::model()->findAll(), 'order_status_id', 'name'),

		),
                array(
			'name'=> 'status',
                        'value'=> '$data->getStatusText($data->status)',
			'htmlOptions'=>array('style'=>'text-align: center; width: 100px;'),
                        'filter'=>array('0'=>'ไม่ผ่าน','1'=>'รอคัดกรอง','2'=>'ได้รับสิทธิ์สัมภาษณ์','3'=>'ได้รับทุน'),
		),
		/*
		'name_en',
		'surename_en',
		'nickname_th',
		'nickname_en',
		'id_card',
		'birthday',
		'age',
		'school',
		'major',
		'address',
		'phone',
		'email',
		'parent_name',
		'parent_phone',
		'disease',
		'talent',
		'language',
		'language_other',
		'travel_abroad_status',
		'travel_abroad_detail',
		'image',
		'portfolio',
		'how_to_know',
		'how_to_know_other',
		'profile',
		'reason',
		'message',
		'scholarship_type',
		'payment_status',
		'payment_method',
		'payment_amount',
		'inv_id',
		'date_created',
		'date_modified',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}&nbsp;&nbsp;{delete}',
			'headerHtmlOptions'=>array('style'=>'width:40px;'),
                        'htmlOptions' => array('style'=>'width:40px; text-align:center'),

		),
	),
)); ?>
