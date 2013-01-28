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
$criteria->condition='`cid`=0 AND enabled=1';
if(isset($cc)&&!empty($cc)){
    $criteria->condition='`cid`=0 AND enabled=1 AND type='.$cc;
}
$criteria->order='`order` ASC, `aid` DESC';
$dataProvider=new CActiveDataProvider('Ads',array(
    'criteria'=>$criteria,
    'pagination'=>array(
        'pageSize'=>5,
    ),
));

$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'//cefls/ads/img_list',
    'ajaxUpdate'=>false,
    'template'=>"{items}\n{pager}"
));

