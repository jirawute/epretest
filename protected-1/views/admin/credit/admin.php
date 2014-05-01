<?php
$this->breadcrumbs=array(
	'Credits'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Credit', 'url'=>array('index')),
	array('label'=>'Create Credit', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('credit-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Credits</h1>

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
	'id'=>'credit-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
			'name'=> 'credit_id',
			'value'=> '$data->credit_id',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		),
		array(
			'name'=> 'credit_point',
			'value'=> '$data->credit_point',
			'htmlOptions'=>array('style'=>'text-align: right;width: 60px;'),
		),
                array(
			'name'=> 'credit_amount',
			'value'=> '$data->credit_amount',
			'htmlOptions'=>array('style'=>'text-align: right;width: 80px;'),
		),
                array(
			'name'=> 'credit_desc',
			'value'=> '$data->credit_desc',
			'htmlOptions'=>array('style'=>'text-align: left;'),
		),
                array(
			'name'=> 'credit_order',
			'value'=> '$data->credit_order',
			'htmlOptions'=>array('style'=>'text-align: left;width: 80px;'),
		),
		array(
			'name'=> 'credit_status',
			'value'=> '($data->credit_status)? \'Enabled\' : \'Disabled\'',
			'htmlOptions'=>array('style'=>'text-align: center; width: 60px;'),
		),
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{update}&nbsp;&nbsp;{delete}',
			'headerHtmlOptions'=>array('style'=>'width:40px;'),
                        'htmlOptions' => array('style'=>'width:40px; text-align:center'),
		),

	),
)); ?>
