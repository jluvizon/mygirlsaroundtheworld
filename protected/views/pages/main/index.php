<?php
/* @var $this SiteController */
?>

<?php if (Yii::app()->user->isGuest) { ?>
<h1><?php echo CHtml::link(Yii::t('main', 'Cadastrar-se'), array('user/create')); ?></h1>
<?php } else { ?>
<h1>MY GIRLS AROUND THE WORLD!</h1>
<?php } ?>
