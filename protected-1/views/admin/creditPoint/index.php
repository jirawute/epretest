<?php
/* @var $this CreditPointController */

$this->breadcrumbs=array(
	'Credit',
);
?>


<?php
foreach(Yii::app()->user->getFlashes() as $key => $message) {
	echo '<div class="flash-' . strtolower($key) . '"><b>' . strtoupper($key) . '</b>: ' . $message . '</div>';
}
?>

<h1>Credit</h1>

<?php 
echo $this->renderPartial('_form', array(
	'credit_points' => $credit_points,
	'row' => ($row),
));?>