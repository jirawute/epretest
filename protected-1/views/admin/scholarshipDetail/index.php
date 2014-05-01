<?php
$this->breadcrumbs=array(
	'Scholarship Details',
);

$this->menu=array(
	array('label'=>'Create ScholarshipDetail', 'url'=>array('create')),
	array('label'=>'Manage ScholarshipDetail', 'url'=>array('admin')),
);
?>

<h1>Scholarship Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
