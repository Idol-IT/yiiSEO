yiiSEO v2.0
====================

Description
---------------------

YiiSEO has been completely refactored. It is lot more flexible and now you can make almost any SEO changes without
changing your code.

__Features :__

- single language and multi-language site support
- can be used to add author meta, FB meta and many more
- uses inverse hierarchy to find meta data


__Requirments :__
	
	`'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName'=>false,
	),`

Installation
---------------------

1. Unpack 'yiiseo' folder to '/protected/modules/'
2. Add folowing code to configuration files (protected/config/main.php)

        'modules'=>array(
        	....
        	'yiiseo',
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

4.Import yiiseo/data/yiiseo.sql into your mySQL database

5.Run module by typing in the link : http://yoursite.com/yiiseo/

The password for module is '1'.You can change it in following file :
    application.modules.yiiseo.components.UserIdentity


    
