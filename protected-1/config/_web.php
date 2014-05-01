<?php

return CMap::mergeArray(
                require(dirname(__FILE__) . '/main.php'), array(
            'name' => 'คลังข้อสอบออนไลน์',
            'homeUrl' => array('/site'),
            'components' => array(
                'urlManager' => array(
                   // 'urlFormat' => 'path',
                    'showScriptName' => false,
                    'rules' => array(
               '<controller:\w+>'=>'<controller>/list',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                '<controller:\w+>/<id:\d+>/<title>'=>'<controller>/view',
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                    ),
                ),
            ))
);
?>