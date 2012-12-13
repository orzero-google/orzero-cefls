<?php
/**
 * Created by ORZERO.COM .
 * User: xami520@gmail.com
 * Date: 12-12-8
 * Time: 上午12:07
 *
 */

//$model = Ads::model()->findAll('cid=0');

$criteria=new CDbCriteria;
$criteria->condition='`cid`=0 AND `enabled`=1';
$criteria->order='`sort` ASC';
$dataProvider=new CActiveDataProvider('ArticleForeign',array(
    'criteria'=>$criteria,
    'pagination'=>array(
        'pageSize'=>10,
    ),
));

$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'//cefls/article/foreign_list',
    'ajaxUpdate'=>false,
    'template'=>"{items}\n{pager}"
));

