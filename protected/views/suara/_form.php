<?php
/* @var $this SuaraController */
/* @var $model Suara */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'suara-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_keldesa'); ?>
		<?php echo $form->textField($model,'id_keldesa'); ?>
		<?php echo $form->error($model,'id_keldesa'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'suara1'); ?>
		<?php echo $form->textField($model,'suara1',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'suara1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'suara2'); ?>
		<?php echo $form->textField($model,'suara2',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'suara2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'suara3'); ?>
		<?php echo $form->textField($model,'suara3',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'suara3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'suara4'); ?>
		<?php echo $form->textField($model,'suara4',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'suara4'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->