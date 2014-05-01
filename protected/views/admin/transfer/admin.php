<?php
$this->breadcrumbs=array(
	'Payment',
        'Bank Transfer',
);

$this->menu=array(
	array('label'=>'List Bank Transfer', 'url'=>array('index')),
	//array('label'=>'Create Transfer', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('transfer-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Bank Transfer</h1>

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
	'id'=>'transfer-grid',
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
			'htmlOptions'=>array('style'=>'text-align: left;width: 50px;'),
		),
                array(
			'name'=>'name',
			'htmlOptions'=>array('style'=>'text-align: left;width: 150px;'),
		),
                'email',
                array(
			'name'=> 'phone',
			'htmlOptions'=>array('style'=>'text-align: left; width: 80px;'),
		),
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
			'value'=> '(($data->send_email)=="Y")? \'Sent\' : \'Not Send\'',
			'htmlOptions'=>array('style'=>'text-align: center; width: 80px;'),
                        'filter'=>array('N'=>'Not Send','Y'=>'Sent'),

		),
               
		/*
		'bank',
		'date',
		'detail',
		'images',
		'status',
		'send_email',
		*/
		array(
			'class'=>'CButtonColumn',
                        'header'=>'ดูรายละเอียด',
                        'template'=>'{view}',
			'headerHtmlOptions'=>array('style'=>'width:80px;'),
                        'htmlOptions' => array('style'=>'width:40px; text-align:center'),
		),
	),
)); ?>
