<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'action'=>Yii::app()->createUrl($this->route),
        'method'=>'get',
    ));
    ?>

    <div class="row">
        <?php echo $form->label($model, 'a003_id'); ?>
        <?php echo $form->textField($model, 'a003_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'a003_username'); ?>
        <?php echo $form->textField($model, 'a003_username',array('size'=>60,'maxlength'=>128)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'a003_email'); ?>
        <?php echo $form->textField($model, 'a003_email',array('size'=>60,'maxlength'=>128)); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->