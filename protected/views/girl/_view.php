<?php
/* @var $this GirlController */
/* @var $data Girl */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('a001_cd_girl')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->a001_cd_girl), array('view', 'id'=>$data->a001_cd_girl)); ?>
	<br />


</div>