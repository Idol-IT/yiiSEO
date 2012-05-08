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
				'class' => 'application.modules.seo.components.SeoExt',
			),
		),
		'import'=>array(
			....
			'application.modules.seo.models.*',
		),
3. Import SQL dump into your mySQL DB		

4. Run following code in your main layout
	
	Yii::app()->seo->run();


    
