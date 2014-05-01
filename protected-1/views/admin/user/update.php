<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$user->user_id=>array('view','id'=>$user->user_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	//array('label'=>'View User', 'url'=>array('view', 'id'=>$model->user_id)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Update User <?php echo $user->user_id; ?></h1>

<?php echo $this->renderPartial('_form', array('user'=>$user,'user_group_data'=>$user_group_data)); ?>