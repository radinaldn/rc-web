<?php

/**
 * This is the model class for table "tb_kabkota".
 *
 * The followings are the available columns in table 'tb_kabkota':
 * @property integer $id_kabkota
 * @property string $nama
 * @property double $lat
 * @property double $lng
 *
 * The followings are the available model relations:
 * @property TbKec[] $tbKecs
 * @property TbSuara[] $tbSuaras
 */
class Kabkota extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_kabkota';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, lat, lng', 'required'),
			array('lat, lng', 'numerical'),
			array('nama', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_kabkota, nama, lat, lng', 'safe', 'on'=>'search'),
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
			'tbKecs' => array(self::HAS_MANY, 'TbKec', 'id_kabkota'),
			'tbSuaras' => array(self::HAS_MANY, 'TbSuara', 'id_kabkota'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_kabkota' => 'Id Kabkota',
			'nama' => 'Nama',
			'lat' => 'Lat',
			'lng' => 'Lng',
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

		$criteria->compare('id_kabkota',$this->id_kabkota);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('lat',$this->lat);
		$criteria->compare('lng',$this->lng);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kabkota the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
