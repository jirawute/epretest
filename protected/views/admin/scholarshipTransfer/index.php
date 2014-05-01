<?php
$this->breadcrumbs=array(
	'Scholarship Transfers',
);

$this->menu=array(
	array('label'=>'Create ScholarshipTransfer', 'url'=>array('create')),
	array('label'=>'Manage ScholarshipTransfer', 'url'=>array('admin')),
);
?>

<h1>Scholarship Transfers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
