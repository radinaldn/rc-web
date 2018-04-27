<?php
/* @var $this SaksiController */
/* @var $data Saksi */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_keldesa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_keldesa), array('view', 'id'=>$data->id_keldesa)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_hp')); ?>:</b>
	<?php echo CHtml::encode($data->no_hp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />


</div>