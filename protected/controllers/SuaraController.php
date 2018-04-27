<?php

class SuaraController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
//			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','admin','dashboard','grafik','grafikkabkota','grafikkec','grafikkeldesa','sisakeldesa','selectkec','selectkeldesa','openkeldesa'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('update','delete'),
				'users'=>array('root'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Suara;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Suara']))
		{
			$model->attributes=$_POST['Suara'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_keldesa));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Suara']))
		{
			$model->attributes=$_POST['Suara'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_keldesa));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Suara');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$db=new Suara('search');
		$db->unsetAttributes();  // clear any default values
		if(isset($_GET['Suara']))
			$db->attributes=$_GET['Suara'];

		$model = Suara::model()->findAll(array("order"=>"waktu DESC"));
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionSelectkec()
	{
		$id_fak = $_POST['Saksi']['id_kabkota'];
		$list = Kec::model()->findAll('id_kabkota = :id_fak', array(':id_fak'=>$id_fak));
		$list = CHtml::listData($list,'id_kec','nama');
		echo CHtml::tag('option',array('value'=>''),'-- Pilih Kecamatan --', true);

		foreach($list as $value=>$nama){
			echo CHtml::tag('option',array('value'=>$value),CHtml::encode($nama), true);
		}
	}

	public function actionSelectkeldesa()
	{
		$id_jur = $_POST['Saksi']['id_kec'];
		$list = Keldesa::model()->findAll('id_kec = :id_jur', array(':id_jur'=>$id_jur));
		$list = CHtml::listData($list,'id_keldesa','nama');

		echo CHtml::tag('option',array('value'=>''),'-- Pilih Kelurahan/Desa --', true);
		foreach($list as $value=>$nama){
			echo CHtml::tag('option',array('value'=>$value),CHtml::encode($nama), true);
		}
	}	

	public function actionOpenkeldesa()
	{
		$id_jur = $_POST['Saksi']['id_keldesa'];
		echo $id_jur;
	}	

	public function actionDashboard()
	{
		$modelgetCountHasil = Suara::model()->getCountHasil();
		$modelgetCountHasilPaslon1 = Suara::model()->getCountHasilPaslon1();
		$modelgetCountHasilPaslon2 = Suara::model()->getCountHasilPaslon2();
		$modelgetCountHasilPaslon3 = Suara::model()->getCountHasilPaslon3();
		$modelgetCountHasilPaslon4 = Suara::model()->getCountHasilPaslon4();
		$modelgetCountHasilPaslon1Persen = Suara::model()->getCountHasilPaslon1Persen();
		$modelgetCountHasilPaslon2Persen = Suara::model()->getCountHasilPaslon2Persen();
		$modelgetCountHasilPaslon3Persen = Suara::model()->getCountHasilPaslon3Persen();
		$modelgetCountHasilPaslon4Persen = Suara::model()->getCountHasilPaslon4Persen();
		$jumlahkeldesa = Keldesa::model()->findAll();
		$totalKeldesa = count ( $jumlahkeldesa );
		$jumlahsuara = Suara::model()->findAll();
		$totalSuara = count ( $jumlahsuara );

		$this->render('dashboard',array(
			'totalKeldesa'=>$totalKeldesa,
			'totalSuara'=>$totalSuara,
			'modelgetCountHasil'=>$modelgetCountHasil,
			'modelgetCountHasilPaslon1'=>$modelgetCountHasilPaslon1,
			'modelgetCountHasilPaslon2'=>$modelgetCountHasilPaslon2,
			'modelgetCountHasilPaslon3'=>$modelgetCountHasilPaslon3,
			'modelgetCountHasilPaslon4'=>$modelgetCountHasilPaslon4,
			'modelgetCountHasilPaslon1Persen'=>$modelgetCountHasilPaslon1Persen,
			'modelgetCountHasilPaslon2Persen'=>$modelgetCountHasilPaslon2Persen,
			'modelgetCountHasilPaslon3Persen'=>$modelgetCountHasilPaslon3Persen,
			'modelgetCountHasilPaslon4Persen'=>$modelgetCountHasilPaslon4Persen,
			));
	}

	public function actionGrafikkabkota($id)
	{
		$modelJlhkabkota = Keldesa::model()->getTotalByKabkota($id);
		$modelKabkota = Kabkota::model()->findByPk($id);
		$modelgetCountHasil = Suara::model()->getCountHasilByKabkota($id);
		$modelgetCountHasilPaslon1 = Suara::model()->getCountHasilPaslon1ByKabkota($id);
		$modelgetCountHasilPaslon2 = Suara::model()->getCountHasilPaslon2ByKabkota($id);
		$modelgetCountHasilPaslon3 = Suara::model()->getCountHasilPaslon3ByKabkota($id);
		$modelgetCountHasilPaslon4 = Suara::model()->getCountHasilPaslon4ByKabkota($id);
		$modelgetCountHasilPaslon1Persen = Suara::model()->getCountHasilPaslon1PersenByKabkota($id);
		$modelgetCountHasilPaslon2Persen = Suara::model()->getCountHasilPaslon2PersenByKabkota($id);
		$modelgetCountHasilPaslon3Persen = Suara::model()->getCountHasilPaslon3PersenByKabkota($id);
		$modelgetCountHasilPaslon4Persen = Suara::model()->getCountHasilPaslon4PersenByKabkota($id);

		$this->render('grafik_kabkota',array(
			'modelJlhKabkota'=>$modelJlhkabkota,
			'modelKabkota'=>$modelKabkota,
			'modelgetCountHasil'=>$modelgetCountHasil,
			'modelgetCountHasilPaslon1'=>$modelgetCountHasilPaslon1,
			'modelgetCountHasilPaslon2'=>$modelgetCountHasilPaslon2,
			'modelgetCountHasilPaslon3'=>$modelgetCountHasilPaslon3,
			'modelgetCountHasilPaslon4'=>$modelgetCountHasilPaslon4,
			'modelgetCountHasilPaslon1Persen'=>$modelgetCountHasilPaslon1Persen,
			'modelgetCountHasilPaslon2Persen'=>$modelgetCountHasilPaslon2Persen,
			'modelgetCountHasilPaslon3Persen'=>$modelgetCountHasilPaslon3Persen,
			'modelgetCountHasilPaslon4Persen'=>$modelgetCountHasilPaslon4Persen,
			));
	}

	public function actionGrafikKec($id)
	{
		$modelJlhKeldesa = Keldesa::model()->getTotalByKec($id);
		$modelKeldesa = Keldesa::model()->findAll(array('condition'=>"id_kec=$id"));
		$modelKec = Kec::model()->findByPk($id);
		$modelgetCountHasil = Suara::model()->getCountHasilByKec($id);
		$modelgetCountHasilPaslon1 = Suara::model()->getCountHasilPaslon1ByKec($id);
		$modelgetCountHasilPaslon2 = Suara::model()->getCountHasilPaslon2ByKec($id);
		$modelgetCountHasilPaslon3 = Suara::model()->getCountHasilPaslon3ByKec($id);
		$modelgetCountHasilPaslon4 = Suara::model()->getCountHasilPaslon4ByKec($id);
		$modelgetCountHasilPaslon1Persen = Suara::model()->getCountHasilPaslon1PersenByKec($id);
		$modelgetCountHasilPaslon2Persen = Suara::model()->getCountHasilPaslon2PersenByKec($id);
		$modelgetCountHasilPaslon3Persen = Suara::model()->getCountHasilPaslon3PersenByKec($id);
		$modelgetCountHasilPaslon4Persen = Suara::model()->getCountHasilPaslon4PersenByKec($id);

		$this->render('grafik_kec',array(
			'modelJlhKeldesa'=>$modelJlhKeldesa,
			'modelKeldesa'=>$modelKeldesa,
			'modelKec'=>$modelKec,
			'modelgetCountHasil'=>$modelgetCountHasil,
			'modelgetCountHasilPaslon1'=>$modelgetCountHasilPaslon1,
			'modelgetCountHasilPaslon2'=>$modelgetCountHasilPaslon2,
			'modelgetCountHasilPaslon3'=>$modelgetCountHasilPaslon3,
			'modelgetCountHasilPaslon4'=>$modelgetCountHasilPaslon4,
			'modelgetCountHasilPaslon1Persen'=>$modelgetCountHasilPaslon1Persen,
			'modelgetCountHasilPaslon2Persen'=>$modelgetCountHasilPaslon2Persen,
			'modelgetCountHasilPaslon3Persen'=>$modelgetCountHasilPaslon3Persen,
			'modelgetCountHasilPaslon4Persen'=>$modelgetCountHasilPaslon4Persen,
			));
	}

	public function actionGrafikKeldesa($id)
	{
		$modelKeldesa = Keldesa::model()->findByPk($id);
		$modelgetCountHasil = Suara::model()->getCountHasilByKeldesa($id);
		$modelgetCountHasilPaslon1 = Suara::model()->getCountHasilPaslon1ByKeldesa($id);
		$modelgetCountHasilPaslon2 = Suara::model()->getCountHasilPaslon2ByKeldesa($id);
		$modelgetCountHasilPaslon3 = Suara::model()->getCountHasilPaslon3ByKeldesa($id);
		$modelgetCountHasilPaslon4 = Suara::model()->getCountHasilPaslon4ByKeldesa($id);
		$modelgetCountHasilPaslon1Persen = Suara::model()->getCountHasilPaslon1PersenByKeldesa($id);
		$modelgetCountHasilPaslon2Persen = Suara::model()->getCountHasilPaslon2PersenByKeldesa($id);
		$modelgetCountHasilPaslon3Persen = Suara::model()->getCountHasilPaslon3PersenByKeldesa($id);
		$modelgetCountHasilPaslon4Persen = Suara::model()->getCountHasilPaslon4PersenByKeldesa($id);

		$this->render('grafik_keldesa',array(
			'modelKeldesa'=>$modelKeldesa,
			'modelgetCountHasil'=>$modelgetCountHasil,
			'modelgetCountHasilPaslon1'=>$modelgetCountHasilPaslon1,
			'modelgetCountHasilPaslon2'=>$modelgetCountHasilPaslon2,
			'modelgetCountHasilPaslon3'=>$modelgetCountHasilPaslon3,
			'modelgetCountHasilPaslon4'=>$modelgetCountHasilPaslon4,
			'modelgetCountHasilPaslon1Persen'=>$modelgetCountHasilPaslon1Persen,
			'modelgetCountHasilPaslon2Persen'=>$modelgetCountHasilPaslon2Persen,
			'modelgetCountHasilPaslon3Persen'=>$modelgetCountHasilPaslon3Persen,
			'modelgetCountHasilPaslon4Persen'=>$modelgetCountHasilPaslon4Persen,
			));
	}

	public function actionGrafik()
	{
		$modelgetCountHasil = Suara::model()->getCountHasil();
		$modelgetCountHasilPaslon1 = Suara::model()->getCountHasilPaslon1();
		$modelgetCountHasilPaslon2 = Suara::model()->getCountHasilPaslon2();
		$modelgetCountHasilPaslon3 = Suara::model()->getCountHasilPaslon3();
		$modelgetCountHasilPaslon4 = Suara::model()->getCountHasilPaslon4();
		$modelgetCountHasilPaslon1Persen = Suara::model()->getCountHasilPaslon1Persen();
		$modelgetCountHasilPaslon2Persen = Suara::model()->getCountHasilPaslon2Persen();
		$modelgetCountHasilPaslon3Persen = Suara::model()->getCountHasilPaslon3Persen();
		$modelgetCountHasilPaslon4Persen = Suara::model()->getCountHasilPaslon4Persen();

		$this->render('grafik',array(
			'modelgetCountHasil'=>$modelgetCountHasil,
			'modelgetCountHasilPaslon1'=>$modelgetCountHasilPaslon1,
			'modelgetCountHasilPaslon2'=>$modelgetCountHasilPaslon2,
			'modelgetCountHasilPaslon3'=>$modelgetCountHasilPaslon3,
			'modelgetCountHasilPaslon4'=>$modelgetCountHasilPaslon4,
			'modelgetCountHasilPaslon1Persen'=>$modelgetCountHasilPaslon1Persen,
			'modelgetCountHasilPaslon2Persen'=>$modelgetCountHasilPaslon2Persen,
			'modelgetCountHasilPaslon3Persen'=>$modelgetCountHasilPaslon3Persen,
			'modelgetCountHasilPaslon4Persen'=>$modelgetCountHasilPaslon4Persen,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Suara the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Suara::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Suara $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='suara-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
