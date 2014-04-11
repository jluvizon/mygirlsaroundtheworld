<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="My Girls Around The World">
<meta name="author" content="Jariel">
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
<!--<link rel="stylesheet" href="<?php //echo Yii::app()->request->baseUrl; ?>/css/main.css">-->
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<style>body{padding-top:50px;}</style>
</head>

<?php Yii::app()->setLanguage('en_us'); ?>

<body>
<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=652264771511339";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <?php echo CHtml::link(Yii::t('main', 'My Girls Around The World'), array('menu/goIndex'), array('class' => 'navbar-brand')); ?>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php if (!Yii::app()->user->isGuest) { ?>
                <li><?php echo CHtml::link(Yii::t('main', 'My Girls on Map'), array('menu/goGirlsOnMap')); ?></li>
                <li><?php echo CHtml::link(Yii::t('main', 'My Girls'), array('menu/goListGirls')); ?></li>
                <li><?php echo CHtml::link(Yii::t('main', 'Add New Girl'), array('girl/newGirl')); ?></li>
                <?php } ?>
                <li><a href="#"><?php echo Yii::t('main', 'About') ?></a></li>
                <?php if (Yii::app()->user->isGuest) { ?>
                <li><?php echo CHtml::link(Yii::t('main', 'Login'), array('site/login')); ?></li>
                <?php } else { ?>
                <li><?php echo CHtml::link(Yii::t('main', 'Logout'), array('site/logout')); ?></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <div class="starter-template">
        <?php echo $content; ?>
    </div>        
</div>

<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    
</body>
</html>