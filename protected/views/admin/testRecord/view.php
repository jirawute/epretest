<?php
$this->breadcrumbs=array(
	'Test Records'=>array('index'),
	$model->test_record_id,
);

$this->menu=array(
	array('label'=>'List TestRecord', 'url'=>array('index')),
	array('label'=>'Create TestRecord', 'url'=>array('create')),
	array('label'=>'Update TestRecord', 'url'=>array('update', 'id'=>$model->test_record_id)),
	array('label'=>'Delete TestRecord', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->test_record_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TestRecord', 'url'=>array('admin')),
);
?>

<h1>View TestRecord #<?php echo $model->test_record_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'test_record_id',
		'exam_id',
		'student_id',
		'score',
		'date_attended',
		'elapse_time',
		'status',
	),
)); ?>
