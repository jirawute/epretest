<?php
/* @var $this CreditPointController */

$this->breadcrumbs=array(
	'Coupon',
);
?>


<?php
foreach(Yii::app()->user->getFlashes() as $key => $message) {
	echo '<div class="flash-' . strtolower($key) . '"><b>' . strtoupper($key) . '</b>: ' . $message . '</div>';
}
?>

<h1>Coupons</h1>

<?php 
echo $this->renderPartial('_form', array(
	'coupons' => $coupons,
	'row' => ($row),
));?>