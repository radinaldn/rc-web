<?php
/* @var $this WebUserController */
/* @var $model WebUser */

$this->breadcrumbs=array(
	'Web Users'=>array('index'),
	$model->id_web_user,
);

$this->menu=array(
	// array('label'=>'List WebUser', 'url'=>array('index')),
	// array('label'=>'Create WebUser', 'url'=>array('create')),
	// array('label'=>'Update WebUser', 'url'=>array('update', 'id'=>$model->id_web_user)),
	// array('label'=>'Delete WebUser', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_web_user),'confirm'=>'Are you sure you want to delete this item?')),
	// array('label'=>'Manage WebUser', 'url'=>array('admin')),
);
?>


<div class="x_panel">

<?php if(Yii::app()->user->hasFlash('update')):?>
<div class="info">
    
    <div class="alert alert-warning">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Berhasil!</strong> <?php echo Yii::app()->user->getFlash('warning'); ?>
  </div>    
</div>
<?php endif; ?>

<h2><i class="fa fa-user"></i> Lihat Administrator #<?php echo $model->id_web_user; ?></h2>
<div class="x_title">
                    </div>

<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
            	<a class="btn btn-primary" onclick="location='admin'"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
</div>
          			
                <div class="clearfix"></div>
          			<div class="x_content">


<?php
 $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_web_user',
		'username',
		// 'password',
		// 'level',
	),
));
 ?>

