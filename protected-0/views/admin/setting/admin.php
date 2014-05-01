<?php
/* @var $this AdminSettingController */

$this->breadcrumbs=array(
	'Settings',
);

?>

<h1>Settings</h1>

<?php echo $this->renderPartial('_form', array('config'=>$config)); ?>

