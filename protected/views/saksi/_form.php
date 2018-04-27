<?php
/* @var $this SaksiController */
/* @var $model Saksi */
/* @var $form CActiveForm */
$baseUrl = Yii::app()->request->baseUrl;
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'saksi-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

		<!-- Form baru -->

	<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-users"></i> Form Saksi <small><!-- different form elements --></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />


	<!--  -->


	<?php echo $form->errorSummary($model); ?>
`
	<div class="col-md-6 col-md-offset-3">
<p class="note">Form dengan tanda <span class="required">*</span> wajib diisi.</p>

  <div class="form-group">
		<label class="col-sm-3 controll-label no-padding-right" for="form-field-1">Nama *</label>
    <div class="col-sm-9">
		<?php echo $form->textField($model,'nama',array('class'=>'form-control has-feedback-left', 'placeholder'=>'contoh: Budi Eka','size'=>60,'maxlength'=>100,'required'=>'required')); ?>
    <span class="fa fa-text-width form-control-feedback left" aria-hidden="true"></span>
    </div>
		<?php echo $form->error($model,'nama'); ?>
	</div>
  <div class="clearfix"></div>
  <br>	

   <div class="form-group">
		<label class="col-sm-3 controll-label no-padding-right" for="form-field-1">No Handphone *</label>
    <div class="col-sm-9">
		<?php echo $form->numberField($model,'no_hp',array('class'=>'form-control has-feedback-left', 'placeholder'=>'contoh: 08123456789','size'=>12,'maxlength'=>12,'required'=>'required')); ?>
    <span class="fa fa-text-width form-control-feedback left" aria-hidden="true"></span>
    </div>
		<?php echo $form->error($model,'no_hp'); ?>
	</div>
  <div class="clearfix"></div>
  <br>	

 <div class="form-group">
 <label class="col-sm-3 controll-label no-padding-right" for="form-field-1">Kabupaten/Kota *</label>
 <div class="col-sm-9">
 <?php
 echo $form->DropDownList($model,'id_kabkota',
 CHtml::listData(Kabkota::model()->findAll(),'id_kabkota','nama'),
 array(
  'required'=>'required',
  'class'=>'form-control has-feedback-left',
   'prompt'=>'-- Pilih Kabupaten/Kota --',
   'ajax' => array(
     'type'=>'POST',
     'url'=>CController::createUrl('saksi/selectkec'), //selectjur adalah actionSelectkec di SaksiController.
     'update'=>'#'.CHtml::activeId($model,'id_kec'), //jurusan_id = field jurusan_id
     'beforeSend'=>'function() { //Penting!! agar setiap ganti pilihan kabkota, maka kec dan keldesa akan ikut terupdate, jadi kosong.
       $("#Saksi_jurusan_id").find("option").remove();
       $("#Saksi_prodi_id").find("option").remove();
     }', //Bila tidak menggunakan ini, maka yg terupdate hanya jurusan (bawaan 'update').
   )
 )
 );
 ?>
 <span class="fa fa-text-width form-control-feedback left" aria-hidden="true"></span>
 <?php echo $form->error($model,'id_kabkota'); ?>
</div>
<div class="clearfix"></div>
<br>

 <div class="form-group">
 <label class="col-sm-3 controll-label no-padding-right" for="form-field-1">Kecamatan *</label>
 <div class="col-sm-9">
 <?php echo $form->dropDownList($model,'id_kec',
 (!$model->isNewRecord) ? $model->kecList() :array(), //kalau action update, maka akan muncul data dari database, yang dicari oleh fungsi jurusanList di model Profil
 array(
  'required'=>'required',
  'class'=>'form-control has-feedback-left',
   'prompt'=>'-- Pilihan --',
   'ajax' => array(
     'type'=>'POST',
     'url'=>CController::createUrl('saksi/selectkeldesa'), //selectprodi = actionSelectprodi di ProfilController
     'update'=>'#'.CHtml::activeId($model,'id_keldesa'), //prodi_id = field prodi_id
     'beforeSend'=>'function() {
       $("#Saksi_prodi_id").find("option").remove();
       }',
     )
   )
 ); ?>
 <span class="fa fa-text-width form-control-feedback left" aria-hidden="true"></span>
 <?php echo $form->error($model,'id_kec'); ?>
</div>
<div class="clearfix"></div>
<br>

<div class="form-group">
 <label class="col-sm-3 controll-label no-padding-right" for="form-field-1">Kelurahan/Desa *</label>
 <div class="col-sm-9">
 <?php echo $form->dropDownList($model,'id_keldesa',
 (!$model->isNewRecord) ? $model->keldesaList() :array(),
 array(
  'required'=>'required',
  'class'=>'form-control has-feedback-left',
   'prompt'=>'-- Pilihan --',
 )
 ); ?> 
 <span class="fa fa-text-width form-control-feedback left" aria-hidden="true"></span>
 <?php echo $form->error($model,'id__keldesa'); ?>
</div>
<div class="clearfix"></div>
<br>

 

	<div class="col-md-6 col-md-offset-4">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan Data' : 'Save', array('class'=>'btn btn-primary')); ?>
    <?php echo CHtml::Button('Batal',array('onClick'=>"location='$baseUrl/index.php/saksi/admin'", 'class'=>'btn btn-default')); ?>
  </div>

<?php $this->endWidget(); ?>

</div><!-- form -->