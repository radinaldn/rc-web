<?php
/* @var $this SuaraController */
/* @var $model Suara */

$this->breadcrumbs=array(
	'Suaras'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Suara', 'url'=>array('index')),
	array('label'=>'Manage Suara', 'url'=>array('admin')),
);
?>

<h1>Create Suara</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>