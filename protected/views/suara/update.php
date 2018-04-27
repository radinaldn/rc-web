<?php
/* @var $this SuaraController */
/* @var $model Suara */

$this->breadcrumbs=array(
	'Suaras'=>array('index'),
	$model->id_keldesa=>array('view','id'=>$model->id_keldesa),
	'Update',
);

$this->menu=array(
	array('label'=>'List Suara', 'url'=>array('index')),
	array('label'=>'Create Suara', 'url'=>array('create')),
	array('label'=>'View Suara', 'url'=>array('view', 'id'=>$model->id_keldesa)),
	array('label'=>'Manage Suara', 'url'=>array('admin')),
);
?>

<h1>Update Suara <?php echo $model->id_keldesa; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>