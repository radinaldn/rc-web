<?php

class FrontendController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/blank';

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
				'actions'=>array('index','view','dashboard','grafik'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	

	public function actionIndex()
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

		$this->render('dashboard',array(
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
