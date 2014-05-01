<?php
$this->breadcrumbs=array(
	'Scholarship Transfers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ScholarshipTransfer', 'url'=>array('index')),
	array('label'=>'Manage ScholarshipTransfer', 'url'=>array('admin')),
);
?>

<h1>Create ScholarshipTransfer</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>