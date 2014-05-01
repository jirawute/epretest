<?php
$this->breadcrumbs=array(
	'Scholarships',
);

$this->menu=array(
	array('label'=>'Create Scholarship', 'url'=>array('create')),
	array('label'=>'Manage Scholarship', 'url'=>array('admin')),
);
?>

<h1>Scholarships</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
