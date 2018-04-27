<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
            $('#myDropDown').change(function(){
                //Selected value
                var inputValue = $(this).val();
                alert("value in js "+inputValue);
                //window.open("<?= Yii::app()->request->baseUrl ?>/index.php/suara/grafikkabkota/"+inputValue, "_self");

                //Ajax for calling php function
                $.post('submit.php', { dropdownValue: inputValue }, function(data){
                    alert('ajax completed. Response:  '+data);
                    //do after submission operation in DOM
                });
            });
        });
        </script>
</head>
<body>

<div class="x_panel">

<!--  <div class="col-md-4">
          <select id="myDropDown" class="form-control">
            <option selected="selected" value ="1401010">--- Silahkan Pilih Kabupaten/Kota ---</option>
            <?php
            $Kec = Kabkota::model()->findAll();
            $temp = 1401;
            foreach ($Kec as $data) {
              ?>
              <option value="<?= $data['id_kabkota']; ?>">
              <?php
              echo "$data[nama]";
              
            ?>
            </option>
            <?php } ?>
          </select>
          </div> 



          <?php $model=new Saksi;
          $form=$this->beginWidget('CActiveForm', array(
  'id'=>'saksi-form',
  // Please note: When you enable ajax validation, make sure the corresponding
  // controller action is handling ajax validation correctly.
  // There is a call to performAjaxValidation() commented in generated controller code.
  // See class documentation of CActiveForm for details on this.
  'enableAjaxValidation'=>false,
)); ?>

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
   'ajax'=>array(
    'type'=>'POST',
    'url'=>CController::createUrl('saksi/openkeldesa'),
    'update'=>'#'.CHtml::activeId($model, 'id_keldesa'),
   'beforeSend'=>'function() {
       $("#Saksi_prodi_id").find("option").remove();
       }',
     )
 )
 ); ?> 
 <span class="fa fa-text-width form-control-feedback left" aria-hidden="true"></span>
 <?php echo $form->error($model,'id__keldesa'); ?>
</div>
<div class="clearfix"></div>
<br>

<?php $this->endWidget(); ?> -->


                
                <div class="clearfix"></div>
                <div class="x_content">
                <h3><i class="fa fa-tasks"></i> KEL/DESA <?php print_r($modelKeldesa->nama) ?> <small> <?= CHtml::encode(Yii::app()->name); ?> </small></h3>
    <div class="x_title"></div>
                     <!-- top tiles -->
          <div class="row tile_count">
            
            <div class="col-sm-4">
              <a href="<?= Yii::app()->request->baseUrl ?>/index.php/suara/grafikkec/1401010"><button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</button></a>
            </div>

            <div class="clearfix"></div>
            <br>
            

<!-- <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a>
              <span class="count_top"><i class="fa fa-database"></i> Data Masuk</span>
              <div style="font-size: 30px; font-weight: bold;" class=" gray"><?php foreach ($modelgetCountHasil as $data) : {
                $presentaseHasil = ($data['total']/1879);
                $formattedNum = number_format($presentaseHasil, 5);
                echo $formattedNum."%";
              }

               ?>
                 <?php endforeach ?>
               </div>
             </a>
            </div>

            <div class="clearfix"></div> -->
            
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a>
              <span class="count_top"> Suara nomor #1</span>
              <div style="color: #1a1a1a"><i class=""></i> <?php foreach ($modelgetCountHasilPaslon1 as $data) : {
                echo $data['total'];
              }

               ?>
                 <?php endforeach ?>
               </div>
             </a>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a>
              <span class="count_top"> Suara nomor #2</span>
              <div class="" style="color: #006614"><i class=""></i> <?php foreach ($modelgetCountHasilPaslon2 as $data) : {
                echo $data['total'];
              }

               ?>
                 <?php endforeach ?>
               </div>
             </a>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a>
              <span class="count_top"> Suara nomor #3</span>
              <div class="" style="color: #238acf"><i class=""></i> <?php foreach ($modelgetCountHasilPaslon3 as $data) : {
                echo $data['total'];
                
              }

               ?>
                 <?php endforeach ?>
               </div>
             </a>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a>
              <span class="count_top"> Suara nomor #4</span>
              <div class="" style="color: #c2b500"><i class=""></i> <?php foreach ($modelgetCountHasilPaslon4 as $data) : {
                echo $data['total'];
                
              }

               ?>
                 <?php endforeach ?>
               </div>
             </a>
            </div>

            <div class="row tile_count">

            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a>
              <span class="count_top"><i class="fa fa-user"></i> % Nomor #1</span>
              <div class="count" style="color: #1a1a1a"><?php foreach ($modelgetCountHasilPaslon1Persen as $data) : {
                $presentaseHasil = $data['total'];
                $formattedNum = number_format($presentaseHasil, 2);
                echo $formattedNum."%";
              }

               ?>
                 <?php endforeach ?>
               </div>
             </a>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a>
              <span class="count_top"><i class="fa fa-user"></i> % Nomor #2</span>
              <div class="count" style="color: #006614"><?php foreach ($modelgetCountHasilPaslon2Persen as $data) : {
                $presentaseHasil = $data['total'];
                $formattedNum = number_format($presentaseHasil, 2);
                echo $formattedNum."%";
              }

               ?>
                 <?php endforeach ?>
               </div>
             </a>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a>
              <span class="count_top"><i class="fa fa-user"></i> % Nomor #3</span>
              <div class="count" style="color: #238acf"><?php foreach ($modelgetCountHasilPaslon3Persen as $data) : {
                $presentaseHasil = $data['total'];
                $formattedNum = number_format($presentaseHasil, 2);
                echo $formattedNum."%";
              }

               ?>
                 <?php endforeach ?>
               </div>
             </a>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a>
              <span class="count_top"><i class="fa fa-user"></i> % Nomor #4</span>
              <div class="count" style="color: #c2b500"><?php foreach ($modelgetCountHasilPaslon4Persen as $data) : {
                $presentaseHasil = $data['total'];
                $formattedNum = number_format($presentaseHasil, 2);
                echo $formattedNum."%";
              }

               ?>
                 <?php endforeach ?>
               </div>
             </a>
            </div>

            <div class="row tile_count"></div>

            


