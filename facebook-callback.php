<?php

    // copy this code into /yourapp/facebook-callback.php
    // don't forget to stablish the $yii path !!
    //
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    $yii = 'framework/yii.php';
    $config = 'protected/config/_web.php';


    defined('YII_DEBUG') or define('YII_DEBUG',false);
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

    $_GET['r'] = 'site/crugeconnector';    // <--using 'site' ?
    $_GET['crugekey'] = 'facebook';         // <--facebook key
    $_GET['crugemode'] = 'callback';


    require_once($yii);
    Yii::createWebApplication($config)->runEnd('web');

    //header('Location: http://www.e-pretest.com/index.php?r=site/loginsuccess&key=facebook');

    ?>