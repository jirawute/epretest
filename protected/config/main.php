<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.crugeconnector.*',
                'ext.yii-mail.YiiMailMessage',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),
	
	'behaviors'=>array(
		'runEnd'=>array(
			'class'=>'application.components.WebApplicationEndBehavior',
		),
	),

	// application components
	'components'=>array(
		 'session' => array(
             'autoStart'=>true,
         ),
		'user'=>array(
			//'class'=>'WebUser',
                        'class'=>'WebStudent',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			
		),
		'authManager'=>array(
			'class'=>'CPhpAuthManager',
			//'authFile'=>''
		),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=epretest_estudio',
			'emulatePrepare' => true,
			'username' => 'epretest',
			'password' => 'epre1q2w3e',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
                'mail' => array(
                        'class' => 'ext.yii-mail.YiiMail',
                        'transportType'=>'smtp',
                        'transportOptions'=>array(
                                'host'=>'ssl://smtp.gmail.com',
                                'username'=>'epretest@e-studio.co.th',
                                'password'=>'epretest1q2w3e',
                                'port'=>'465',                       
                        ),
                        'viewPath' => 'application.views.mail',             
                ),            
		'crugeconnector'=>array(
                'class'=>'ext.crugeconnector.CrugeConnector',
				'hostcontrollername'=>'site',
				'onSuccess'=>array('student/loginsuccess'),
				'onError'=>array('student/loginerror'),
				'clients'=>array(
					'facebook'=>array(
						// required by crugeconnector:
						'enabled'=>true,
						'class'=>'ext.crugeconnector.clients.Facebook',
						'callback'=>'http://www.e-pretest.com/facebook-callback.php',
						// required by remote interface:
						'client_id'=>"486075831446537",
                        'client_secret'=>"bd4c8d92c303261e401fa52ae66017b6",
						'scope'=>'email, read_stream',
					),
					'tester'=>array(
						// required by crugeconnector:
						'enabled'=>false,
						'class'=>'ext.crugeconnector.clients.Tester',
						// required by remote interface:
					),
				),
			),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		
		'itemsPerPage' => 2,
		'payment_methods' => array(
			'bank_transfer'	=> 'Bank Transfer',
			'credit_card'	=> 'Credit Card',
			'paysbuy'		=> 'PAYSBUY',
		),
	),
);