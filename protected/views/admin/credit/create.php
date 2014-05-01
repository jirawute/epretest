<?php
$this->breadcrumbs=array(
	'Credits'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Credit', 'url'=>array('index')),
	array('label'=>'Manage Credit', 'url'=>array('admin')),
);
?>

<h1>Create Credit</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>