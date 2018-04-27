<?php
/* @var $this WebUserController */
/* @var $data WebUser */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_web_user')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_web_user), array('view', 'id'=>$data->id_web_user)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level')); ?>:</b>
	<?php echo CHtml::encode($data->level); ?>
	<br />


</div>