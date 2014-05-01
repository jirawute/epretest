<?php
$this->breadcrumbs=array(
	'Test Records',
);

$this->menu=array(
	//array('label'=>'Create TestRecord', 'url'=>array('create')),
	array('label'=>'Manage TestRecord', 'url'=>array('admin')),
);
?>

<h1>Test Records</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
