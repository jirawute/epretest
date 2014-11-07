<?php

return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
    	'name'=>'eStudio - Administration',
    	'theme'=>'shadow_dancer',
    	'homeUrl'=>array('/site'),
    	'components'=>array(
		'user'=>array(
			'class'=>'WebUser',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,

		),
            
			'urlManager'=>array(
				'urlFormat'=>'path',
				'showScriptName'=>false,
				'rules'=>array(
					'admin'=>'site/index',
					'admin/<_c>'=>'<_c>',
					'admin/<_c>/<_a>'=>'<_c>/<_a>',
				),
			),
			
			'widgetFactory'=>array(
				'widgets'=>array(
					'CGridView'=>array(
						'htmlOptions'=>array('cellspacing'=>'0','cellpadding'=>'0'),
						'itemsCssClass'=>'item-class',
						'pagerCssClass'=>'pager-class'
					),
					'CJuiTabs'=>array(
						'htmlOptions'=>array('class'=>'shadowtabs'),
					),
					'CJuiAccordion'=>array(
						'htmlOptions'=>array('class'=>'shadowaccordion'),
					),
					'CJuiProgressBar'=>array(
					   'htmlOptions'=>array('class'=>'shadowprogressbar'),
					),
					'CJuiSlider'=>array(
						'htmlOptions'=>array('class'=>'shadowslider'),
					),
					'CJuiSliderInput'=>array(
						'htmlOptions'=>array('class'=>'shadowslider'),
					),
					'CJuiButton'=>array(
						'htmlOptions'=>array('class'=>'shadowbutton'),
					),
					'CJuiButton'=>array(
						'htmlOptions'=>array('class'=>'shadowbutton'),
					),
					'CJuiButton'=>array(
						'htmlOptions'=>array('class'=>'button green'),
					),
				),
			),
		),
    )
);

?>