<?php
/* @var $this GirlController */
/* @var $model Girl */

$this->breadcrumbs=array(
	'Girls'=>array('index'),
	$model->a001_cd_girl,
);

$this->menu=array(
	array('label'=>'List Girl', 'url'=>array('index')),
	array('label'=>'Create Girl', 'url'=>array('create')),
	array('label'=>'Update Girl', 'url'=>array('update', 'id'=>$model->a001_cd_girl)),
	array('label'=>'Delete Girl', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->a001_cd_girl),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Girl', 'url'=>array('admin')),
);
?>

<h1>View Girl #<?php echo $model->a001_cd_girl; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'a001_cd_girl',
	),
)); ?>
