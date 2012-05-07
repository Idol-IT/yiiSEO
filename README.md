yiiSEO
========

Installation
=========

1. extract files to 'modules' folder
2. add folowing code to configuration files (protected/config/main.php)

        'modules'=>array(
			....
			'seo',
		),
		
		'components'=>array(
			....
			'seo'=>array(
				'class' => 'SeoExt',
			),
		),
		'import'=>array(
			....
			'application.modules.seo.models.*',
		),
		
3. Run following code in your main layout


Example
====================

    Yii::app()->seo->run();