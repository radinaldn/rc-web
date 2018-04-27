<?php

/**
 * This is the model class for table "tb_saksi".
 *
 * The followings are the available columns in table 'tb_saksi':
 * @property integer $id_keldesa
 * @property integer $id_kec
 * @property integer $id_kabkota
 * @property string $no_hp
 * @property string $nama
 *
 * The followings are the available model relations:
 * @property TbKabkota $idKabkota
 * @property TbKec $idKec
 * @property TbKeldesa $idKeldesa
 */
class Saksi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_saksi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_keldesa, id_kec, id_kabkota, no_hp, nama', 'required'),
			array('id_keldesa, id_kec, id_kabkota', 'numerical', 'integerOnly'=>true),
			array('no_hp', 'length', 'max'=>15),
			array('nama', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_keldesa, id_kec, id_kabkota, no_hp, nama', 'safe', 'on'=>'search'),
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
			'idKabkota' => array(self::BELONGS_TO, 'TbKabkota', 'id_kabkota'),
			'idKec' => array(self::BELONGS_TO, 'TbKec', 'id_kec'),
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
			'id_kec' => 'Id Kec',
			'id_kabkota' => 'Id Kabkota',
			'no_hp' => 'No Hp',
			'nama' => 'Nama',
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
		$criteria->compare('id_kec',$this->id_kec);
		$criteria->compare('id_kabkota',$this->id_kabkota);
		$criteria->compare('no_hp',$this->no_hp,true);
		$criteria->compare('nama',$this->nama,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	function getAll() {
    $sql = "SELECT tb_saksi.id_keldesa, tb_saksi.no_hp, tb_saksi.nama as nama_saksi, tb_keldesa.nama as nama_keldesa, tb_kec.nama as nama_kec, tb_kabkota.nama as nama_kabkota FROM tb_saksi INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_saksi.id_keldesa = tb_keldesa.id_keldesa AND tb_keldesa.id_kec = tb_kec.id_kec AND tb_kec.id_kabkota = tb_kabkota.id_kabkota;";

    $model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;
	}

	public function kecList()
	{
		$models = Kec::model()->findAll(array('condition' => 'id_kabkota = ' . $this->id_kabkota, 'order'=> 'nama'));
		foreach ($models as $model)
			$_items[$model->id_kec] = $model->nama;
		return $_items;
	}

	public function keldesaList(){
		$models = Keldesa::model()->findAll(array('condition' => 'id_kec = ' . $this->id_kec, 'order'=> 'nama'));
		foreach ($models as $model)
			$_items[$model->id_keldesa] = $model->nama;
		return $_items;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Saksi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
