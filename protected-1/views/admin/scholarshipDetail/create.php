<?php
$this->breadcrumbs=array(
	'ข้อมูลทุนการศึกษา'=>array('index'),
	'เพิ่มข้อมูล',
);

$this->menu=array(
	//array('label'=>'List ScholarshipDetail', 'url'=>array('index')),
	array('label'=>'จัดการข้อมูลทุนการศึกษา', 'url'=>array('admin')),
);
?>

<h1>เพิ่มข้อมูลทุนการศึกษา</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>