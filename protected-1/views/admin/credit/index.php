<?php
$this->breadcrumbs=array(
	'Credits',
);

$this->menu=array(
	array('label'=>'Create Credit', 'url'=>array('create')),
	array('label'=>'Manage Credit', 'url'=>array('admin')),
);
?>

<h1>Credits</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
