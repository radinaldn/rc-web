<?php
/* @var $this KeldesaController */
/* @var $model Keldesa */

$this->breadcrumbs=array(
	'Keldesas'=>array('index'),
	$model->id_keldesa,
);

$this->menu=array(
	array('label'=>'List Keldesa', 'url'=>array('index')),
	array('label'=>'Create Keldesa', 'url'=>array('create')),
	array('label'=>'Update Keldesa', 'url'=>array('update', 'id'=>$model->id_keldesa)),
	array('label'=>'Delete Keldesa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_keldesa),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Keldesa', 'url'=>array('admin')),
);
?>

<h1>View Keldesa #<?php echo $model->id_keldesa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_keldesa',
		'nama',
		'id_kec',
	),
)); ?>
