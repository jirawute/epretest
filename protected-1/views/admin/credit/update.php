<?php
$this->breadcrumbs=array(
	'Credits'=>array('index'),
	$model->credit_id=>array('view','id'=>$model->credit_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Credit', 'url'=>array('index')),
	array('label'=>'Create Credit', 'url'=>array('create')),
	//array('label'=>'View Credit', 'url'=>array('view', 'id'=>$model->credit_id)),
	array('label'=>'Manage Credit', 'url'=>array('admin')),
);
?>

<h1>Update Credit <?php echo $model->credit_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>