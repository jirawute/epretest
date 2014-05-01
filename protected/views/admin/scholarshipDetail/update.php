<?php
$this->breadcrumbs=array(
	'ข้อมูลทุนการศึกษา'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List ScholarshipDetail', 'url'=>array('index')),
	array('label'=>'เพิ่มข้อมูลทุนการศึกษา', 'url'=>array('create')),
	//array('label'=>'View ScholarshipDetail', 'url'=>array('view', 'id'=>$model->scholar_id)),
	array('label'=>'จัดการข้อมูลทุนการศึกษา', 'url'=>array('admin')),
);
?>

<h1>แก้ไขข้อมูลทุนการศึกษา #<?php echo $model->scholar_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>