<div class="row">
<script src="Chart.bundle.js"></script>

    <div class="col-md-12">
    <!-- Start Chart -->
    <div class="col-md-8">
    <!-- <h3><i class="fa fa-tasks"></i> Grafik <small> <?= CHtml::encode(Yii::app()->name); ?> </small></h3>
    <div class="x_title"></div> -->
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Nomor 1", "Nomor 2", "Nomor 3", "Nomor 4"],
                    datasets: [{
                            label: 'SUARA DI <?php print_r($modelKeldesa->nama) ?>',
                            //data: [12, 19, 3, 4],
                            data: [<?php 
                             //while ($p = mysqli_fetch_array($penghasilan)) { echo '"' . $p['hasil_penjualan'] . '",';}
                             foreach ($modelgetCountHasilPaslon1 as $data) {
                               echo '"' . $data['total'] . '",';
                             }

                             foreach ($modelgetCountHasilPaslon2 as $data) {
                               echo '"' . $data['total'] . '",';
                             }

                             foreach ($modelgetCountHasilPaslon3 as $data) {
                               echo '"' . $data['total'] . '",';
                             }

                             foreach ($modelgetCountHasilPaslon4 as $data) {
                               echo '"' . $data['total'] . '"';
                             }
                             ?>],
                            backgroundColor: [
                                'rgba(26, 26, 26, 0.7)',
                                'rgba(0, 56, 0, 0.7)',
                                'rgba(35, 138, 207, 0.7)',
                                'rgba(194, 178, 0, 0.7)'
                                ],
                            borderColor: [
                                'rgba(10, 10, 10 ,3)',
                                'rgba(0, 56, 0, 3)',
                                'rgba(35, 138, 207, 3)',
                                'rgba(194, 178, 0, 3)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>

<div class="clearfix"></div>
<div class="row tile_count">
            

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a>
              <span class="count_top">Syamsuar -<br> Edi Nasution</span>
              <div class="count blue"><img height="100" src="<?= Yii::app()->request->baseUrl ?>/images/paslon/1.jpg">
               </div>
             </a>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a>
              <span class="count_top">Lukman Edy -<br> Herdianto</span>
              <div class="count blue"><img height="100" src="<?= Yii::app()->request->baseUrl ?>/images/paslon/2.jpg">
               </div>
             </a>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a>
              <span class="count_top">Firdaus -<br> Rusli Efendi</span>
              <div class="count blue"><img height="100" src="<?= Yii::app()->request->baseUrl ?>/images/paslon/3.jpg">
               </div>
             </a>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a>
              <span class="count_top">Arsyad Juliandi R -<br> Suyatno</span>
              <div class="count blue"><img height="100" src="<?= Yii::app()->request->baseUrl ?>/images/paslon/4.jpg">
               </div>
             </a>
            </div>

            <div class="clearfix"></div>

            
 