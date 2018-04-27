<?php
/* @var $this WebUserController */
/* @var $model WebUser */
/* @var $form CActiveForm */
$baseUrl = Yii::app()->request->baseUrl;
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'web-user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

</div><!-- form -->
	<!-- Form baru -->

	<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-user"></i> Akun Administrator <small><!-- different form elements --></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

  <!--  -->

<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
	<?php echo $form->errorSummary($model); ?>

	<div class="col-md-6 col-md-offset-3">
<p class="note">Form dengan tanda <span class="required">*</span> wajib diisi.</p>
	<div class="form-group">
    	<label class="col-sm-3 controll-label no-padding-right" for="form-field-1">Username *</label>
    	<div class="col-sm-9">
    	  <?php echo $form->textField($model,'username',array('class'=>'form-control has-feedback-left','required'=>'required', 'placeholder'=>'contoh: john','size'=>30,'maxlength'=>30)); ?>
        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
   		</div>
   		 <?php echo $form->error($model,'username'); ?>
  	</div>
	<div class="clearfix"></div>
  <br>

	<div class="form-group">
   		<label class="col-sm-3 controll-label no-padding-right" for="form-field-1">Password *</label>
    	<div class="col-sm-9">
      	<?php echo $form->passwordField($model,'password',array('class'=>'form-control has-feedback-left','required'=>'required', 'placeholder'=>'contoh: masukkan_password_baru','size'=>50,'maxlength'=>50,'value'=>'')); ?>
    	<span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
      </div>
    	<?php echo $form->error($model,'password'); ?>
 	</div>
	<div class="clearfix"></div>
  <br>

  <div class="form-group">
 <label class="col-sm-3 controll-label no-padding-right" for="form-field-1">Kategori *</label>
    <div class="col-sm-9">
 
 <?php echo $form->dropDownList($model,'level',
 array(
  '1'=>'Koordinator Kabupaten/Kota',
  '-1'=>'Root',
 ),array('id'=>'kategori','class'=>'form-control has-feedback-left','required'=>'required')
 ); ?> 
 <span class="fa fa-tasks form-control-feedback left" aria-hidden="true"></span>
      </div>
      <?php echo $form->error($model,'level'); ?>
    </div>
  <div class="clearfix"></div>
  <br>

  
	<div class="col-md-6 col-md-offset-4">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan Akun' : 'Save', array('class'=>'btn btn-primary')); ?>
    <?php echo CHtml::Button('Batal',array('onClick'=>"location='$baseUrl/index.php/webUser/admin'", 'class'=>'btn btn-default')); ?>
  </div>

<?php $this->endWidget(); ?>

</div><!-- form -->