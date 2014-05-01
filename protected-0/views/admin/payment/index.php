<?php
/* @var $this PaymentController */

$this->breadcrumbs=array(
	'Payment',
	$title,
);
?>

<?php
foreach(Yii::app()->user->getFlashes() as $key => $message) {
	echo '<div class="flash-' . strtolower($key) . '"><b>' . strtoupper($key) . '</b>: ' . $message . '</div>';
}
?>

<h1><?php echo $title; ?></h1>

<?php 
echo $this->renderPartial($form, array(
	'method'		=>$method,
	'form_data'		=>$form_data, 
	'order_statuses'=>$order_statuses
));?>
