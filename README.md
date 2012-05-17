yiiSEO v2.2
====================

Description
---------------------

YiiSEO has been completely refactored. It is lot more flexible and now you can make almost any SEO changes without
changing your code. Last updated 17.05.2012

__Features :__

- single language and multi-language site support
- can be used to add author meta, FB meta and many more
- uses inverse hierarchy to find meta data


__Requirments :__ update your URLManager in /protected/config/main.php this way
	
	'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName'=>false,
	),

Installation
---------------------

1. Unpack 'yiiseo' folder to '/protected/modules/'
2. Add folowing code to configuration files (protected/config/main.php)

        'yiiseo'=>array(
        	'class'=>'application.modules.yiiseo.YiiseoModule',
        	'password'=>'111', // your default password is 111
    	),
        
        'components'=>array(
        	....
        	'seo'=>array(
        	'class' => 'application.modules.yiiseo.components.SeoExt',
        	),
        ),
        
        'import'=>array(
        	....
        	'application.modules.yiiseo.models.*',
        ),
	
3.Run following line of code that suits you into your main layouts head :

- In case the site has one language:
	`Yii::app()->seo->run();`

- In case when site is multilingual:
	`Yii::app()->seo->run(Yii::app()->language);`

4.Run module by typing in the link : http://yoursite.com/yiiseo/

Contacts
---------------------
Idol-IT develop team : http://idol-it.com

Yii framework extension : http://www.yiiframework.com/extension/yii-seo
    
