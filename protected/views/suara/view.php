<?php
/* @var $this SuaraController */
/* @var $model Suara */

$this->breadcrumbs=array(
	'Suaras'=>array('index'),
	$model->id_keldesa,
);

$this->menu=array(
	array('label'=>'List Suara', 'url'=>array('index')),
	array('label'=>'Create Suara', 'url'=>array('create')),
	array('label'=>'Update Suara', 'url'=>array('update', 'id'=>$model->id_keldesa)),
	array('label'=>'Delete Suara', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_keldesa),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Suara', 'url'=>array('admin')),
);
?>

<h1>View Suara #<?php echo $model->id_keldesa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_keldesa',
		'id_kec',
		'id_kabkota',
		'suara1',
		'suara2',
		'suara3',
		'suara4',
	),
)); ?>
