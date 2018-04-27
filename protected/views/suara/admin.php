<?php
/* @var $this SuaraController */
/* @var $model Suara */

$this->breadcrumbs=array(
	'Suaras'=>array('index'),
	'Manage',
);

$this->menu=array(
	// array('label'=>'List Suara', 'url'=>array('index')),
	// array('label'=>'Create Suara', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#suara-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="x_panel">

          			
                <div class="clearfix"></div>
          			<div class="x_content">

<div class="row">
		<div class="col-md-12">

			<!-- TABLE STRIPED -->
			<!-- <div class="panel"> -->
				<div class="">
					<div class="col-md-6">
					<h3><i class="fa fa-newspaper-o"></i> Hasil Rekapitulasi Suara <small> E-Pemilu </small></h3>
				</div>
					<div class="col-md-6 text-right">

									<!-- <i class="fa fa-plus m-right-xs"></i> -->
                                    <?php
                                     // echo CHtml::Button('Tambah Kelurahan/Desa',array('onClick'=>"location='create'", 'class'=>'btn btn-primary')); 
                                     ?>

                            </div>

					
					
				</div>
				<div class="panel-body">
					<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<br>
						<div class="x_title">
							<br>
					</div>
						<thead>
							<tr>
								<th>#</th>
								<th>Kelurahan/Desa</th>
								<!--<th>ID Saksi</th>-->
								<th>Suara Paslon #1</th>
								<th>Suara Paslon #2</th>
								<th>Suara Paslon #3</th>
								<th>Suara Paslon #4</th>
								<th>Waktu</th>
								<!--<th>Foto</th>-->
								<th></th>
							</tr>
							</thead>
							<tbody>

									<?php
										// print_r($model); // testing pemanggilan data
									?>

								<?php $no = 1; ?>
								<?php foreach ($model as $data) : ?>

									
									<tr>
										<td><?php echo $no;?></td>
										<td><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/saksi/<?php echo $data['id_keldesa']; ?>"><?= $data['id_keldesa']; ?></a></td>
										<!--<td><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/saksi/<?php echo $data['id_keldesa']; ?>"><?= $data['id_keldesa']; ?></a></td>-->
										<td><?= $data['suara1']; ?></td>
										<td><?= $data['suara2']; ?></td>
										<td><?= $data['suara3']; ?></td>
										<td><?= $data['suara4']; ?></td>
										<td><?php
										$date = date_create($data['waktu']); 
										echo date_format($date, 'j F Y, \p\u\k\u\l G:i');
										?></td>
										<!--<td><img class="img-responsive avatar-view" height="100" width="100" src="<?php echo Yii::app()->request->baseUrl; ?>/images/suara/<?php echo $data['foto']; ?>"></td>-->
										<td>
										<?php if (Yii::app()->session->get('level') == '-1' ) { ?>
										<!--<div class="hidden-sm hidden-xs action-buttons">-->
											<a title="Lihat detail suara" class="btn btn-success btn-xs" href="<?= $data['id_keldesa']; ?>" role="button"><i class="fa fa-search"></i></a>
											<!-- <a class="btn btn-warning btn-xs" href="update/<?= $data['id_keldesa']; ?>" role="button"><i class="fa fa-pencil"></i></a> -->
											<a class="btn btn-danger btn-xs" href="delete/<?= $data['id_keldesa']; ?>" role="button"  onclick="return confirm('Anda yakin ingin menghapus <?php echo $data['id_keldesa'];?> ?')"><i class="fa fa-trash"></i></a>
											<!--</div>-->
											
										<?php } ?>
											

										</td>
									</tr>
									<?php $no++; ?>
								<?php endforeach; ?>


							</tbody>
						</table>
					</div>
				<!-- </div> -->
				<!-- END TABLE STRIPED -->
				</div>
				</div>
				</div>

<?php 
// $this->widget('zii.widgets.grid.CGridView', array(
// 	'id'=>'suara-grid',
// 	'dataProvider'=>$model->search(),
// 	'filter'=>$model,
// 	'columns'=>array(
// 		'id_keldesa',
// 		'suara1',
// 		'suara2',
// 		'suara3',
// 		/*
// 		'suara4',
// 		*/
// 		array(
// 			'class'=>'CButtonColumn',
// 		),
// 	),
// ));
 ?>
