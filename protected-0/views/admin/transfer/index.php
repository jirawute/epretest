<?php
$this->breadcrumbs=array(
	'Bank Transfer',
);

$this->menu=array(
        array('label'=>'List Bank Transfer', 'url'=>array('index')),
	//array('label'=>'Create Transfer', 'url'=>array('create')),
	//array('label'=>'Manage Transfer', 'url'=>array('admin')),
);
?>

<h1>Bank Transfer</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
