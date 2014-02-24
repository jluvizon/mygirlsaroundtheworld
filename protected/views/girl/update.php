<?php
/* @var $this GirlController */
/* @var $model Girl */

$this->breadcrumbs=array(
	'Girls'=>array('index'),
	$model->cd_girl=>array('view','id'=>$model->cd_girl),
	'Update',
);

$this->menu=array(
	array('label'=>'List Girl', 'url'=>array('index')),
	array('label'=>'Create Girl', 'url'=>array('create')),
	array('label'=>'View Girl', 'url'=>array('view', 'id'=>$model->cd_girl)),
	array('label'=>'Manage Girl', 'url'=>array('admin')),
);
?>

<h1>Update Girl <?php echo $model->cd_girl; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>