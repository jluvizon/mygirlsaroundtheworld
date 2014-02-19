<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="My Girls Around The World">
        <meta name="author" content="Jariel">
        
        <!-- JQuery -->
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <!-- JQuery -->
       
        <!-- Bootstrap -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="http://getbootstrap.com/examples/starter-template/starter-template.css">
        <!-- Bootstrap -->
        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
    
    <?php echo Yii::app()->setLanguage('pt_br'); ?> 

<body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">My Girls Around The World</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#about"><?php echo Yii::t('main','Add New Girl') ?></a></li>
                    <li><?php echo CHtml::link(Yii::t('main','My Girls'),array('markers/goToGirlsMap')); ?></li>
                    <li class="active"><a href="#"><?php echo Yii::t('main','About') ?></a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    <div class="container">

        <div class="starter-template">
            <?php echo $content; ?>
        </div>
       
    </div><!-- /.container -->
    

</body>
</html>
