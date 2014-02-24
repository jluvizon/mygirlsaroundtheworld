<?php
/* @var $this GirlController */
/* @var $data Girl */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('a001_cd_girl')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cd_girl), array('view', 'id'=>$data->cd_girl)); ?>
	<br />


</div>