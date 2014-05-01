<?php
/* @var $this TypeController */
/* @var $model Type */

$this->breadcrumbs=array(
	'Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Type', 'url'=>array('index')),
	array('label'=>'Create Type', 'url'=>array('create')),
	array('label'=>'Update Type', 'url'=>array('update', 'id'=>$model->type_id)),
	array('label'=>'Delete Type', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->type_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Type', 'url'=>array('admin')),
);
?>

<h1>View Type #<?php echo $model->type_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'type_id',
		'name',
                'exam_type',
                'level_id',
		'sort_order',
		'status',
	),
)); ?>
