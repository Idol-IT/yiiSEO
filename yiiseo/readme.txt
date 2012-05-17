Инструкция по установке
1. Распоковать в папку modules
2. в config файле добавить следующие настройки
'modules'=>array(
    ....
    'yiiseo'=>array(
        'class'=>'application.modules.yiiseo.YiiseoModule',
        'password'=>'111',
    ),
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

3. В главном шаблоне вызвать
        Yii::app()->seo->run();
    если сайт на нескольких языках, то тогда
        Yii::app()->seo->run(Yii::app()->language);

4. Сделать импорт файла yiiseo/data/yiiseo.sql в Базу данных
5. Пароль для захода "1", его можно сменить в файле
    application.modules.yiiseo.components.UserIdentity