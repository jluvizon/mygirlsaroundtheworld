<?php
/* @var $this GirlController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Girls',
);

$this->menu=array(
	array('label'=>'Create Girl', 'url'=>array('create')),
	array('label'=>'Manage Girl', 'url'=>array('admin')),
);
?>

<h1>Girls</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
