<?php
$this->breadcrumbs=array(
	'Scholarships'=>array('index'),
	$model->scholar_enroll_id,
);

$this->menu=array(
	array('label'=>'List Scholarship', 'url'=>array('index')),
	array('label'=>'Create Scholarship', 'url'=>array('create')),
	array('label'=>'Update Scholarship', 'url'=>array('update', 'id'=>$model->scholar_enroll_id)),
	array('label'=>'Delete Scholarship', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->scholar_enroll_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Scholarship', 'url'=>array('admin')),
);
?>

<h1>View Scholarship #<?php echo $model->scholar_enroll_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'scholar_enroll_id',
		'scholar_id',
		'title_th',
		'title_en',
		'name_th',
		'surename_th',
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
	),
)); ?>
