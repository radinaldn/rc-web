<?php
/* @var $this WebUserController */
/* @var $model WebUser */

$this->breadcrumbs=array(
	'Web Users'=>array('index'),
	$model->id_web_user=>array('view','id'=>$model->id_web_user),
	'Update',
);

$this->menu=array(
	// array('label'=>'List WebUser', 'url'=>array('index')),
	// array('label'=>'Create WebUser', 'url'=>array('create')),
	// array('label'=>'View WebUser', 'url'=>array('view', 'id'=>$model->id_web_user)),
	// array('label'=>'Manage WebUser', 'url'=>array('admin')),
);
?>

<!-- <h1>Update WebUser <?php echo $model->id_web_user; ?></h1>
 -->
<?php $this->renderPartial('_form', array('model'=>$model)); ?>