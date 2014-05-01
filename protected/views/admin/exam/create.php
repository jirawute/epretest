<?php
/* @var $this ExamController */
/* @var $model Exam */

$this->breadcrumbs=array(
	'Exams'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Exam', 'url'=>array('index')),
	array('label'=>'Manage Exam', 'url'=>array('admin')),
);
?>

<h1>Create Exam</h1>

<?php echo $this->renderPartial('_form', 
	array(
		'model'=>$model,
		'option_types'	=> $option_types,
		'option_levels'	=> $option_levels,
		'option_subjects'=>$option_subjects,
	)
); ?>