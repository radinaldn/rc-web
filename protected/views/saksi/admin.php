<?php
/* @var $this SaksiController */
/* @var $model Saksi */

$this->breadcrumbs=array(
	'Saksis'=>array('index'),
	'Manage',
);

$this->menu=array(
	// array('label'=>'List Saksi', 'url'=>array('index')),
	// array('label'=>'Create Saksi', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#saksi-grid').yiiGridView('update', {
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
					<h3><i class="fa fa-newspaper-o"></i> Saksi <small> E-Pemilu </small></h3>
				</div>
				<?php if (Yii::app()->session->get('level') == '-1' ) { ?>
					<div class="col-md-6 text-right">

									<i class="fa fa-plus m-right-xs"></i>
                                    <?php
                                     echo CHtml::Button('Tambah Saksi',array('onClick'=>"location='create'", 'class'=>'btn btn-primary')); 
                                     ?>

                            </div>
                            <?php } ?>

					
					
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
								<th>ID Saksi</th>
								<th>Nama</th>
								<th>No HP</th>
								<th>Kelurahan/Desa</th>
								<th>Kecamatan</th>
								<th>Kabupaten/Kota</th>
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
										<td><?= $data['id_keldesa']; ?></td>
										<td><?= $data['nama_saksi']; ?></td>
										<td><?= $data['no_hp']; ?></td>
										<td><?= $data['nama_keldesa']; ?></td>
										<td><?= $data['nama_kec']; ?></td>
										<td><?= $data['nama_kabkota']; ?></td>
										<td>
										<?php if (Yii::app()->session->get('level') == '-1' ) { ?>
										<!--<div class="hidden-sm hidden-xs action-buttons">-->
											<!-- <a title="Lihat detail suara" class="btn btn-success btn-xs" href="<?= $data['id_keldesa']; ?>" role="button"><i class="fa fa-search"></i></a> -->
											<a class="btn btn-warning btn-xs" href="update/<?= $data['id_keldesa']; ?>" role="button"><i class="fa fa-pencil"></i></a>
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
// 	'id'=>'saksi-grid',
// 	'dataProvider'=>$model->search(),
// 	'filter'=>$model,
// 	'columns'=>array(
// 		'id_keldesa',
// 		'no_hp',
// 		'nama',
// 		array(
// 			'class'=>'CButtonColumn',
// 		),
// 	),
// )); 
?>
