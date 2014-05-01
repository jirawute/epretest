<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainMbMenu">
		<?php $this->widget('application.extensions.mbmenu.MbMenu',array(
			'items'=>array(
				array('label'=>'Dashboard', 'url'=>array('/site')),
				array('label'=>'Management', 'items'=>array(
					array('label'=>'Informations', 'url'=>array('/information')),
					array('label'=>'Users', 'url'=>array('/user')),
					array('label'=>'Exams', 'url'=>array('/exam')),
					array('label'=>'Exam Attributes', 'items' => array(
						array('label'=>'Type', 'url'=>array('/type')),
						array('label'=>'Subject', 'url'=>array('/subject')),
						array('label'=>'Level', 'url'=>array('/level')),
					)),
					array('label'=>'Banners', 'url'=>array('/banner')),
				)),
				array('label'=>'Extensions', 'items'=>array(
					array('label'=>'Payments', 'items' => array(
						array('label'=>'Bank Transfer', 'url'=>array('/payment', 'g'=>'bank_transer')),
						array('label'=>'Credit Card', 'url'=>array('/payment', 'g'=>'credit_card')),
						array('label'=>'PAYSBUY', 'url'=>array('/payment', 'g'=>'paysbuy')),
					)),
					array('label'=>'Credits', 'url'=>array('/credit/admin')),
					array('label'=>'Coupons', 'url'=>array('/coupon')),
				)),
				array('label'=>'Sales', 'items'=> 
					array(
						array('label'=>'Orders', 'url'=>array('/order')),
					),
				),
				array('label'=>'Settings', 'url'=>array('/setting')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
