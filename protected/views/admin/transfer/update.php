<?php
$this->breadcrumbs=array(
	'Transfers'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Transfer', 'url'=>array('index')),
	array('label'=>'Create Transfer', 'url'=>array('create')),
	array('label'=>'View Transfer', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Transfer', 'url'=>array('admin')),
);
?>

<h1>Update Bank Transfer <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>