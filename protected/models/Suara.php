<?php

/**
 * This is the model class for table "tb_suara".
 *
 * The followings are the available columns in table 'tb_suara':
 * @property integer $id_keldesa
 * @property integer $id_kec
 * @property integer $id_kabkota
 * @property string $suara1
 * @property string $suara2
 * @property string $suara3
 * @property string $suara4
 *
 * The followings are the available model relations:
 * @property TbKabkota $idKabkota
 * @property TbKec $idKec
 * @property TbKeldesa $idKeldesa
 */
class Suara extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_suara';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_keldesa, suara1, suara2, suara3, suara4', 'required'),
			array('id_keldesa', 'numerical', 'integerOnly'=>true),
			array('suara1, suara2, suara3, suara4', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_keldesa, suara1, suara2, suara3, suara4', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idKeldesa' => array(self::BELONGS_TO, 'TbKeldesa', 'id_keldesa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_keldesa' => 'Id Keldesa',
			'suara1' => 'Suara1',
			'suara2' => 'Suara2',
			'suara3' => 'Suara3',
			'suara4' => 'Suara4',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_keldesa',$this->id_keldesa);
		$criteria->compare('suara1',$this->suara1,true);
		$criteria->compare('suara2',$this->suara2,true);
		$criteria->compare('suara3',$this->suara3,true);
		$criteria->compare('suara4',$this->suara4,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Suara the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	function getAll() {
    $sql = "SELECT tb_suara.id_keldesa, tb_suara.suara1, tb_suara.suara2, tb_suara.suara3, tb_suara.suara4, tb_suara.waktu, tb_suara.foto FROM tb_suara ORDER BY tb_suara.waktu ASC";

    $model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	}

	function getCountHasil() {
    $sql = "SELECT COUNT(*) AS total FROM tb_suara;";

    $model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	}

	function getCountHasilByKeldesa($id_keldesa) {
    $sql = "SELECT COUNT(*) AS total FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_keldesa.id_keldesa = '$id_keldesa';";

    $model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	}

	function getCountHasilByKec($id_kec) {
    $sql = "SELECT COUNT(*) AS total FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_kec.id_kec = '$id_kec';";

    $model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	}

	function getCountHasilByKabkota($id_kabkota) {
    $sql = "SELECT COUNT(*) AS total FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_kabkota.id_kabkota = '$id_kabkota';";

    $model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	}

	function getCountHasilPaslon1(){
		$sql = "SELECT sum(suara1) AS total FROM tb_suara;";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	
	}

	function getCountHasilPaslon1ByKeldesa($id_keldesa){
		$sql = "SELECT sum(suara1) AS total FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_keldesa.id_keldesa = '$id_keldesa';";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	
	}

	function getCountHasilPaslon1ByKec($id_kec){
		$sql = "SELECT sum(suara1) AS total FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_kec.id_kec = '$id_kec';";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	
	}

	function getCountHasilPaslon1ByKabkota($id_kabkota){
		$sql = "SELECT sum(suara1) AS total FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_kabkota.id_kabkota = '$id_kabkota';";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	
	}

	function getCountHasilPaslon2(){
		$sql = "SELECT sum(suara2) AS total FROM tb_suara;";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	
	}

	function getCountHasilPaslon2ByKeldesa($id_keldesa){
		$sql = "SELECT sum(suara2) AS total FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_keldesa.id_keldesa = '$id_keldesa';";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	
	}

	function getCountHasilPaslon2ByKec($id_kec){
		$sql = "SELECT sum(suara2) AS total FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_kec.id_kec = '$id_kec';";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	
	}

	function getCountHasilPaslon2ByKabkota($id_kabkota){
		$sql = "SELECT sum(suara2) AS total FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_kabkota.id_kabkota = '$id_kabkota';";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	
	}

	function getCountHasilPaslon3(){
		$sql = "SELECT sum(suara3) AS total FROM tb_suara;";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	
	}

	function getCountHasilPaslon3ByKeldesa($id_keldesa){
		$sql = "SELECT sum(suara3) AS total FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_keldesa.id_keldesa = '$id_keldesa';";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	
	}

	function getCountHasilPaslon3ByKec($id_kec){
		$sql = "SELECT sum(suara3) AS total FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_kec.id_kec = '$id_kec';";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	
	}

	function getCountHasilPaslon3ByKabkota($id_kabkota){
		$sql = "SELECT sum(suara3) AS total FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_kabkota.id_kabkota = '$id_kabkota';";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	
	}

	function getCountHasilPaslon4(){
		$sql = "SELECT sum(suara4) AS total FROM tb_suara;";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	
	}

	function getCountHasilPaslon4ByKeldesa($id_keldesa){
		$sql = "SELECT sum(suara4) AS total FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_keldesa.id_keldesa = '$id_keldesa';";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	
	}

	function getCountHasilPaslon4ByKec($id_kec){
		$sql = "SELECT sum(suara4) AS total FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_kec.id_kec = '$id_kec';";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	
	}

	function getCountHasilPaslon4ByKabkota($id_kabkota){
		$sql = "SELECT sum(suara4) AS total FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_kabkota.id_kabkota = '$id_kabkota';";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	
	}

	function getCountHasilPaslonTotal(){
		$sql = "SELECT SUM(suara1 + suara2) FROM tb_suara;";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	
	}

	function getCountHasilPaslonTotalByKeldesa($id_keldesa){
		$sql = "SELECT SUM(suara1 + suara2) FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_keldesa.id_keldesa = '$id_keldesa';";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	
	}

	function getCountHasilPaslonTotalByKec($id_kec){
		$sql = "SELECT SUM(suara1 + suara2) FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_kec.id_kec = '$id_kec';";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	
	}

	function getCountHasilPaslonTotalByKabkota($id_kabkota){
		$sql = "SELECT SUM(suara1 + suara2) FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_kabkota.id_kabkota = '$id_kabkota';";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	
	}

	function getCountHasilPaslon1Persen(){
		$sql = "SELECT (SUM(suara1)/ SUM(suara1 + suara2 + suara3 + suara4) *100) AS total FROM tb_suara;";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	}

	function getCountHasilPaslon1PersenByKeldesa($id_keldesa){
		$sql = "SELECT (SUM(suara1)/ SUM(suara1 + suara2 + suara3 + suara4) *100) AS total FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_keldesa.id_keldesa = '$id_keldesa';";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	}

	function getCountHasilPaslon1PersenByKec($id_kec){
		$sql = "SELECT (SUM(suara1)/ SUM(suara1 + suara2 + suara3 + suara4) *100) AS total FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_kec.id_kec = '$id_kec';";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	}

	function getCountHasilPaslon1PersenByKabkota($id_kabkota){
		$sql = "SELECT (SUM(suara1)/ SUM(suara1 + suara2 + suara3 + suara4) *100) AS total FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_kabkota.id_kabkota = '$id_kabkota';";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	}

	function getCountHasilPaslon2Persen(){
		$sql = "SELECT (SUM(suara2)/ SUM(suara1 + suara2 +suara3 +suara4) *100) AS total FROM tb_suara;";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	}

	function getCountHasilPaslon2PersenByKeldesa($id_keldesa){
		$sql = "SELECT (SUM(suara2)/ SUM(suara1 + suara2 +suara3 +suara4) *100) AS total FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_keldesa.id_keldesa = '$id_keldesa';";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	}

	function getCountHasilPaslon2PersenByKec($id_kec){
		$sql = "SELECT (SUM(suara2)/ SUM(suara1 + suara2 +suara3 +suara4) *100) AS total FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_kec.id_kec = '$id_kec';";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	}

	function getCountHasilPaslon2PersenByKabkota($id_kabkota){
		$sql = "SELECT (SUM(suara2)/ SUM(suara1 + suara2 +suara3 +suara4) *100) AS total FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_kabkota.id_kabkota = '$id_kabkota';";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	}

	function getCountHasilPaslon3Persen(){
		$sql = "SELECT (SUM(suara3)/ SUM(suara1 + suara2 +suara3 + suara4) *100) AS total FROM tb_suara;";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	}

	function getCountHasilPaslon3PersenByKeldesa($id_keldesa){
		$sql = "SELECT (SUM(suara3)/ SUM(suara1 + suara2 +suara3 + suara4) *100) AS total FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_keldesa.id_keldesa = '$id_keldesa';";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	}

	function getCountHasilPaslon3PersenByKec($id_kec){
		$sql = "SELECT (SUM(suara3)/ SUM(suara1 + suara2 +suara3 + suara4) *100) AS total FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_kec.id_kec = '$id_kec';";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	}

	function getCountHasilPaslon3PersenByKabkota($id_kabkota){
		$sql = "SELECT (SUM(suara3)/ SUM(suara1 + suara2 +suara3 + suara4) *100) AS total FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_kabkota.id_kabkota = '$id_kabkota';";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	}	

	function getCountHasilPaslon4Persen(){
		$sql = "SELECT (SUM(suara4)/ SUM(suara1 + suara2 +suara3 +suara4) *100) AS total FROM tb_suara;";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	}

	function getCountHasilPaslon4PersenByKeldesa($id_keldesa){
		$sql = "SELECT (SUM(suara4)/ SUM(suara1 + suara2 +suara3 +suara4) *100) AS total FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_keldesa.id_keldesa = '$id_keldesa';";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	}

	function getCountHasilPaslon4PersenByKec($id_kec){
		$sql = "SELECT (SUM(suara4)/ SUM(suara1 + suara2 +suara3 +suara4) *100) AS total FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_kec.id_kec = '$id_kec';";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	}

	function getCountHasilPaslon4PersenByKabkota($id_kabkota){
		$sql = "SELECT (SUM(suara4)/ SUM(suara1 + suara2 +suara3 +suara4) *100) AS total FROM tb_suara INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_suara.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota AND tb_kabkota.id_kabkota = '$id_kabkota';";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	}
}
