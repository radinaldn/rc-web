<?php
/* @var $this SaksiController */
/* @var $model Saksi */

$this->breadcrumbs=array(
	'Saksis'=>array('index'),
	$model->id_keldesa=>array('view','id'=>$model->id_keldesa),
	'Update',
);

$this->menu=array(
	// array('label'=>'List Saksi', 'url'=>array('index')),
	// array('label'=>'Create Saksi', 'url'=>array('create')),
	// array('label'=>'View Saksi', 'url'=>array('view', 'id'=>$model->id_keldesa)),
	// array('label'=>'Manage Saksi', 'url'=>array('admin')),
);
?>

<!-- <h1>Update Saksi <?php echo $model->id_keldesa; ?></h1> -->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>