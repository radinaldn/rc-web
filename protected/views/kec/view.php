<?php
/* @var $this KecController */
/* @var $model Kec */

$this->breadcrumbs=array(
	'Kecs'=>array('index'),
	$model->id_kec,
);

$this->menu=array(
	array('label'=>'List Kec', 'url'=>array('index')),
	array('label'=>'Create Kec', 'url'=>array('create')),
	array('label'=>'Update Kec', 'url'=>array('update', 'id'=>$model->id_kec)),
	array('label'=>'Delete Kec', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_kec),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kec', 'url'=>array('admin')),
);
?>

<h1>View Kec #<?php echo $model->id_kec; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_kec',
		'nama',
		'id_kabkota',
	),
)); ?>
