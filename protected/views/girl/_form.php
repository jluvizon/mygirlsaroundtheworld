<?php
/* @var $this GirlController */
/* @var $model Girl */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'girl-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <?php echo $form->hiddenField($model,'cd_girl',array('type'=>"hidden",'size'=>11,'maxlength'=>11)); ?>

	<div class="row">
		Nome
		<?php echo $form->textField($model->girlLocation,'name',array('size'=>20,'maxlength'=>20)); ?>
                
	</div>
        
        <div class="row">
		Latitude
		<?php echo $form->textField($model->girlLocation,'latitude',array('size'=>20,'maxlength'=>20)); ?>
                
	</div>
        
        <div class="row">
		Longitude
		<?php echo $form->textField($model->girlLocation,'longitude',array('size'=>20,'maxlength'=>20)); ?>
                
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->