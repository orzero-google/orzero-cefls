<?php

/**
 * This is the model class for table "{{article}}".
 *
 * The followings are the available columns in table '{{article}}':
 * @property integer $aid
 * @property string $src
 * @property string $file
 * @property string $from
 * @property integer $uid
 * @property integer $cid
 * @property integer $audit
 * @property integer $grade
 * @property string $createtime
 * @property string $updatetime
 * @property string $title
 * @property string $excerpt
 * @property string $content
 * @property string $author
 * @property integer $enabled
 * @property integer $sort
 * @property integer $type
 * @property integer $clicknumber
 */
class Article extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Article the static model class
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
		return '{{article}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid, cid, audit, grade, createtime, updatetime, title, content, sort, type', 'required'),
			array('uid, cid, audit, grade, enabled, sort, type, clicknumber', 'numerical', 'integerOnly'=>true),
			array('src, file, from', 'length', 'max'=>255),
			array('author', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('aid, src, file, from, uid, cid, audit, grade, createtime, updatetime, title, excerpt, content, author, enabled, sort, type, clicknumber', 'safe', 'on'=>'search'),
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

    public function article_list($cid, $limit=1){
        $this->getDbCriteria()->mergeWith(
            array(
                'condition'=>'`cid`='.intval($cid).' AND enabled=1',
                'order'=>'`sort` ASC',
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
			'aid' => 'Aid',
			'src' => 'Src',
			'file' => 'File',
			'from' => '出处',
			'uid' => 'Uid',
			'cid' => 'Cid',
			'audit' => 'Audit',
			'grade' => 'Grade',
			'createtime' => '发布时间',
			'updatetime' => '更新时间',
			'title' => '标题',
			'excerpt' => '摘录',
			'content' => '内容',
			'author' => '发布人',
			'enabled' => 'Enabled',
			'sort' => '排序',
			'type' => 'Type',
			'clicknumber' => 'Clicknumber',
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
		$criteria->compare('src',$this->src,true);
		$criteria->compare('file',$this->file,true);
		$criteria->compare('from',$this->from,true);
		$criteria->compare('uid',$this->uid);
		$criteria->compare('cid',$this->cid);
		$criteria->compare('audit',$this->audit);
		$criteria->compare('grade',$this->grade);
		$criteria->compare('createtime',$this->createtime,true);
		$criteria->compare('updatetime',$this->updatetime,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('excerpt',$this->excerpt,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('enabled',$this->enabled);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('type',$this->type);
		$criteria->compare('clicknumber',$this->clicknumber);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}