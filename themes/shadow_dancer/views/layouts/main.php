<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/buttons.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/icons.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/tables.css" />
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/mbmenu.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/mbmenu_iestyles.css" />
	

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">
	<div id="topnav">
		<div class="topnav_text"><?php echo (!Yii::app()->user->isGuest)? CHtml::link('Logout ('.Yii::app()->user->name.')', array('site/logout')) :''; ?></div>
	</div>
	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->
	
	<?php
            if ($this->showMenu) {
                $this->widget('application.extensions.mbmenu.MbMenu', array(
                    'items' => array(
                        array('label' => 'Home', 'url' => array('/site')),
                        array('label' => 'Site Management', 'items' => array(
                                array('label' => 'Banners', 'url' => array('/banner')),
                                array('label' => 'Informations', 'url' => array('/information')),
                            )),
                        array('label' => 'Exam', 'items' => array(
                                array('label' => 'Exam Attributes', 'items' => array(
                                        array('label' => 'Level', 'url' => array('/level')),
                                        array('label' => 'Type', 'url' => array('/type')),
                                        array('label' => 'Subject', 'url' => array('/subject')),
                                    )),
                                array('label' => 'Exams', 'url' => array('/exam')),
                                array('label' => 'Answer Sheet', 'url' => array('/session')),
                                array('label' => 'Answer', 'url' => array('/answer')),
                            )),
                        array('label'=>'Test Record', 'url'=>array('/testRecord')),
                        array('label' => 'Sales', 'items' => array(
                                array('label' => 'Orders', 'url' => array('/order')),
                                array('label' => 'Credits', 'url' => array('/credit/admin')),
                                array('label' => 'Bank Transfer', 'url' => array('/transfer')),
                                array('label' => 'Coupons', 'url' => array('/coupon')),
                            //array('label'=>'Credit Card', 'url'=>array('/payment', 'method'=>'credit_card')),
                            //array('label'=>'PAYSBUY', 'url'=>array('/payment', 'method'=>'paysbuy')),
                            //array('label'=>'Counter Service', 'url'=>array('/payment')),
                            )),
                       array('label'=>'Scholarship', 'items'=>array(
                          array('label'=>'ข้อมูลทุนการศึกษา', 'url'=>array('/scholarshipDetail')),
                          array('label'=>'ข้อมูลการสมัครทุนฯ', 'url'=>array('/scholarship')),
                          array('label'=>'ข้อมูลแจ้งการโอนเงิน', 'url'=>array('/scholarshipTransfer')),
                          )),
                        array('label' => 'Users', 'items' => array(
                              array('label' => 'Admin','url' => array('/user')),
                                array('label' => 'Student', 'url' => array('/student')),
                            )),
                    //array('label'=>'Settings', 'url'=>array('/setting')),
//                array('label'=>'Theme Pages',
//                  'items'=>array(
//                    array('label'=>'Graphs & Charts', 'url'=>array('/site/page', 'view'=>'graphs'),'itemOptions'=>array('class'=>'icon_chart')),
//					array('label'=>'Form Elements', 'url'=>array('/site/page', 'view'=>'forms')),
//					array('label'=>'Interface Elements', 'url'=>array('/site/page', 'view'=>'interface')),
//					array('label'=>'Error Pages', 'url'=>array('/site/page', 'view'=>'Demo 404 page')),
//					array('label'=>'Calendar', 'url'=>array('/site/page', 'view'=>'calendar')),
//					array('label'=>'Buttons & Icons', 'url'=>array('/site/page', 'view'=>'buttons_and_icons')),
//                  ),
//                ),
                    ),
                ));
            }
            ?>

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by webapplicationthemes.com<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>