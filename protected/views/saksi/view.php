<?php
/* @var $this SaksiController */
/* @var $model Saksi */

$this->breadcrumbs=array(
	'Saksis'=>array('index'),
	$model->id_keldesa,
);

$this->menu=array(
	array('label'=>'List Saksi', 'url'=>array('index')),
	array('label'=>'Create Saksi', 'url'=>array('create')),
	array('label'=>'Update Saksi', 'url'=>array('update', 'id'=>$model->id_keldesa)),
	array('label'=>'Delete Saksi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_keldesa),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Saksi', 'url'=>array('admin')),
);
?>

<h1>View Saksi #<?php echo $model->id_keldesa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_keldesa',
		'no_hp',
		'nama',
	),
)); ?>
