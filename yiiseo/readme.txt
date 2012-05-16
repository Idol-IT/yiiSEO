##YiiSEO Module

Installation
1. unpack to 'yiiseo' folder to 'protected/modules/'
2. in config/main.php add folowing
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

3. Run next one of two folowing lines of code into your main layout (somewhere in head section)
        
In case the site has one language:
	Yii::app()->seo->run();

In case when site is multilingual
        Yii::app()->seo->run(Yii::app()->language);

4. import yiiseo/data/yiiseo.sql into your mySQL database
5. Run module by typing in the link http://yoursite.com/yiiseo/
The password for module is '1'.You can change it in following file :
    application.modules.yiiseo.components.UserIdentity