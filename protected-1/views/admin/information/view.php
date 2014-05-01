<?php
/* @var $this InformationController */
/* @var $model Information */

$this->breadcrumbs=array(
	'Informations'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Information', 'url'=>array('index')),
	array('label'=>'Create Information', 'url'=>array('create')),
	array('label'=>'Update Information', 'url'=>array('update', 'id'=>$model->information_id)),
	array('label'=>'Delete Information', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->information_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Information', 'url'=>array('admin')),
);
?>

<h1>View Information #<?php echo $model->information_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'information_id',
		'user_id',
		'title',
		'description',
		'date_added',
		'sort_order',
		'status',
	),
)); ?>
