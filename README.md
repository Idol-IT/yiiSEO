yiiSEO
========

Installation
=========

1. Extract files to 'modules' folder
2. Add folowing code to configuration files (protected/config/main.php)

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

Usage
=========

http://yoursite.com/seo

type - title/description/keywords
url - relative url (example1 : 'products/index', not '/products/index'), (example2 : 'products/view/*' - where '*'
is the place where goes the param)
content - text that goes in meta
language - set language for which this meta data is true in your website
is_active - true/false (false - means it doesn't display on website)


    
