<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Order', 'url'=>array('index')),
	array('label'=>'Create Order', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#order-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Orders</h1>

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
	'id'=>'order-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
			'name'=>'inv_id',
			'htmlOptions'=>array('style'=>'text-align: left;width: 70px;'),
		),
		'firstname',
		'lastname',
                array(
			'name'=>'payment_method',
			'htmlOptions'=>array('style'=>'text-align: left;width: 100px;'),
                        'filter'=>CHtml::listData(Order::model()->findAll(), 'payment_method', 'payment_method'),
		),
                array(
			'name'=>'total',
			'htmlOptions'=>array('style'=>'text-align: left;width: 70px;'),
		),
                array(
			'name'=> 'order_status_id',
			'value'=> '$data->orderStatus->name',
			'htmlOptions'=>array('style'=>'text-align: left; width: 100px;'),
                        'filter'=>CHtml::listData(OrderStatus::model()->findAll(), 'order_status_id', 'name'),
		),
		'date_added',
		'date_modified',
		/*
		'total',
		'order_status_id',
		'date_added',
		'date_modified',
		'ip',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}&nbsp;&nbsp;{delete}',
			'headerHtmlOptions'=>array('style'=>'width:40px;'),
                        'htmlOptions' => array('style'=>'width:40px; text-align:center'),

		),
	),
)); ?>
