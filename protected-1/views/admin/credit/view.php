<?php
$this->breadcrumbs=array(
	'Credits'=>array('index'),
	$model->credit_id,
);

$this->menu=array(
	array('label'=>'List Credit', 'url'=>array('index')),
	array('label'=>'Create Credit', 'url'=>array('create')),
	array('label'=>'Update Credit', 'url'=>array('update', 'id'=>$model->credit_id)),
	array('label'=>'Delete Credit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->credit_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Credit', 'url'=>array('admin')),
);
?>

<h1>View Credit #<?php echo $model->credit_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'credit_id',
		'credit_point',
		'credit_amount',
		'credit_desc',
		'credit_order',
		'credit_status',
	),
)); ?>
