<?php

/**
 * This is the model class for table "{{ads}}".
 *
 * The followings are the available columns in table '{{ads}}':
 * @property integer $aid
 * @property string $title
 * @property string $img
 * @property string $url
 * @property integer $cid
 * @property integer $type
 * @property integer $order
 */
class Ads extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ads the static model class
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
		return '{{ads}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, img, url, cid, type', 'required'),
			array('cid, type, order', 'numerical', 'integerOnly'=>true),
			array('title, img, url', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('aid, title, img, url, cid, type, order', 'safe', 'on'=>'search'),
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
		);
	}

    public function scopes()
    {
        return array(
            'img_ads_all'=>array(
                'condition'=>'cid=0',
            ),
            'links'=>array(
                'condition'=>'cid=-1',
            ),

        );
    }

    public function img_ads($type, $limit=1, $cid=0){
        $this->getDbCriteria()->mergeWith(
            array(
                'condition'=>'`cid`='.intval($cid).' AND type='.intval($type),
                'order'=>'`order` ASC',
                'limit'=>intval($limit)
            )
        );
        return $this;
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'aid' => 'ID',
			'title' => '说明介绍',
			'img' => '图片',
			'url' => '链接',
			'cid' => '分类',
			'type' => '广告位置',
			'order' => '排序',
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

		$criteria->compare('aid',$this->aid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('cid',$this->cid);
		$criteria->compare('type',$this->type);
		$criteria->compare('order',$this->order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}