<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>yiiSEO</title>
  <link rel="shortcut icon" href="favicon.gif">
    <?php
        $cs=Yii::app()->clientScript;
        $baseUrl=$this->module->assetsUrl;
        $cs->registerCssFile($baseUrl.'/css/master.css');
        $cs->registerCssFile($baseUrl.'/css/tables.css');
        $cs->registerCssFile($baseUrl.'/js/jquery-1.7.1.min.js');
        $cs->registerCssFile($baseUrl.'/js/jquery-ui-1.8.17.min.js');
    ?>

  <!---Fonts-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
<body>
  <!--- HEADER -->
  <div class="header">
   <a href="<?php echo Yii::app()->createUrl("seo/")?>"><img src="<?php echo $this->module->assetsUrl?>/img/logo.png" alt="Logo" /></a>
  </div>

  <!--- CONTENT AREA -->
  <div class="content container_12">
      <?php if (Yii::app()->user->hasFlash('error')){ ?>
          <div class="ad-notif-error grid_12 small-mg"><p><?php echo Yii::app()->user->getFlash('error'); ?></p></div>
      <?php } ?>
      <?php if (Yii::app()->user->hasFlash('success')){ ?>
          <div class="ad-notif-success grid_12 small-mg"><p><?php echo Yii::app()->user->getFlash('success'); ?></p></div>
      <?php } ?>

      <?php echo $content;?>
  </div>

  <div class="footer container_12">
    <p class="grid_12">Idol IT</p>
  </div>
</body>
</html>