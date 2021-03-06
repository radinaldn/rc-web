<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo CHtml::encode(Yii::app()->name); ?></title>
    <script src="<?= Yii::app()->request->baseUrl;?>/custom/vendors/Chart.js/dist/Chart.bundle.js"></script>
    <link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/custom/production/images/real-count.jpg">

    <!-- Bootstrap -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/custom/build/css/custom.min.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  </head>

    <body>
<!-- page content -->
        <div class="right_col" role="main">
          <div class="clearfix"></div>

          <div class="row">
          	<div class="col-md-12">

          	<?php echo $content; ?>
          		
          	</div>
          </div>

          
 
          
        </div>
        <!-- /page content -->



        <!-- footer content -->
        <footer>
          <div class="pull-right"><img src="<?php echo Yii::app()->request->baseUrl; ?>/custom/production/images/real-count.jpg" alt="..." style='height:40px; width:40px;'>
            ©REAL COUNT RIAU 2018
</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
</body>        
    <!-- jQuery -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/build/js/custom.min.js"></script>


		<!-- Datatables -->

	<script type="<?php echo Yii::app()->request->baseUrl; ?>/custom/dataTables.bootstrap.min.js"></script>
	<script type="<?php echo Yii::app()->request->baseUrl; ?>/custom/jquery.dataTables.min.js"></script>
	<script type="<?php echo Yii::app()->request->baseUrl; ?>/custom/jquery-1.12.4.js"></script>

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-scroller/js/dataTables.scroller.min.js"></script>

    
    <script>
    	$(document).ready(function() {
    $('#example').DataTable();
} );
    </script>

	
  </body>
</html>