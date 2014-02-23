<?php
/* @var $this GirlController */
/* @var $model Girl */

$this->breadcrumbs=array(
	'Girls'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Girl', 'url'=>array('index')),
	array('label'=>'Manage Girl', 'url'=>array('admin')),
);
?>

<h1>Create Girl</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>