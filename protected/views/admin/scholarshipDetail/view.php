<?php
$this->breadcrumbs=array(
	'Scholarship Details'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ScholarshipDetail', 'url'=>array('index')),
	array('label'=>'Create ScholarshipDetail', 'url'=>array('create')),
	array('label'=>'Update ScholarshipDetail', 'url'=>array('update', 'id'=>$model->scholar_id)),
	array('label'=>'Delete ScholarshipDetail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->scholar_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ScholarshipDetail', 'url'=>array('admin')),
);
?>

<h1>View ScholarshipDetail #<?php echo $model->scholar_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'scholar_id',
		'name',
		'desc',
		'period_start',
		'period_end',
		'price',
		'status',
	),
)); ?>
