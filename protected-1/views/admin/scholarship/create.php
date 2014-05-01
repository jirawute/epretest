<?php
$this->breadcrumbs=array(
	'Scholarships'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Scholarship', 'url'=>array('index')),
	array('label'=>'Manage Scholarship', 'url'=>array('admin')),
);
?>

<h1>Create Scholarship</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>