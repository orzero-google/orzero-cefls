<?php
/**
 * Created by ORZERO.COM .
 * User: xami520@gmail.com
 * Date: 12-12-8
 * Time: 上午12:07
 *
 */

//$model = Ads::model()->findAll('cid=0');
//$cid = Yii::app()->request->getParam('cid', 0);

$criteria=new CDbCriteria;
$criteria->condition='`type`=-14 AND `cid`=53 AND `enabled`=1';
//$criteria->params=array(':cid'=>$cid);
$criteria->order='`sort` ASC, `aid` DESC';
$dataProvider=new CActiveDataProvider('Article',array(
    'criteria'=>$criteria,
    'pagination'=>array(
        'pageSize'=>10,
    ),
));

$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'//manage/items/14/list_article_list',
    'ajaxUpdate'=>false,
    'template'=>"{items}\n{pager}"
));

