<?php
/* @var $this SuaraController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suaras',
);

$this->menu=array(
	array('label'=>'Create Suara', 'url'=>array('create')),
	array('label'=>'Manage Suara', 'url'=>array('admin')),
);
?>

<h1>Suaras</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
