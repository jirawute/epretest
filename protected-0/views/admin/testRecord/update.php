<?php
$this->breadcrumbs=array(
	'Test Records'=>array('index'),
	$model->test_record_id=>array('view','id'=>$model->test_record_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TestRecord', 'url'=>array('index')),
	//array('label'=>'Create TestRecord', 'url'=>array('create')),
	//array('label'=>'View TestRecord', 'url'=>array('view', 'id'=>$model->test_record_id)),
	array('label'=>'Manage TestRecord', 'url'=>array('admin')),
);
?>

<h1>Update TestRecord <?php echo $model->test_record_id; ?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model,'model_test'=>$model_test)); ?>