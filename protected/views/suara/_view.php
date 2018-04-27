<?php
/* @var $this SuaraController */
/* @var $data Suara */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_keldesa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_keldesa), array('view', 'id'=>$data->id_keldesa)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kec')); ?>:</b>
	<?php echo CHtml::encode($data->id_kec); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kabkota')); ?>:</b>
	<?php echo CHtml::encode($data->id_kabkota); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('suara1')); ?>:</b>
	<?php echo CHtml::encode($data->suara1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('suara2')); ?>:</b>
	<?php echo CHtml::encode($data->suara2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('suara3')); ?>:</b>
	<?php echo CHtml::encode($data->suara3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('suara4')); ?>:</b>
	<?php echo CHtml::encode($data->suara4); ?>
	<br />


</div>