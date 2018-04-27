<?php
/* @var $this SaksiController */
/* @var $model Saksi */

$this->breadcrumbs=array(
	'Saksis'=>array('index'),
	'Create',
);

$this->menu=array(
	// array('label'=>'List Saksi', 'url'=>array('index')),
	// array('label'=>'Manage Saksi', 'url'=>array('admin')),
);
?>

<!-- <h1>Create Saksi</h1> -->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>