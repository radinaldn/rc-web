<?php
/* @var $this SaksiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Saksis',
);

$this->menu=array(
	array('label'=>'Create Saksi', 'url'=>array('create')),
	array('label'=>'Manage Saksi', 'url'=>array('admin')),
);
?>

<h1>Saksis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
