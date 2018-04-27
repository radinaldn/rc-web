<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
            $('#myDropDown').change(function(){
                //Selected value
                var inputValue = $(this).val();
                //alert("value in js "+inputValue);
                window.open("<?= Yii::app()->request->baseUrl ?>/index.php/suara/grafikkec/"+inputValue, "_self");

                //Ajax for calling php function
                $.post('submit.php', { dropdownValue: inputValue }, function(data){
                    alert('ajax completed. Response:  '+data);
                    //do after submission operation in DOM
                });
            });
            $('#myDropDown2').change(function(){
                //Selected value
                var inputValue = $(this).val();
                //alert("value in js "+inputValue);
                window.open("<?= Yii::app()->request->baseUrl ?>/index.php/suara/grafikkeldesa/"+inputValue, "_blank");

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



     
          			
                <div class="clearfix"></div>
          			<div class="x_content">
                <h3><i class="fa fa-tasks"></i> KEC. <?php print_r($modelKec->nama) ?> <small> <?= CHtml::encode(Yii::app()->name); ?> </small></h3>
    <div class="x_title"></div>
          				   <!-- top tiles -->
          <div class="row tile_count">
            

<div class="col-md-4">
          <select id="myDropDown" class="form-control">
            <option selected="selected" value ="1401010"><?= $modelKec->nama ?></option>
            <option class="blue" disabled>==KABUPATEN KUANTAN SINGINGI==</option>
            <?php
            $Kec = Kec::model()->getAll();
            $temp = 1401;
            foreach ($Kec as $data) {
              
              if ($data['id_kabkota'] != $temp){
                $temp = $data['id_kabkota'];  
                echo "<option class='blue' disabled>==".$data['nama_kabkota']."==</option>";
              }
              ?>
              <option value="<?= $data['id_kec']; ?>">
              <?php
              echo "$data[nama_kec]";
              
            ?>
            </option>
            <?php } ?>
          </select>
          </div>


          <div class="col-md-4">
          <select id="myDropDown2" class="form-control">
            <option selected="selected" value ="1401010">--- Silahkan Pilih Kelurahan/Desa ---</option>
            <?php
            $Kec = $modelKeldesa;
            $temp = 1401;
            foreach ($Kec as $data) {
              
              ?>
              <option value="<?= $data['id_keldesa']; ?>">
              <?php
              echo "$data[nama]";
              
            ?>
            </option>
            <?php } ?>
          </select>
          </div>

          <div class="clearfix"></div>
          <br>
<?php 
                ;
               ?>
<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a>

              <span class="count_top"><i class="fa fa-database"></i> Data Masuk</span>
              <div style="font-size: 30px; font-weight: bold;" class=" gray"><?php foreach ($modelgetCountHasil as $data) : {
                $presentaseHasil = ($data['total']/$modelJlhKeldesa[0]['total']*100);
                $formattedNum = number_format($presentaseHasil, 5);
                echo $presentaseHasil."%";
              }

               ?>
                 <?php endforeach ?>
               </div>
             </a>
            </div>

           

          <!-- <div class="col-md-3">
          <select class="form-control">
            <option>Pilih Kecamatan</option>
            <?php
            
              ?>
              <option>
              <?php
              
            ?>
            </option>
            <?php  ?>
          </select>
          </div> -->
          
          <div class="clearfix"></div>
            
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
                            label: 'SUARA DI KECAMATAN <?= print_r($modelKec->nama) ?>',
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

            
 