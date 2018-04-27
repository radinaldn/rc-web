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
					<h3><i class="fa fa-newspaper-o"></i> Laporan Belum Masuk <small> E-Pemilu </small></h3>
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

					<div class="row tile_count">

					<!-- <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
					<a title="Klik untuk melihat kelurahan/desa yang belum melaporkan rekapitulasi suara">
					<span class="count_top"><i class="fa fa-database"></i> Sisa Kab/Kota</span>
					<div class="count gray">
					<?php  ?>
					xxx
					</div>
					</a>
					</div>

					<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
					<a title="Klik untuk melihat kelurahan/desa yang belum melaporkan rekapitulasi suara">
					<span class="count_top"><i class="fa fa-database"></i> Sisa Kecamatan</span>
					<div class="count gray">
					<?php  ?>
					xxx
					</div>
					</a>
					</div> -->

					<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
					<a title="Klik untuk melihat kelurahan/desa yang belum melaporkan rekapitulasi suara">
					<span class="count_top"><i class="fa fa-database"></i> Sisa Keldesa </span>
					<div class="count gray">
					<?php echo $totalKeldesa-$totalSuara; ?>
					</div>
					</a>
					</div>

					</div>
						<thead>
							<tr>
								<th>#</th>
								<th>ID Saksi</th>
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

								<?php 
								$no = 1	; 
								
									$x = $modelKeldesa;
									$y = $modelSuara;;
									foreach($x as $data1)
									{
										$platuk=true;
										foreach($y as $data2){
										// echo '<option value="'.$data1->id_lokasi.'">'.$data1->id_lokasi.' - '.$data1->nama_lokasi.'</option>';
											if($data1['id_keldesa']==$data2->id_keldesa){
												$platuk=false;
											}
										}
										if($platuk==true){
											?>
											<tr>
											<td><?= $no++; ?></td>
											<td><?= $data1['id_keldesa'] ?></td>
											<td><?= $data1['nama_keldesa'] ?></td>
											<td><?= $data1['nama_kec'] ?></td>
											<td><?= $data1['nama_kabkota'] ?></td>
											<td>
										<!--<div class="hidden-sm hidden-xs action-buttons">-->
											<a title="Lihat kontak saksi" class="btn btn-success btn-xs" href="<?= Yii::app()->request->baseUrl; ?>/index.php/saksi/<?= $data1['id_keldesa']; ?>" role="button"><i class="fa fa-search"></i> Lihat saksi</a>
											<!--</div>-->
											
											
											

										</td>
											</tr>
											<?php
										}
									}

									?>

									
									
								


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
