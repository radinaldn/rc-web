<?php
/* @var $this SuaraController */
/* @var $model Suara */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_keldesa'); ?>
		<?php echo $form->textField($model,'id_keldesa'); ?>
	</div>


	<div class="row">
		<?php echo $form->label($model,'suara1'); ?>
		<?php echo $form->textField($model,'suara1',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'suara2'); ?>
		<?php echo $form->textField($model,'suara2',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'suara3'); ?>
		<?php echo $form->textField($model,'suara3',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'suara4'); ?>
		<?php echo $form->textField($model,'suara4',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->