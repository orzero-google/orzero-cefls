<?php

/**
 * This is the model class for table "{{menu}}".
 *
 * The followings are the available columns in table '{{menu}}':
 * @property integer $menu_id
 * @property integer $parent_id
 * @property string $menu_name
 * @property integer $menu_type
 * @property integer $menu_sort
 * @property integer $menu_count
 */
class Menu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Menu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{menu}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('menu_name', 'required'),
			array('parent_id, menu_type, menu_sort, menu_count', 'numerical', 'integerOnly'=>true),
			array('menu_name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('menu_id, parent_id, menu_name, menu_type, menu_sort, menu_count', 'safe', 'on'=>'search'),
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
            'sub_menu'=>array(self::HAS_MANY, 'Menu', 'parent_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'menu_id' => 'Menu',
			'parent_id' => 'Parent',
			'menu_name' => 'Menu Name',
			'menu_type' => 'Menu Type',
			'menu_sort' => 'Menu Sort',
			'menu_count' => 'Menu Count',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('menu_id',$this->menu_id);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('menu_name',$this->menu_name,true);
		$criteria->compare('menu_type',$this->menu_type);
		$criteria->compare('menu_sort',$this->menu_sort);
		$criteria->compare('menu_count',$this->menu_count);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}