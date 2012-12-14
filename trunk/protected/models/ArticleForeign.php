<?php

/**
 * This is the model class for table "{{article_foreign}}".
 *
 * The followings are the available columns in table '{{article_foreign}}':
 * @property integer $aid
 * @property integer $uid
 * @property integer $cid
 * @property integer $audit
 * @property integer $grade
 * @property string $createtime
 * @property string $updatetime
 * @property integer $enabled
 * @property integer $sort
 * @property integer $type
 * @property string $title_en
 * @property string $excerpt_en
 * @property string $content_en
 * @property string $author_en
 * @property string $src_en
 * @property string $file_en
 * @property string $from_en
 * @property integer $clicknumber_en
 * @property string $title_fr
 * @property string $excerpt_fr
 * @property string $content_fr
 * @property string $author_fr
 * @property string $src_fr
 * @property string $file_fr
 * @property string $from_fr
 * @property integer $clicknumber_fr
 * @property string $title_de
 * @property string $excerpt_de
 * @property string $content_de
 * @property string $author_de
 * @property string $src_de
 * @property string $file_de
 * @property string $from_de
 * @property integer $clicknumber_de
 */
class ArticleForeign extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ArticleForeign the static model class
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
		return '{{article_foreign}}';
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
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid, cid, audit, grade, createtime, updatetime, sort, type, title_en, excerpt_en, content_en, title_fr, excerpt_fr, content_fr, title_de, excerpt_de, content_de', 'required'),
			array('uid, cid, audit, grade, enabled, sort, type, clicknumber_en, clicknumber_fr, clicknumber_de', 'numerical', 'integerOnly'=>true),
			array('author_en, author_fr, author_de', 'length', 'max'=>64),
			array('src_en, file_en, from_en, src_fr, file_fr, from_fr, src_de, file_de, from_de', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('aid, uid, cid, audit, grade, createtime, updatetime, enabled, sort, type, title_en, excerpt_en, content_en, author_en, src_en, file_en, from_en, clicknumber_en, title_fr, excerpt_fr, content_fr, author_fr, src_fr, file_fr, from_fr, clicknumber_fr, title_de, excerpt_de, content_de, author_de, src_de, file_de, from_de, clicknumber_de', 'safe', 'on'=>'search'),
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

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'aid' => '文章ID',
			'uid' => '用户ID',
			'cid' => '分类',
			'audit' => '审核',
			'grade' => '等级',
			'createtime' => '发布时间',
			'updatetime' => '更新时间',
			'enabled' => 'Enabled',
			'sort' => '排序',
			'type' => '类型',
			'title_en' => '英文标题',
			'excerpt_en' => '英文简介',
			'content_en' => '英文正文',
			'author_en' => '英文作者',
			'src_en' => '英文链接',
			'file_en' => '英文附件',
			'from_en' => '英文出处',
			'clicknumber_en' => '英文点击量',
			'title_fr' => '法文标题',
			'excerpt_fr' => '法文简介',
			'content_fr' => '法文正文',
			'author_fr' => '法文作者',
			'src_fr' => '法文链接',
			'file_fr' => '法文附件',
			'from_fr' => '法文出处',
			'clicknumber_fr' => '法文点击量',
			'title_de' => '德文标题',
			'excerpt_de' => '德文简介',
			'content_de' => '德文内容',
			'author_de' => '德文作者',
			'src_de' => '德文链接',
			'file_de' => '德文附件',
			'from_de' => '德文出处',
			'clicknumber_de' => '德文点击量',
		);
	}

    public function scopes()
    {
        return array(
            'article_all'=>array(
                'condition'=>'cid=0 AND enabled=1',
            ),
        );
    }

    public function article_all_limit($cid=0, $limit=1){
        $this->getDbCriteria()->mergeWith(
            array(
                'condition'=>'`cid`='.intval($cid).' AND enabled=1',
                'order'=>'`aid` DESC',
                'limit'=>intval($limit)
            )
        );
        return $this;
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
		$criteria->compare('uid',$this->uid);
		$criteria->compare('cid',$this->cid);
		$criteria->compare('audit',$this->audit);
		$criteria->compare('grade',$this->grade);
		$criteria->compare('createtime',$this->createtime,true);
		$criteria->compare('updatetime',$this->updatetime,true);
		$criteria->compare('enabled',$this->enabled);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('type',$this->type);
		$criteria->compare('title_en',$this->title_en,true);
		$criteria->compare('excerpt_en',$this->excerpt_en,true);
		$criteria->compare('content_en',$this->content_en,true);
		$criteria->compare('author_en',$this->author_en,true);
		$criteria->compare('src_en',$this->src_en,true);
		$criteria->compare('file_en',$this->file_en,true);
		$criteria->compare('from_en',$this->from_en,true);
		$criteria->compare('clicknumber_en',$this->clicknumber_en);
		$criteria->compare('title_fr',$this->title_fr,true);
		$criteria->compare('excerpt_fr',$this->excerpt_fr,true);
		$criteria->compare('content_fr',$this->content_fr,true);
		$criteria->compare('author_fr',$this->author_fr,true);
		$criteria->compare('src_fr',$this->src_fr,true);
		$criteria->compare('file_fr',$this->file_fr,true);
		$criteria->compare('from_fr',$this->from_fr,true);
		$criteria->compare('clicknumber_fr',$this->clicknumber_fr);
		$criteria->compare('title_de',$this->title_de,true);
		$criteria->compare('excerpt_de',$this->excerpt_de,true);
		$criteria->compare('content_de',$this->content_de,true);
		$criteria->compare('author_de',$this->author_de,true);
		$criteria->compare('src_de',$this->src_de,true);
		$criteria->compare('file_de',$this->file_de,true);
		$criteria->compare('from_de',$this->from_de,true);
		$criteria->compare('clicknumber_de',$this->clicknumber_de);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}