<?php
$this->breadcrumbs=array(
	'Scholarship Transfers'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ScholarshipTransfer', 'url'=>array('index')),
	array('label'=>'Create ScholarshipTransfer', 'url'=>array('create')),
	array('label'=>'View ScholarshipTransfer', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ScholarshipTransfer', 'url'=>array('admin')),
);
?>

<h1>Update ScholarshipTransfer <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>