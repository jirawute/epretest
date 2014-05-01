<?php
$this->breadcrumbs=array(
	'Sessions'=>array('index'),
	$model->session_id,
);

$this->menu=array(
	array('label'=>'List Session', 'url'=>array('index')),
	array('label'=>'Create Session', 'url'=>array('create')),
	array('label'=>'Update Session', 'url'=>array('update', 'id'=>$model->session_id)),
	array('label'=>'Delete Session', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->session_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Session', 'url'=>array('admin')),
);
?>

<h1>View Session #<?php echo $model->session_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'session_id',
		'exam_id',
		'session_name',
		'answer_type_id',
		'session_order',
		'session_total',
		'session_start',
		'session_end',
		'session_score_total',
		'session_status',
	),
)); ?>
