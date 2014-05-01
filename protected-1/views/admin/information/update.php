<?php
/* @var $this InformationController */
/* @var $model Information */

$this->breadcrumbs=array(
	'Informations'=>array('index'),
	$model->title=>array('view','id'=>$model->information_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Information', 'url'=>array('index')),
	array('label'=>'Create Information', 'url'=>array('create')),
	//array('label'=>'View Information', 'url'=>array('view', 'id'=>$model->information_id)),
	array('label'=>'Manage Information', 'url'=>array('admin')),
);
?>

<h1>Update Information <?php echo $model->information_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>