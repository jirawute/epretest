<?php
$this->breadcrumbs=array(
	'Test Records'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TestRecord', 'url'=>array('index')),
	array('label'=>'Manage TestRecord', 'url'=>array('admin')),
);
?>

<h1>Create TestRecord</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>