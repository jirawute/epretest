<?php
/* @var $this ExamController */
/* @var $model Exam */

$this->breadcrumbs=array(
	'Exams'=>array('index'),
	$model->name=>array('view','id'=>$model->exam_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Exam', 'url'=>array('index')),
	array('label'=>'Create Exam', 'url'=>array('create')),
	//array('label'=>'View Exam', 'url'=>array('view', 'id'=>$model->exam_id)),
	array('label'=>'Manage Exam', 'url'=>array('admin')),
);

$this->menu2=array(
	array(
		'label'=>'Add Answer Sheet',
		'url'=>array('/session/create', 'exam_id'=>$model->exam_id),
		'linkOptions'=>array(
			'encode'=>false, 
			'style'=>'padding-left: 20px',
			'class'=>'icon icon-add'
		),
	),
      /*  array(
		'label'=>'List Answer Sheet',
		'url'=>array('/session/search', 'id'=>$model->exam_id),
		'linkOptions'=>array(
			'encode'=>false,
			'style'=>'padding-left: 20px',
			'class'=>'icon icon-add'
		),
	),*/
);
?>

<h1>Update Exam <?php echo $model->exam_id; ?></h1>

<?php echo $this->renderPartial('_form', 
	array(
		'model'=>$model,
		'option_types'	=> $option_types,
		'option_levels'	=> $option_levels,
		'option_subjects'=>$option_subjects,
	)
); ?>