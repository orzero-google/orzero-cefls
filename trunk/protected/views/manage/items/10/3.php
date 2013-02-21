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
$criteria->condition='`type`=-2 AND enabled=1 AND cid = 11';
$criteria->order='`sort` ASC, `aid` DESC';
$dataProvider=new CActiveDataProvider('Article',array(
    'criteria'=>$criteria,
    'pagination'=>array(
        'pageSize'=>5,
    ),
));

$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'//cefls/article/jsdw_list',
    'ajaxUpdate'=>false,
    'template'=>"{items}\n{pager}"
));

