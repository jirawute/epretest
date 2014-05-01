<?php
$this->breadcrumbs=array(
	'การสมัครทุน'=>array('index'),
	'แก้ไขข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Scholarship', 'url'=>array('index')),
	//array('label'=>'Create Scholarship', 'url'=>array('create')),
	//array('label'=>'View Scholarship', 'url'=>array('view', 'id'=>$model->scholar_enroll_id)),
            array('label'=>'หน้าจัดการข้อมูลสมัครทุน', 'url'=>array('admin')),
);
?>

<h1>แก้ไขข้อมูลการสมัครทุน #<?php echo $model->scholar_enroll_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'how_to_know_list'=>$how_to_know_list,'order_status_list'=>$order_status_list,)); ?>