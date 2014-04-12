<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id'=>'user-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'a003_username'); ?>
        <?php echo $form->textField($model, 'a003_username', array('size'=>60,'maxlength'=>128)); ?>
        <?php echo $form->error($model, 'a003_username'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'a003_password'); ?>
        <?php echo $form->passwordField($model, 'a003_password',array('size'=>60,'maxlength'=>128)); ?>
        <?php echo $form->error($model, 'a003_password'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'a003_email'); ?>
        <?php echo $form->textField($model, 'a003_email',array('size'=>60,'maxlength'=>128)); ?>
        <?php echo $form->error($model, 'a003_email'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Cadastrar-se' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->